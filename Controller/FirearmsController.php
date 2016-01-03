<?php
App::uses('AppController', 'Controller');
		//App::import('Vendor', 'Mindbody/MB_API.php');

class FirearmsController extends AppController {

	public $components = array('Paginator','Cookie');
	
	public function beforeFilter() {
		parent::beforeFilter();
		//set some variables
		//max days that can be scheduled
		$this->maxDays=30;
		//MINDBODY session type IDs, 214 is the 90 min. reservation in sandbox
		$this->CFE_SessionTypeIDs=array(214);
		
		//MINDBODY StaffIDs, these are the Courts from the sandbox
		$this->CFE_StaffIDs=array(100000263,
		//	100000264,100000265,100000266,100000267,100000268
			);
		
		//available packages, just using 'Food' category for now

		$this->loadModel('Product');
		$packages=$this->Product->find('all',array('conditions'=>array('Product.CategoryName'=>'Food')));
		$new_pack=array();
		foreach ($packages as $package){
			$new_pack[$package['Product']['barcodeID']]=$package['Product'];
		}
		$this->CFE_packages=$new_pack;
		
		$extras=$this->Product->find('all',array('conditions'=>array('Product.CategoryName'=>'Retail')));
		$new_ex=array();
		foreach ($extras as $extra){
			$new_ex[$extra['Product']['barcodeID']]=$extra['Product'];
		}
		
		$this->CFE_extras=$new_ex;
		
		//now the Cookie setup, maybe this should be AppController
		$this->Cookie->name = 'CodyFirearmsExperience';
		$this->Cookie->time = '1 day';
//enable these in production!
	//	$this->Cookie->domain = Configure::read('siteDomain');
	//	$this->Cookie->secure = true;  // i.e. only sent if using secure HTTPS
		$this->Cookie->key = Configure::read('cookieKey');
		$this->Cookie->httpOnly = true;
		$this->Cookie->type('aes');
		
	}
	
	public function pickpkg(){
		$this->set('pickpkg',$this->CFE_packages);
		$this->render('pickpkg','frontend');
	}
	
	public function pickdate($package_id=null){
	if (!isset($package_id)){
		$this->Session->setFlash('Please select a package first', 'flash_danger');
		return $this->redirect(array('action' => 'pickpkg'));	
	}
		$dates=array();
		//just fill some in for now, maybe have a calendar someday
		for ($i=0;$i<$this->maxDays;$i++){
			$dates[$i]=date('Y-m-d', strtotime('today + '.$i.' days'));
		}	
		$selected_package=$this->CFE_packages[$package_id];
		
		$this->set(compact('dates','selected_package','package_id'));
		$this->render('pickdate','frontend');
	}


	public function picktime($package_id=null){
	if (!isset($package_id)){
		$this->Session->setFlash('Please select a package first', 'flash_danger');
		return $this->redirect(array('action' => 'pickpkg'));	
	}
		if (isset($this->request->query['t'])){
			$pickdate=date('Y-m-d',strtotime($this->request->query['t']));
			//make sure the date is valid and within range
			$max=$this->maxDays-1;
			if ($pickdate<date('Y-m-d')||$pickdate>date('Y-m-d', strtotime('today + '.$max.' days'))) $pickdate=date('Y-m-d');
		}
		else {
			$pickdate=date('Y-m-d');
		}
		require_once('MB_API.php');
		$mb = new MB_API();
	
		//begin making the options array
		$options['StartDate']=$pickdate;
		$options['EndDate']=$pickdate;
		$options['SessionTypeIDs']=$this->CFE_SessionTypeIDs;
		
		//just getting top one now, it can be booked 4 times
		$options['StaffIDs']=$this->CFE_StaffIDs;
		
		$data = $mb->GetBookableItems($options);
		//check for successful response
		if ($data['GetBookableItemsResult']['ErrorCode']==200){
			//make an array of intervals (1800 is 30 min.)
			//AN IDEA! Could use separate staff and just make an associative array of available times with the court as the value
			$available_times=array();
			//THIS DOESN'T WORK RIGHT, FLAWED LOGIC
			if (count($data['GetBookableItemsResult']['ScheduleItems'])>1){
				foreach($data['GetBookableItemsResult']['ScheduleItems']['ScheduleItem'] as $key=>$schitem){
					$interval=$schitem['StartDateTime'];
					do {
						array_push($available_times,$interval);
						$interval=date('c',strtotime($interval)+1800);
					}
					while ($interval <= $schitem['EndDateTime']);
				}
			}
			//there is only one. What if there are zero? Need to check that!!
			else{
				$interval=$data['GetBookableItemsResult']['ScheduleItems']['ScheduleItem']['StartDateTime'];
				do {
						array_push($available_times,$interval);
						$interval=date('c',strtotime($interval)+1800);
					}
					while ($interval <= $data['GetBookableItemsResult']['ScheduleItems']['ScheduleItem']['EndDateTime']);
			}
		}
		//API response not successful
		else{
			$this->Session->setFlash('Sorry, something went wrong with the request.', 'flash_danger');
			debug($data);
		}
		$selected_package=$this->CFE_packages[$package_id];
		$this->set('request',$mb->getXMLRequest());
		$this->set(compact('available_times','pickdate','package_id','selected_package'));
		$this->render('picktime','frontend');
		
	}
	
	public function cart(){
		$packages=$this->CFE_packages;
		$extras=$this->CFE_extras;
		$cart_items=$this->Cookie->read('CartItems');
		if (!$cart_items) $this->Session->setFlash('Your cart is empty!', 'flash_danger');
		
		
		//came from the picktime action, basically build an array and then write it to a cookie, should be a proper "CartItem" 
		if (isset($this->request->data['Picktime'])){
			$picktime=$this->request->data['Picktime'];
			$mbdate=$picktime['picktime'].'T'.$picktime['slot'];
			//use the date as the key to prevent the same slot added to cart twice
			$cart_items['Packages'][$mbdate]=$picktime['package_id'];
			$this->Cookie->write('CartItems',$cart_items);
			$this->Session->setFlash('Complete checkout to confirm reservation', 'flash_danger');
		}
		//came from cart itself, this is update
		if (isset($this->request->data['Cart']['update_button'])){
			$update=$this->request->data['Cart'];
			//debug($update);
			//remake the cookie
			$this->Cookie->delete('CartItems');
			unset($cart_items['Extras']);
			foreach ($update['Extras'] as $id=>$qty){
				//use the id as the key to prevent the same slot added to cart twice
				$cart_items['Extras'][$id]=$qty;
				//
			}
			
			$this->Cookie->write('CartItems',$cart_items);
			$this->Session->setFlash('Updated quantities', 'flash_success');
		}
		
		//make a total AFTER everything is updated
		$cart_total=0;
		if (isset($cart_items['Packages'])){
			foreach ($cart_items['Packages'] as $mbdate=>$pid){
				$cart_total=$cart_total+$packages[$pid]['OnlinePrice'];	
			}
		}
		if (isset($cart_items['Extras'])){
			foreach ($cart_items['Extras'] as $pid=>$qty){
				$cart_total=$cart_total+($extras[$pid]['OnlinePrice']*$qty);	
			}
		}
		
		//this just doesn't seem to work
		//$this->request->data['Cart']['Extras'][189]=3;
		$this->set(compact('cart_items','packages','extras','cart_total'));
		$this->render('cart','frontend');
	}
	
	public function cart_remove_package($mbdate=null){
		$cart_items=$this->Cookie->read('CartItems');
		$this->Cookie->delete('CartItems');
		unset($cart_items['Packages'][urldecode($mbdate)]);
		if (count($cart_items['Packages'])<1) unset($cart_items['Packages']);
		$this->Cookie->write('CartItems',$cart_items);
		$flash='Item removed from cart';
		$this->Session->setFlash($flash, 'flash_custom');
		return $this->redirect(array('action' => 'cart'));
		
		//cookies never write if you don't render to valid view!
		$this->render('cart','frontend');
	}
	
	
	//everything below is useful test stuff
	public function index() {
		require_once('MB_API.php');
		$mb = new MB_API();
		
		/*
			SessionTypeID 214 is the 90 min reservation from the sandbox, get this by hovering over it in MINDBODY GUI
		*/
		//26 is Retail from Sandbox, get this by inspecting dropdown element on GUI
		$data=$mb->GetProducts(array('SellOnline'=>true,'CategoryIDs'=>array(26)));
		//$data=$mb->GetServices(array('SellOnline'=>true,'SessionTypeIDs'=>$this->CFESessionTypeIDs));
		//this only gets Session times and only shows dates starting in 1899 in Sandbox?
		//$data = $mb->GetActiveSessionTimes(array('XMLDetail'=>'Full','PageSize'=>3,'CurrentPageIndex'=>0,'StartTime'=>'2015-12-30T00:00:00','EndTime'=>'2016-01-06T20:00:00','SessionTypeIDs'=>array(214)));
		
		//this works great for getting services
		//$data = $mb->GetServices(array('LocationID'=>1,'HideRelatedPrograms'=>true,'SellOnline'=>true,'SessionTypeIDs'=>$this->CFESessionTypeIDs,'PageSize'=>1));
		
		//if only one returned then fix it up
		if (isset($data['GetServicesResult']['Services']['Service']['ID'])){
			$temp_data=array();
			$temp_data=$data['GetServicesResult']['Services']['Service'];
			unset($data['GetServicesResult']['Services']['Service']);
			$data['GetServicesResult']['Services']['Service'][0]=$temp_data;
		}
		echo count($data['GetServicesResult']['Services']);
		
		//get staff, doesn't do much for us 
		//$data=$mb->GetStaff(array('SessionTypeID'=>214,'StartDateTime'=>'2015-12-31T10:30:00'));
		//not sure what these are, found them in "Arrivals"
		//$data=$mb->GetPackages(array('SellOnline'=>false));
		
		//beginning demo of how o add asi values to the request
	/*	$data = $mb->CheckoutShoppingCart(array(
			'Test'=>true,
			'ClientID'=>1234,
			'CartItems'=>array(
			//numbering the array here seems to work fine. Yay!
			0=>array(
				'Quantity'=>1,
				'Item' => new SoapVar(array('ID'=>"1234"), SOAP_ENC_ARRAY, 'Service', 'http://clients.mindbodyonline.com/api/0_5'),
				'DiscountAmount' => 1234),
			1=>array(
				'Quantity'=>1,
				'Item' => new SoapVar(array('ID'=>"1234"), SOAP_ENC_ARRAY, 'Product', 'http://clients.mindbodyonline.com/api/0_5'),
				'DiscountAmount' => 1234)
			),
			'Payments' => array(
			'PaymentInfo' => new SoapVar(array('Amount'=>"1234"), SOAP_ENC_ARRAY, 'CompInfo', 'http://clients.mindbodyonline.com/api/0_5'))
		));
		*/
		debug($data);
		$this->Prg->commonProcess();
		$this->Firearm->recursive = 0;
		$this->paginate = array('conditions' => $this->Firearm->parseCriteria($this->Prg->parsedParams()));
		$this->set('firearms', $this->paginate());
		$this->set('request',$mb->getXMLRequest());
	}
	

	
	public function addclient() {
		require_once('MB_API.php');
		$mb = new MB_API();

		//testing adding client, this works - most of the below fields are required see API docs for what else you can get.
		//I THINK we might write this to a DB of our own
		$userid=CakeText::uuid();
		
		/*
		$done=$mb->AddOrUpdateClients(array('XMLDetail'=>'Basic',
			'Test'=>false,
			'Clients'=>array(
			'Client'=>array(
				//obviously these need to be randomized or dealt with somehow
				'Username'=>'random15',
				'Password'=>'random1test',
				'Notes'=>'some notes like timestamp',
				'Gender'=>'Male',
				'LiabilityRelease'=>0,
				'EmergencyContactInfoName'=>'...',
				'ID'=>$userid,
				'FirstName'=>'4SethTest',
				'MiddleName'=>'Junir',
				'LastName'=>'4JTest',
				'Email'=>'seth@example.com',
				'EmailOptIn'=>0,
				'AddressLine1'=>'2117 Test Road',
				'AddressLine2'=>'Address Line 2 test',
				'City'=>'Cody',
				'State'=>'CO',
				'PostalCode'=>'12345',
				'Country'=>'USA',
				'MobilePhone'=>'307-999-9999',
				'HomePhone'=>'307-999-9999',
				'WorkPhone'=>'307-999-9999',
				'BirthDate'=>date("c"),
				'ReferredBy'=>'website'
				
				)),
		
		));
		*/
		
		//5685487c-ea6c-4364-b584-0bf5c0a80177
		//56854b59-eb0c-46ec-a600-0bf5c0a80177
		//56854b83-fe08-486b-9ffd-0bf5c0a80177
		//56854c5c-4a9c-43d5-b8a5-0bf5c0a80177
		
		//this works!
		$done=$mb->AddOrUpdateAppointments(array(
			'Test'=>false,
			//'SendEmail'=>true,
			'Appointments'=>array(
				'Appointment'=>array(
					'StartDateTime'=>"2015-12-31T10:30:00",
					//1 is 'Clubville' use GetLocations to find yours
					'Location'=>array('ID'=>1),
					'Staff'=>array('ID'=>100000263,'isMale'=>false),
					//'Duration'=>60,
					'Client'=>array('ID'=>'56854c5c-4a9c-43d5-b8a5-0bf5c0a80177'),
					'SessionType'=>array('ID'=>214),
					//'StaffRequested'=>true
				))
		));
		

		
		//if this returns Success then it worked, now we would write to our DB
		debug($done);
		
		$this->Prg->commonProcess();
		$this->Firearm->recursive = 0;
		$this->paginate = array('conditions' => $this->Firearm->parseCriteria($this->Prg->parsedParams()));
		$this->set('firearms', $this->paginate());
		$this->set('request',$mb->getXMLRequest());
	}
	
	public function mobile() {
		$this->Prg->commonProcess();
		$this->Firearm->recursive = 0;
		$this->paginate = array('conditions' => $this->Firearm->parseCriteria($this->Prg->parsedParams()));
		$this->set('firearms', $this->paginate());
		$this->layout='jq';
		
		//$this->render('i');
	}
	
	public function details() {
	//	debug('what the hell');
		$this->layout='jq';
	}

	public function view($id = null) {
		if (!$this->Firearm->exists($id)) {
			throw new NotFoundException(__('Invalid firearm'));
		}
		$options = array('conditions' => array('Firearm.' . $this->Firearm->primaryKey => $id));
		$this->set('firearm', $this->Firearm->find('first', $options));
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Firearm->create();
			if ($this->Firearm->save($this->request->data)) {
				$this->Session->setFlash(__('The firearm has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The firearm could not be saved. Please, try again.'));
			}
		}
		$orders = $this->Firearm->Order->find('list');
		$packages = $this->Firearm->Package->find('list');
		$this->set(compact('orders', 'packages'));
	}

	public function edit($id = null) {
		if (!$this->Firearm->exists($id)) {
			throw new NotFoundException(__('Invalid firearm'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Firearm->save($this->request->data)) {
				$this->Session->setFlash(__('The firearm has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The firearm could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Firearm.' . $this->Firearm->primaryKey => $id));
			$this->request->data = $this->Firearm->find('first', $options);
		}
		$orders = $this->Firearm->Order->find('list');
		$packages = $this->Firearm->Package->find('list');
		$this->set(compact('orders', 'packages'));
	}

	public function delete($id = null) {
		$this->Firearm->id = $id;
		if (!$this->Firearm->exists()) {
			throw new NotFoundException(__('Invalid firearm'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Firearm->delete()) {
			$this->Session->setFlash(__('The firearm has been deleted.'));
		} else {
			$this->Session->setFlash(__('The firearm could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
