<?php
App::uses('AppController', 'Controller');

class ProductsController extends AppController {

	public $components = array('Paginator');
	
	public function beforeFilter() {
		parent::beforeFilter();
		//set some variables
		//26 is the Retail from Sandbox, get this by inspecting dropdown element in product add/edit
		//the only way to do this is to set manually here (this data cannot be found via API call)
		$this->CFE_Categories=array(26=>'Retail',32=>'Food');
		
		//these are from live CFE environment
		//$this->CFE_Categories=array(100001=>'Firearm Reservations',100002=>'Retail');
		
		//214 is the 90 min. reservation IN SANDBOX - this is the best way to build database is loop through rather than get all at once
		//265 is the 60 min, I assigned it to Staff Court 2
		//270 is the Add-on
		//271 as well is the Add-on
		//these are actually ALL SessionTypeIDs but we do separate calls for purpose of creating our on DB
		$this->CFE_LaneTypeIDs=array(214=>'Lane',265=>'Gatling');
		
		//these are just for the Lane
		$this->CFE_ComboTypeIDs=array(270=>'Cowboy',271=>'Rifle');
		
		//for "Double the Fun" connect a package ID from above JUST literally doubling now
		$this->CFE_DoubleTypeIDs=array(270=>270,265=>265);
		
		//these are production need to make setting for it
		//$this->CFE_SessionTypeIDs=array(5=>'Regular Package',6=>'Gatling');

		
		/* shouldn't need these now 
		$this->CFE_CategoryIDs=array(26);
		$this->CFE_CategoryName='Retail';
		*/
	}
	public function index() {
		//this should be a dashboard to update stuff, just a tester now
		require_once('MB_API.php');
		$mb = new MB_API();
		//$data = $mb->GetPackages(array('SellOnline'=>true));
		$this->loadModel('Package');
		$data=$this->Package->find('all');
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
					$product['CategoryName']=$cat_name;
					$product['prodtype']='Product';
					$product['barcodeID']=$product['ID'];
					//must deal with MINDBODY strange way of rounding tax, if hundreds is even then it rounds down but if odd rounds up			
					$tax=number_format(floor(($product['OnlinePrice']*$product['TaxRate'])*100)/100,2)*100;
					if ( $tax & 1 )$tax++;
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
		
		
		//now get services for each specified SessionID, this makes the checkout much easier
		
		foreach ($this->CFE_LaneTypeIDs as $ses_id=>$ses_name){
			$data = $mb->GetServices(array('LocationID'=>1,'HideRelatedPrograms'=>true,'SellOnline'=>true,'SessionTypeIDs'=>array($ses_id)));

			//if only one result it needs to be fixed up
			if (isset($data['GetServicesResult']['Services']['Service']['ID'])){
				$temp_data=array();
				$temp_data=$data['GetServicesResult']['Services']['Service'];
				unset($data['GetServicesResult']['Services']['Service']);
				$data['GetServicesResult']['Services']['Service'][0]=$temp_data;
			}
			foreach ($data['GetServicesResult']['Services']['Service'] as $key=>$product){
				$product['barcodeID']=$product['ID'];
				unset($product['ID']);
				$product['CategoryID']=$product['ProductID'];
				$product['CategoryName']=$ses_name;
				$product['prodtype']='Service';	
				$product['SessionTypeID']=$ses_id;	
				$product['SessionTypeName']='RangeLane';	
				$tax=number_format(floor(($product['OnlinePrice']*$product['TaxRate'])*100)/100,2)*100;
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

		foreach ($this->CFE_ComboTypeIDs as $ses_id=>$ses_name){
			$data = $mb->GetServices(array('LocationID'=>1,'HideRelatedPrograms'=>true,'SellOnline'=>true,'SessionTypeIDs'=>array($ses_id)));

			//if only one result it needs to be fixed up
			if (isset($data['GetServicesResult']['Services']['Service']['ID'])){
				$temp_data=array();
				$temp_data=$data['GetServicesResult']['Services']['Service'];
				unset($data['GetServicesResult']['Services']['Service']);
				$data['GetServicesResult']['Services']['Service'][0]=$temp_data;
			}
			foreach ($data['GetServicesResult']['Services']['Service'] as $key=>$product){
				$product['barcodeID']=$product['ID'];
				unset($product['ID']);
				$product['CategoryID']=$product['ProductID'];
				$product['CategoryName']=$ses_name;
				$product['prodtype']='Service';	
				$product['SessionTypeID']=$ses_id;	
				$product['SessionTypeName']='Combo';	
				$tax=number_format(floor(($product['OnlinePrice']*$product['TaxRate'])*100)/100,2)*100;
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
		foreach ($this->CFE_DoubleTypeIDs as $ses_id=>$ses_name){
			$data = $mb->GetServices(array('LocationID'=>1,'HideRelatedPrograms'=>true,'SellOnline'=>true,'SessionTypeIDs'=>array($ses_id)));

			//if only one result it needs to be fixed up
			if (isset($data['GetServicesResult']['Services']['Service']['ID'])){
				$temp_data=array();
				$temp_data=$data['GetServicesResult']['Services']['Service'];
				unset($data['GetServicesResult']['Services']['Service']);
				$data['GetServicesResult']['Services']['Service'][0]=$temp_data;
			}
			foreach ($data['GetServicesResult']['Services']['Service'] as $key=>$product){
				$product['barcodeID']=$product['ID'];
				unset($product['ID']);
				$product['CategoryID']=$product['ProductID'];
				$product['CategoryName']=$ses_name;
				$product['prodtype']='Service';	
				$product['SessionTypeID']=$ses_id;	
				$product['SessionTypeName']='Double';	
				$tax=number_format(floor(($product['OnlinePrice']*$product['TaxRate'])*100)/100,2)*100;
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
		
		
		
		//finally get all packages and compare to available products
		//ONLY USING SINGLE ID for testing, normally we want all SellOnline
		$data = $mb->GetPackages(array('SellOnline'=>true
		//,'PackageIDs'=>array(353)
		));
		//debug($data);
		
		//fix single return. ARG!
		if (isset($data['GetPackagesResult']['Packages']['Package']['ID'])){
				$temp_data=array();
				$temp_data=$data['GetPackagesResult']['Packages']['Package'];
				unset($data['GetPackagesResult']['Packages']['Package']);
				$data['GetPackagesResult']['Packages']['Package'][0]=$temp_data;
		}
		$this->loadModel('Package');
		$this->Package->deleteAll(array(1=>1));
		//these will be saved at the end
		$prices['Price']=0;
		$prices['ExtendedPrice']=0;
		$prices['OnlinePrice']=0;
		foreach ($data['GetPackagesResult']['Packages']['Package'] as $pack){
			//debug($pack);
			$pack['barcodeID']=$pack['ID'];
			unset($pack['ID']);
			//if only one need to fix up..
			if (isset($pack['Services']['Service']['ID'])){
				$temp_data=array();
				$temp_data=$pack['Services']['Service'];
				unset($pack['Services']['Service']);
				$pack['Services']['Service'][0]=$temp_data;
			}
			if (isset($pack['Products']['Product']['ID'])){
				$temp_data=array();
				$temp_data=$pack['Products']['Product'];
				unset($pack['Products']['Product']);
				$pack['Products']['Product'][0]=$temp_data;
			}
			
			//now loop through and write, ensuring product is in product table
			debug($pack);
			foreach ($pack['Services']['Service'] as $service){
				$pack['service_id']=$service['ProductID'];
				$product=$this->Product->find('first',array('conditions'=>array('barcodeID'=>$service['ProductID'])));
				if (isset($product['Product']['id'])){
					//get amounts from DB to ensure proper tax rates
					$prices['Price']=$prices['Price']+$product['Product']['Price'];
					$prices['OnlinePrice']=$prices['OnlinePrice']+$product['Product']['OnlinePrice'];
					$prices['ExtendedPrice']=$prices['ExtendedPrice']+$product['Product']['ExtendedPrice'];
					$this->Package->create();
					if ($this->Package->save($pack)) {
						$this->Session->setFlash('Products have been updated','flash_success');
					}
				}
				else{
					$this->Session->setFlash('Service mismatch. Ensure all services in package can be sold online. Your entire site is broken until this is fixed!','flash_danger');
					break 2;
				}
			}
			/** DISABLED BECAUSE you can't sell products via package online. Dang it! **/
			/*
			foreach ($pack['Products']['Product'] as $service){
				//debug($service);
				unset($pack['service_id']);
				$pack['product_id']=$service['ID'];
				$product=$this->Product->find('first',array('conditions'=>array('barcodeID'=>$service['ID'])));
				if (isset($product['Product']['id'])){
					$prices['Price']=$prices['Price']+$product['Product']['Price'];
					$prices['OnlinePrice']=$prices['OnlinePrice']+$product['Product']['OnlinePrice'];
					$prices['ExtendedPrice']=$prices['ExtendedPrice']+$product['Product']['ExtendedPrice'];
					$this->Package->create();
					if ($this->Package->save($pack)) {
						$this->Session->setFlash('Products have been updated','flash_success');
					}
				}
				else{
					$this->Session->setFlash('Product mismatch. Ensure all products in package can be sold online. Your entire site is broken until this is fixed!','flash_danger');
					break 2;
				}
			}
			*/
			//save the totals to all records
			$saved=$this->Package->find('all',array('conditions'=>array('barcodeID'=>$pack['barcodeID'])));
			foreach ($saved as $save){
				$prices['id']=$save['Package']['id'];
				if ($this->Package->save($prices)) {
						$this->Session->setFlash('Products have been updated','flash_success');
				}
			}
				
		}
		
		
	//	$this->set('request',$mb->getXMLRequest());
		$this->set('products',$this->Product->find('all'));
		$this->render('update','frontend');
	}
	
	public function settings(){
		$this->loadModel('Firearm');
		$firearm=$this->Firearm->find('all');
		if ($this->request->is('post')) {
			debug($this->request->data);
			foreach ($this->request->data['Product'] as $setting=>$value){
				$this->Firearm->deleteAll(array('Firearm.name'=>$setting));
				$setting_val['name']=$setting;
				$setting_val['setting_value']=$value;
				$setting_val['setting_date_value']=$value;
				$this->Firearm->create();
				if ($this->Firearm->save($setting_val)) {
					$this->Session->setFlash('Settings have been updated','flash_success');
				}
			}
		}
		else {
			foreach ($firearm as $key=>$val){
			//debug($firearm);
			//$this->request->data['Product'] = array();
				$this->request->data['Product'][$val['Firearm']['name']]=$val['Firearm']['setting_value'];
			}
		}

		
		$this->set(compact('firearm'));
		
		$this->render('settings','frontend');
		
	}
}

/*
ALL web settings documented here:

datetime for operating hours
sun_start
sun_end
mon_start
mon_end
tue_start
tue_end
wed_start
wed_end
thur_start
thur_end
fri_start
fri_end
sat_start
sat_end

*/