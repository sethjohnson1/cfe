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
		
		//214 is the 90 min. reservation
		$this->CFE_SessionTypeIDs=array(214=>'90 min');
		
		/* shouldn't need these now 
		$this->CFE_CategoryIDs=array(26);
		$this->CFE_CategoryName='Retail';
		*/
	}
	public function index() {
		//this should be a dashboard to update stuff
	
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
					$this->Product->create();
					if ($this->Product->save($product)) {
						$this->Session->setFlash('Products have been updated','flash_success');
					}
				}
			}
			else{
				$this->Session->setFlash('Something has gone wrong, try again then seek help.','flash_danger');
				debug($data);
			}
		}
		//I don't think we need this part, might as well just use products and categories
		/*
		foreach ($this->CFE_SessionTypeIDs as $ses_id=>$ses_name){
			
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
				//assuming we only have one category
				$product['CategoryID']=$ses_id;
				$product['CategoryName']=$ses_name;
				$product['prodtype']='Service';
				$this->Product->create();
				if ($this->Product->save($product)) {
					$this->Session->setFlash('Products have been updated','flash_success');
				}
			}
		}
		*/
		
		
		
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