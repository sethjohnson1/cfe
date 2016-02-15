<?php
/*
Production IDs (put these into the settings page now)

** Product Categories
32 - DoubleAmmo
100001 - Firearms Reservations
100002 - Retail

** SessionIDs so far
5,6,9,8


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

		//these are the sandbox Appointment IDs, make sure they are sellable online (90 and 120 are not by default_)
		$this->CFE_ComboTypeIDs=explode(',',$settings['appointmentSessionIDs']);
		$dbl=explode(',',$settings['doubleSessionIDs']);
		$this->CFE_DoubleTypeIDs=array();
		//as long as they listed them in the same order this works
		foreach ($dbl as $k=>$v){
			$this->CFE_DoubleTypeIDs[$this->CFE_ComboTypeIDs[$k]]=$v;
		}
		$cat[$settings['retailCategoryID']]=array('name'=>'Retail','prodtype'=>'Product');
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
		//this should be a dashboard to update stuff, just a tester now
		$data = $mb->GetServices(array('SellOnline'=>true));
		//$this->loadModel('Package');
		//$data=$this->Package->find('all');
		debug($data);
		
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
					$rawtax=$product['OnlinePrice']*$product['TaxRate'];
					$tax=number_format(floor(($product['OnlinePrice']*$product['TaxRate'])*100)/100,3)*100;
					$digit3=explode('.',$rawtax);
					if (isset($digit3[1])&&strlen($digit3[1])>2) $tax++;
					//debug($tax);
					$product['ExtendedPrice']=$product['OnlinePrice']+($tax/100);
					
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
			//debug($settings);
			//just for testing, may not want to do this - the loop does it individually
			$this->Firearm->deleteAll(array(1=>1));
			foreach ($settings as $setting=>$value){
				$this->Firearm->deleteAll(array('Firearm.name'=>$setting));
				$setting_val['name']=$setting;
				$setting_val['setting_value']=$value;
				$setting_val['setting_date_value']=$value;
				$this->Firearm->create();
				if ($this->Firearm->save($setting_val)) {
					$this->Session->setFlash('Settings have been updated','flash_success');
				}
			}				
			//update bookdates table - no need right now, just do the math on the other controller
			/*
			$this->loadModel('Bookdate');
			$dates=array();
			$closed=explode(',',$settings['closedDays']);
			for ($i=0;$i<$settings['maxBookableDays'];$i++){
				$bookdate=date('Y-m-d', strtotime('today + '.$i.' days'));
				foreach ($closed as $c){
					if ($bookdate==$c) continue 2;
				}
				foreach ($days as $day){
					if (!$settings[$day] && date('l',strtotime($bookdate)==$day)){
					//must be doing something wrong here, check for days
						debug($day);
					}
				}
				
				//save
				//debug($bookdate);
			}
			*/
			
		}
		else {
			foreach ($firearm as $key=>$val){
			//debug($firearm);
			//$this->request->data['Product'] = array();
				$this->request->data['Product'][$val['Firearm']['name']]=$val['Firearm']['setting_value'];
			}
		}

		
		$this->set(compact('firearm','days'));
		
		$this->render('settings','frontend');
		
	}
}