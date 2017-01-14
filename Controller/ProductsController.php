<?php
/*
Production IDs (put these into the settings page now)

** Product Categories
32 - DoubleAmmo
100001 - Firearms Reservations
100002 - Retail

** SessionIDs so far
5,6(gatling),9,8


** DoubleAmmo so far
10112 - Gatling
10113 - Pick Three

** test clientID
20160111185337924
*/
App::uses('AppController', 'Controller');

class ProductsController extends AppController {

	public $components = array('Paginator');
	
	public function beforeFilter() {
		parent::beforeFilter();
		//get settings from DB
		$this->loadModel('Firearm');
		$firearms=$this->Firearm->find('all');
		$settings=array();
		foreach($firearms as $val){
			$settings[$val['Firearm']['name']]=$val['Firearm']['setting_value'];
		}
		//set some variables

		$this->CFE_ComboTypeIDs=explode(',',$settings['appointmentSessionIDs']);
		$dbl=explode(',',$settings['doubleSessionIDs']);
		$this->CFE_DoubleTypeIDs=array();
		//as long as they listed them in the same order this works
		foreach ($dbl as $k=>$v){
			$this->CFE_DoubleTypeIDs[$this->CFE_ComboTypeIDs[$k]]=$v;
		}
		$cat[$settings['taxableCategoryID']]=array('name'=>'TaxedRetail','prodtype'=>'Product');
		
		//this is gone for now
		//$cat[$settings['nontaxableCategoryID']]=array('name'=>'Retail','prodtype'=>'Product');
		
		$cat[$settings['doubleCategoryID']]=array('name'=>'Double','prodtype'=>'Double');
		$this->CFE_Categories=$cat;

		//old way, description did nothing
		//$this->CFE_ComboTypeIDs=array(214=>'Cowboy',265=>'Rifle',266=>'Gatling');
			//sessionIDs to products
		//$this->CFE_DoubleTypeIDs=array(265=>1237,214=>1237,266=>1238);
		//26 is the Retail from Sandbox, get this by inspecting dropdown element in product add/edit
		//the only way to do this is to set manually here (this data cannot be found via API call)
		//32 is Food which is the "Double"
		//OLD WAY ALL FROM DB NOW
		//$this->CFE_Categories=array(26=>array('name'=>'Retail','prodtype'=>'Product'),32=>array('name'=>'Double','prodtype'=>'Double'));
		require_once('MB_API.php');
		
	}
	public function index() {
		//this is my testing zone
		require_once('MB_API.php');
		$mb = new MB_API();
		//$data = $mb->GetServices(array('SellOnline'=>true));
		//$this->loadModel('Package');
		//$data=$this->Package->find('all');
		//debug($data);
		$this->Product->recursive = 0;
		$this->set('products', $this->Paginator->paginate());
		//Use a ZERO for SellOnline false
		//$data=$mb->GetProducts(array('XMLDetail'=>'Full','SellOnline'=>0,'SearchDomain'=>'Name','SearchText'=>'frosting','PageSize'=>30));
		$data=$mb->GetProducts(array('SellOnline'=>0,'PageSize'=>30));
		debug($data);
		$this->set('request',$mb->getXMLRequest());
		$this->set('response',$mb->getXMLResponse());

		
	}
	
	
	//need to password this at some point before live
	
	//this updates products in DB
	public function update(){
		require_once('MB_API.php');
		$mb = new MB_API();
		
		//delete it all first, hopefully it works.. This is the only way to ensure we purge old products
		$this->Product->deleteAll(array(1=>1));
		
		//first big loop through all Categories, this is the only way as the API won't return the Category ID
		foreach ($this->CFE_Categories as $cat_id=>$cat_name){
			//SellOnline must be specified or the call fails, using 0 (not false!) gets non-online products too, experimenting with that now
			//for some damn reason this screws up the checkout when its zero?
			//ah - because it overwhelms the size of the cookie, shouldn't be a problem in production, NO it could be, try to shorten that cookie somehow when it's time (if ever_)
			//just for testing
			//$data=$mb->GetProducts(array('PageSize'=>15,'SellOnline'=>0,'CategoryIDs'=>array($cat_id)));
			
			$data=$mb->GetProducts(array('SellOnline'=>true,'CategoryIDs'=>array($cat_id)));
		//	debug($data);
			if ($data['GetProductsResult']['ErrorCode']==200){
				//if only one result it needs to be fixed up
				if (isset($data['GetProductsResult']['Products']['Product']['ID'])){
					$temp_data=array();
					$temp_data=$data['GetProductsResult']['Products']['Product'];
					unset($data['GetProductsResult']['Products']['Product']);
					$data['GetProductsResult']['Products']['Product'][0]=$temp_data;
				}
				
				//debug($data);
				foreach ($data['GetProductsResult']['Products']['Product'] as $key=>$product){
					$product['CategoryID']=$cat_id;
					$product['CategoryName']=$cat_name['name'];
					$product['prodtype']=$cat_name['prodtype'];
					$product['barcodeID']=$product['ID'];
					//must deal with Banker's tax rounding if hundreds is even then it rounds down but if odd rounds up
					//NO I THINK THAT REP WAS WRONG! DAMNIT!
/*								
					$tax=number_format(floor(($product['OnlinePrice']*$product['TaxRate'])*100)/100,3)*100;
					debug($tax);
					if ( $tax & 1 )$tax++;
					*/
					
					//I think if there is ANY value in thousands place it rounds up, otherwise leaves it alone
					//this DOES NOT seem to be the case anymore, disabled with simpler method now
					/*$rawtax=$product['OnlinePrice']*$product['TaxRate'];
					$tax=number_format(floor(($product['OnlinePrice']*$product['TaxRate'])*100)/100,3)*100;
					$digit3=explode('.',$rawtax);
					if (isset($digit3[1])&&strlen($digit3[1])>2) $tax++;
					//debug($tax);
					$product['ExtendedPrice']=$product['OnlinePrice']+($tax/100);
					*/
					//simpler tax calculation which MINDBODY now seems to use, must keep an eye on this if they add more products, somewhat of a mystery
					$tax=round($product['OnlinePrice']*$product['TaxRate'],2);
					$product['ExtendedPrice']=$product['OnlinePrice']+$tax;
					$this->Product->create();
					if ($this->Product->save($product)) {
						$this->Session->setFlash('Products have been updated','flash_success');
					}
				}
			}
			else{
				$this->Session->setFlash('Could not get products. Try again then Seek help!','flash_danger');
				debug($data);
			}
		}
		
		foreach ($this->CFE_ComboTypeIDs as $ses_id){
			$data = $mb->GetServices(array('LocationID'=>1,'HideRelatedPrograms'=>true,'SellOnline'=>true,'SessionTypeIDs'=>array($ses_id)));
			//there is no description of services sent by the API - DOH!
			//debug($data);
			//if only one result it needs to be fixed up
			if (isset($data['GetServicesResult']['Services']['Service']['ID'])){
				$temp_data=array();
				$temp_data=$data['GetServicesResult']['Services']['Service'];
				unset($data['GetServicesResult']['Services']['Service']);
				$data['GetServicesResult']['Services']['Service'][0]=$temp_data;
			}
			//debug($data);
			foreach ($data['GetServicesResult']['Services']['Service'] as $key=>$product){
				$product['barcodeID']=$product['ID'];
				unset($product['ID']);
				$product['CategoryID']=$product['ProductID'];
				$product['CategoryName']='Service';
				$product['prodtype']='Service';	
				$product['SessionTypeID']=$ses_id;	
				$product['SessionTypeName']='Service';
				$product['DoubleTypeID']=$this->CFE_DoubleTypeIDs[$ses_id];
				$tax=number_format(floor(($product['OnlinePrice']*$product['TaxRate'])*100)/100,2)*100;
				//debug($tax);
				//unless it finished even, in which case no rounding!
				if ( $tax & 1 )$tax++;
				$product['ExtendedPrice']=$product['OnlinePrice']+($tax/100);
				$this->Product->create();
				if ($this->Product->save($product)) {
					$this->Session->setFlash('Products have been updated','flash_success');
				}
				else{
					debug('broke');
					break 2;
				}
			}
		}
		

		
	//	$this->set('request',$mb->getXMLRequest());
		$this->set('products',$this->Product->find('all'));
		$this->render('update','frontend');
	}
	
	public function settings(){
		$this->loadModel('Firearm');
		$days=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$firearm=$this->Firearm->find('all');
		if ($this->request->is('post')) {
			$settings=$this->request->data['Product'];
			$discounts['ids']=$settings['discountIDs'];
			$discounts['descs']=$settings['discountDesc'];
			$discounts['amounts']=$settings['amount'];
			unset($settings['discountIDs']);
			unset($settings['discountDesc']);
			unset($settings['amount']);
			//debug($settings);
			//just for testing, may not want to do this - the loop does it individually
			$this->Firearm->deleteAll(array(1=>1));
			//build the appoint/double into a single setting as it was originally
			foreach ($settings['appointmentSessionIDs'] as $k=>$s){
				trim($s," \t\n\r\0\x0B");
				if (empty($s)) unset($settings['appointmentSessionIDs'][$k]);
			}
			$astr='';
			$dstr='';
			$c=0;
			foreach ($settings['appointmentSessionIDs'] as $s){
				$astr.=$s;
				$c++;
				if ($c<count($settings['appointmentSessionIDs'])) $astr.=',';	
				trim($astr," \t\n\r\0\x0B");		
			}
			$c=0;
			foreach ($settings['doubleSessionIDs'] as $s){
				$dstr.=$s;
				$c++;
				if ($c<count($settings['appointmentSessionIDs'])) $dstr.=',';			
			}
			//save trouble of having to explode later, use tmp array
			$filldata1=$settings['appointmentSessionIDs'];
			$settings['appointmentSessionIDs']=$astr;
			$filldata2=$settings['doubleSessionIDs'];
			$settings['doubleSessionIDs']=$dstr;
			foreach ($settings as $setting=>$value){
				$this->Firearm->deleteAll(array('Firearm.name'=>$setting));
				$setting_val['name']=$setting;
				$setting_val['setting_value']=$value;
				$setting_val['setting_date_value']=$value;
				$this->Firearm->create();
				if ($this->Firearm->save($setting_val)) {
					$this->Session->setFlash('Settings have been updated','flash_success');
					unset($this->request->data['Product']['appointmentSessionIDs']);
					unset($this->request->data['Product']['doubleSessionIDs']);
					foreach($filldata1 as $k=>$v) $this->request->data['Product']['appointmentSessionIDs'][$k]=$v;
					foreach($filldata2 as $k=>$v) $this->request->data['Product']['doubleSessionIDs'][$k]=$v;
					
				}
			}
			//now save the discounts
			
			foreach ($discounts['ids'] as $k=>$d){
				$this->Firearm->create();
				$discount_val['name']='discount';
				$discount_val['setting_value']=$d;
				$discount_val['description']=$discounts['descs'][$k];
				$discount_val['amount']=$discounts['amounts'][$k];
				if (!empty($discount_val['setting_value'])){
					if ($this->Firearm->save($discount_val)) {
						
					}
				}
			}
			//redirect now so values properly fill in
			return $this->redirect(array('action' => 'settings'));
		}
		else {
			$discount_fill=array();
			$dikey=0;
			foreach ($firearm as $key=>$val){
			//debug($firearm);
			//$this->request->data['Product'] = array();
				$this->request->data['Product'][$val['Firearm']['name']]=$val['Firearm']['setting_value'];
				
				if ($val['Firearm']['name']=='discount'){
					$discount_fill[$dikey]['desc']=$val['Firearm']['description'];
					$discount_fill[$dikey]['setting_value']=$val['Firearm']['setting_value'];
					$discount_fill[$dikey]['amount']=$val['Firearm']['amount'];
					$dikey++;
				}
			}
			
			$filldata1=explode(',',$this->request->data['Product']['appointmentSessionIDs']);
			unset($this->request->data['Product']['appointmentSessionIDs']);
			foreach($filldata1 as $k=>$v) $this->request->data['Product']['appointmentSessionIDs'][$k]=$v;
			$filldata2=explode(',',$this->request->data['Product']['doubleSessionIDs']);
			unset($this->request->data['Product']['doubleSessionIDs']);
			foreach($filldata2 as $k=>$v) $this->request->data['Product']['doubleSessionIDs'][$k]=$v;
		}

		//debug($discount_fill);
		$this->set(compact('firearm','days','discount_fill'));
		
		$this->render('settings','frontend');
		
	}
	
	public function edit($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Invalid Product'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash('The Product has been saved.','flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Product could not be saved. Please, try again.','flash_danger');
			}
		} else {
			$options = array('conditions' => array('Product.' . $this->Product->primaryKey => $id));
			$this->request->data = $this->Product->find('first', $options);
		}
	$this->set('edit',1);
	$this->render('edit','frontend');
	}
	
	public function youtube() {
		$youtube=$this->Firearm->find('first',array('conditions'=>array('Firearm.name'=>'YouTube')));
		if ($this->request->is('post')) {
			//debug($this->request->data);
			$this->Firearm->deleteAll(array('Firearm.name'=>'YouTube'));
			$setting_val['name']='YouTube';
			$setting_val['setting_value']=$this->request->data['Product']['YouTube'];
			$this->Firearm->create();
			if ($this->Firearm->save($setting_val)) {
				$this->Session->setFlash('Updated YouTube video','flash_success');
				return $this->redirect(array('action' => 'entry','controller'=>'firearms'));
			}
		}
		$this->set(compact('youtube'));
		$this->render('youtube','frontend');
	}
	
	public function classes() {
		//test call for classes
		$mb = new MB_API();
		
		//get the date one year out
		$date=date('Y-m-d',strtotime(date("Y-m-d", time()) . " + 365 days"));
		//make sure you always have trailing zeros or bookings do not work!!
		$mbdate=$date.'T12:00:00';
		
		//$data=$mb->GetClasses(array('EndDateTime'=>$mbdate));
		//debug($data);
		$data2=$mb->GetClassDescriptions();
		//DOES NOT work without LocationID and HideRelatedPrograms
		$data2=$mb->GetServices(array('LocationID'=>1,'HideRelatedPrograms'=>true,'SessionTypeIDs'=>array('35')));
		debug($data2);
	}
	
	
}