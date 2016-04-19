<?php
App::uses('AppController', 'Controller');
		//App::import('Vendor', 'Mindbody/MB_API.php');

class FirearmsController extends AppController {

	public $components = array('Paginator','Cookie','Session');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->loadModel('Product');
		$this->Auth->allow();
		$this->CFE_discounts=$this->Firearm->find('all',array('conditions'=>array('Firearm.name'=>'discount')));$extras=$this->Product->find('all',array('conditions'=>array('Product.prodtype'=>'Product')));
		$new_ex=array();
		foreach ($extras as $extra){
			$new_ex[$extra['Product']['barcodeID']]=$extra['Product'];
		}
		$this->CFE_extras=$new_ex;
		//first find doubles, we will add them to product for ease of checkout
		//TESTING TO SEE IF GROUP ID CHECKS OUT
		$dbl=$this->Product->find('all',array('conditions'=>array('Product.prodtype'=>'Double'),'fields'=>array('barcodeID','GroupID','Price','OnlinePrice','TaxRate','ExtendedPrice')));
		$new_dbl=array();
		foreach ($dbl as $d){
			$new_dbl[$d['Product']['GroupID']]=$d['Product'];
		}
		$svcs=$this->Product->find('all',array('conditions'=>array('Product.prodtype'=>'Service')));
		$new_svc=array();
		foreach ($svcs as $svc){
			$new_svc[$svc['Product']['barcodeID']]=$svc['Product'];
			$new_svc[$svc['Product']['barcodeID']]['DoubleInfo']=$new_dbl[$svc['Product']['DoubleTypeID']];
		}
		//debug($new_svc);
		$this->CFE_services=$new_svc;
		
		
		//now the Cookie setup, maybe this should be AppController
		$this->Cookie->name = 'CodyFirearmsExperience';
		$this->Cookie->time = '1 day';
//enable these in production!
	//	$this->Cookie->domain = Configure::read('siteDomain');
	//	$this->Cookie->secure = true;  // i.e. only sent if using secure HTTPS
		$this->Cookie->key = Configure::read('cookieKey');
		$this->Cookie->httpOnly = true;
		$this->Cookie->type('aes');
		
		//load settings, which are on the firearms table
		$configs=$this->Firearm->find('all');
		//debug($configs);
		$opts=array();
		foreach ($configs as $opt) $opts[$opt['Firearm']['name']]=$opt['Firearm']['setting_value'];
		$closed=explode(',',$opts['closedDays']);
		$opts['closedDays']=$closed;
		$days_off=array();
		$days=array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		foreach ($days as $day) if (!$opts[$day]) $days_off[$day]=$day;
		$opts['weekdaysOff']=$days_off;
		$this->CFE_settings=$opts;
	}
	
	public function entry(){
		$pickpkg=$this->CFE_services;
		$this->set(compact('pickpkg'));
		$this->set('TheTitle','Welcome');
		$this->render('entry','frontend');
	}

	public function features(){
		$pickpkg=$this->CFE_services;
		$this->set(compact('pickpkg'));
		$this->set('TheTitle','Features');
		$this->render('features','frontend');
	}
	//this one is being phased out!
	/*
	public function frontview($id=null) {
		$this->loadModel('Description');
		if (!$this->Description->exists($id)) {
			throw new NotFoundException(__('Invalid webpage'));
		}
		$options = array('conditions' => array('Description.' . $this->Description->primaryKey => $id));
		$this->set('description', $this->Description->find('first', $options));
		$this->set('others', $this->Description->find('all', array('conditions'=>array('Description.id !='=>$id,'Description.pagetype'=>'Package'))));
		$this->render('frontview','frontend');
	}
*/
//this is used to render a single element
	public function learn($pagetype=null,$slug=null) {
		$this->loadModel('Description');
		$options = array('conditions' => array('Description.slug'=>$slug));
		$desc=$this->Description->find('first', $options);
		if (empty($desc)) throw new NotFoundException(__('Invalid webpage'));
		$this->set('description',$desc );
		$this->set('others', $this->Description->find('all', array('conditions'=>array('Description.slug !='=>$slug,'Description.pagetype'=>$pagetype))));
		//SET META HERE
		$this->render('learn','frontend');
	}
	
//this is for one page with all the packages (and also not necessary...)
	public function packages() {
		$this->loadModel('Description');
		$packages=$this->Description->find('all', array('conditions'=>array('Description.pagetype'=>'package')));
		//debug($packages);
		$this->set(compact('packages'));
		$this->set('TheTitle','Packages');
		$this->set('TheDescription','Shoot the guns of the Old West, including Mountain Man rifles and a Gatling Gun. Located in Cody Wyoming near Yellowstone.');
		$this->render('packages','frontend');
	}
	

	/*
	public function featureview($id=null) {
		$this->loadModel('Description');
		if (!$this->Description->exists($id)) {
			throw new NotFoundException(__('Invalid webpage'));
		}
		$options = array('conditions' => array('Description.' . $this->Description->primaryKey => $id));
		$this->set('description', $this->Description->find('first', $options));
		$this->set('others', $this->Description->find('all', array('conditions'=>array('Description.id !='=>$id))));
		$this->render('featureview','frontend');
	}
	*/
	

	public function pickpkg(){
		$pickpkg=$this->CFE_services;
		$this->set(compact('pickpkg'));
		$this->set('TheTitle','Package Selection');
		$this->render('pickpkg','frontend');
	}

	public function pickdate($package_id=null,$session_id=null){
		if (!isset($package_id) || !isset($session_id)){
			$this->Session->setFlash('Please select a package first', 'flash_danger');
			return $this->redirect(array('action' => 'pickpkg'));	
		}
		$dates=array();
		$closed=array();
		for ($i=0;$i<$this->CFE_settings['maxBookableDays'];$i++){
			$theday=date('Y-m-d', strtotime('today + '.$i.' days'));
			$dates[$theday]=$theday;

			foreach ($this->CFE_settings['weekdaysOff'] as $day) if (date('l',strtotime($dates[$theday]))==$day) {$dates[$theday]='CLOSED'; $closed[$i]=$theday; unset($dates[$theday]); break;}
			if (isset($dates[$theday])){
				foreach ($this->CFE_settings['closedDays'] as $day) if (date('Y-m-d',strtotime($dates[$theday]))==$day){ $dates[$theday]='CLOSED'; $closed[$i]=$theday; unset($dates[$theday]); break;}
			}
			
			//set the last day over and over
			$lastday=$theday;
		}
		//debug($dates);

				
		//debug($lastday);			
		$selected_package=$this->CFE_services[$package_id];
		
		$this->set(compact('lastday','dates','closed','selected_package','package_id','session_id'));
		$this->set('TheTitle','Date Selection');
		$this->render('pickdate','frontend');
	}


	public function picktime(){
		if ($this->request->is('post')) {
			$pickdate=date('Y-m-d',strtotime($this->request->data['Firearm']['pickdate']));
			//make sure the date is valid and within range
			$max=$this->CFE_settings['maxBookableDays']-1;
			if ($pickdate<date('Y-m-d')||$pickdate>date('Y-m-d', strtotime('today + '.$max.' days'))) $pickdate=date('Y-m-d');
			$package_id=$this->request->data['Firearm']['package_id'];
			$session_id=$this->request->data['Firearm']['session_id'];
			
			require_once('MB_API.php');
			$mb = new MB_API();
			//begin making the options array
			$options['StartDate']=$pickdate;
			$options['EndDate']=$pickdate;
			//this is REQUIRED for the call
			$options['SessionTypeIDs']=array($session_id);
			$data = $mb->GetBookableItems($options);
			//debug($data);
			if ($data['GetBookableItemsResult']['ErrorCode']==200){
				//successful
				$available_times=array();
				//if a single item make into array
				if (isset($data['GetBookableItemsResult']['ScheduleItems']['ScheduleItem']['ID'])){
						$temp_data=array();
						$temp_data=$data['GetBookableItemsResult']['ScheduleItems']['ScheduleItem'];
						unset($data['GetBookableItemsResult']['ScheduleItems']['ScheduleItem']);
						$data['GetBookableItemsResult']['ScheduleItems']['ScheduleItem'][0]=$temp_data;
					}
				$staff_times=array();
				foreach($data['GetBookableItemsResult']['ScheduleItems']['ScheduleItem'] as $key=>$schitem){
					//debug($schitem);
					$interval=$schitem['StartDateTime'];
					do {
						//make sure not in the past, GetBookableItems returns past times, time zone is set in private config file. 900 is a 15 minute
						//the key is the interval and then topmost available staff_id. If we get too busy then we'll need to do something else to make sure *all* staff 
						if (strtotime($interval) > (time()+900)){
							$available_times[strtotime($interval)]=$schitem['Staff']['ID'];
						}
						$interval=date('c',strtotime($interval)+$this->CFE_settings['bookingInterval']);
						//debug($schitem['Staff']['ID']);
					}
					while ($interval <= $schitem['EndDateTime']);
				}
			}
			//API response not successful
			else{
				$this->Session->setFlash('Sorry, something went wrong finding Bookable Items.', 'flash_danger');
				debug($data);
			}
			ksort($available_times);
			
			$selected_package=$this->CFE_services[$package_id];
		//	$this->set('request',$mb->getXMLRequest());
			$this->set(compact('available_times','pickdate','package_id','session_id','selected_package'));
			$this->set('TheTitle','Time slot selection');
			$this->render('picktime','frontend');
		}
		else{
			$this->Session->setFlash('Please select date first', 'flash_danger');
			return $this->redirect(array('action' => 'pickpkg'));	
		}		
	}
	
	public function cart(){
		$services=$this->CFE_services;
		$extras=$this->CFE_extras;
		$discounts=$this->CFE_discounts;
		$this->Cookie->delete('CheckoutTotal');
		$cart_items=$this->Cookie->read('CartItems');
		//debug($cart_items);

		
		//remove expired items
		if (isset($cart_items['Services'])){
			foreach ($cart_items['Services'] as $date=>$item){
				if (strtotime($date)<time()+900){ 
				unset($cart_items['Services'][$date]);
				$this->Session->setFlash('Some items may have expired and were removed.', 'flash_danger');
				}
			}
			if (count($cart_items['Services'])<1) unset($cart_items['Services']);
			$this->Cookie->write('CartItems',$cart_items);
		}
		if (!$cart_items) $this->Session->setFlash('Your cart is empty!', 'flash_danger');
		
		//came from the picktime action, basically build an array and then write it to a cookie, should be a proper "CartItem" 
		if (isset($this->request->data['Picktime'])){
			$picktime=$this->request->data['Picktime'];
			//debug($picktime);
			$mbtime=date('H:i',strtotime($picktime['slot']));
			//make sure you always have trailing zeros or bookings do not work!!
			$mbdate=$picktime['picktime'].'T'.$mbtime.':00';
			$cart_items['Services'][$mbdate]=$services[$picktime['package_id']];
			$cart_items['Services'][$mbdate]['StaffID']=$picktime[$picktime['slot']];
			$this->Cookie->delete('CartItems');
			$this->Cookie->write('CartItems',$cart_items);
			//debug($cart_items);
			$this->Session->setFlash('Complete checkout to confirm reservation', 'flash_danger');
		}
		//came from cart itself, this is update and checkout
		if (isset($this->request->data['Cart']['update_button']) || isset($this->request->data['Cart']['checkout_button'])){
		//first update cart
			$update=$this->request->data['Cart'];
			//debug($this->request->data);
			$cart_items=$this->Cookie->read('CartItems');
			$this->Cookie->delete('CartItems');
			unset($cart_items['Extras']);
			foreach ($update['Extras'] as $id=>$qty){
				//use the id as the key to prevent the same item show in cart twice
				$cart_items['Extras'][$id]=$qty;
			}
			
			if (isset($this->request->data['Firearm'])){
				foreach ($this->request->data['Firearm'] as $dbl=>$on){
					if ($on==1) $cart_items['Services'][$dbl]['Double']='Double';
					else unset($cart_items['Services'][$dbl]['Double']);
					
					//discounts
					if ($dbl=='Discount'){
						//$discount_array=explode('_',$on);
						//explode it later
						$cart_items['Discount']=$on;
					}
					
				}
			}
			
			
			$this->Cookie->write('CartItems',$cart_items);
			$this->Session->setFlash('Updated quantities', 'flash_success');
			if(isset($this->request->data['Cart']['checkout_button'])){
				//write Checkout cookie to match cookie, checkout page will match them
				$this->Cookie->write('CheckoutItems',$cart_items);
				return $this->redirect(array('action' => 'checkout'));
			}
			
		}
		
		//make a total AFTER everything is updated. This total does not include tax!
		$cart_total=0;
		if (isset($cart_items['Services'])){
			foreach ($cart_items['Services'] as $mbdate=>$pid){
				$cart_total=$cart_total+$pid['OnlinePrice'];
					if (isset($pid['Double'])){
						//debug($pid['DoubleTypeID']['OnlinePrice']);
						$cart_total=$cart_total+$pid['DoubleInfo']['OnlinePrice'];
					}					
			}
		}
		if (isset($cart_items['Extras'])){
			foreach ($cart_items['Extras'] as $pid=>$qty){
				$cart_total=$cart_total+($extras[$pid]['OnlinePrice']*$qty);	
			}
		}
		if (isset($cart_items['Discount'])){
			$discount_array=explode('_',$cart_items['Discount']);
			$cart_total=$cart_total-$discount_array[0];
		}
		$this->set(compact('cart_items','packages','extras','cart_total','discounts'));
		$this->set('TheTitle','Cart');
		$this->render('cart','frontend');
	}
	
	public function cart_remove_package($mbdate=null){
		$cart_items=$this->Cookie->read('CartItems');
		$this->Cookie->delete('CartItems');
		unset($cart_items['Services'][urldecode($mbdate)]);
		if (count($cart_items['Services'])<1) unset($cart_items['Services']);
		$this->Cookie->write('CartItems',$cart_items);
		$flash='Item removed from cart';
		$this->Session->setFlash($flash, 'flash_custom');
		return $this->redirect(array('action' => 'cart'));
		
		//cookies never write if you don't render to valid view!
		$this->render('cart','frontend');
	}
	
	public function checkout(){
		$services=$this->CFE_packages;
		$extras=$this->CFE_extras;


		$checkout_items=$this->Cookie->read('CheckoutItems');
		if (!isset($checkout_items['Services'])){
			$this->Session->setFlash('No current package selected. Selected package may have expired.', 'flash_custom');
			return $this->redirect(array('action' => 'cart'));
		}
		
		//write the total to Cookie so we can compare it.
		$checkout_total=0;
		$tax_total=0;
		$final_total=0;
		if (isset($checkout_items['Services'])){
			foreach ($checkout_items['Services'] as $mbdate=>$pid){
				$checkout_total=$checkout_total+$pid['OnlinePrice'];	
				$final_total=$final_total+$pid['ExtendedPrice'];
				if (isset($pid['Double'])){
					$checkout_total=$checkout_total+$pid['DoubleInfo']['OnlinePrice'];
					$final_total=$final_total+$pid['DoubleInfo']['ExtendedPrice'];
				}
			}
		}
		if (isset($checkout_items['Extras'])){
			foreach ($checkout_items['Extras'] as $pid=>$qty){
				if ($qty>0){
				$checkout_total=$checkout_total+($extras[$pid]['OnlinePrice']*$qty);	
				$final_total=$final_total+($extras[$pid]['ExtendedPrice']*$qty);	
				}		
			}
		}
		if (isset($checkout_items['Discount'])){
		//$checkout_total=$checkout_total-
		debug($checkout_items['Discount']);
		}
		$tax_total=$final_total-$checkout_total;
		$final_total=round($final_total,2);
		$this->Cookie->write('CheckoutTotal',$final_total);
		$this->Cookie->write('SubTotals',array('tax'=>$tax_total,'sub'=>$checkout_total));
		$this->set(compact('checkout_items','services','extras','final_total','checkout_total','tax_total'));
		$this->set('TheTitle','Checkout Step One');
		$this->render('checkout','frontend');
	}
	
	public function transact(){
		if (isset($this->request->data['Firearm'])){
			$checkout_items=$this->Cookie->read('CheckoutItems');
			//debug($checkout_items);
			$client=$this->request->data['Firearm'];
			$client['Username']='web'.time();
			$client['BirthDate']=date('Y-m-d',strtotime($client['BirthDate']));
			$client['Password']=time().Configure::read('userPasswords');
			$client['Notes']=$_SERVER['REMOTE_ADDR'].'-'.time();
			//$client['Gender']='Male';
			//$client['LiabilityRelease']=0;
			$client['ID']=CakeText::uuid();
			$client['EmailOptIn']=0;
			$client['ReferredBy']='website';
			
			require_once('MB_API.php');
			$mb = new MB_API();
			$add=$mb->AddOrUpdateClients(array('XMLDetail'=>'Basic',
				'Test'=>true,
				'Clients'=>array('Client'=>$client)));
				/*
				Set test to false, then debug "add" to get a real client ID then set test back to false to avoid flooding DB with test clients
				*/
			//debug($add);
			if ($add['AddOrUpdateClientsResult']['ErrorCode']==200){
				//client added, now checkout the cart
				//use this amount to ensure there was no discrepency (i.e. open in another window)
				$Amount=$this->Cookie->read('CheckoutTotal');
				//make array ready for MINDBODY API
				$CartItems=array();
				$itemkey=0;
				//set higher for testing
				if (null !== Configure::read('discountAmount')) $discount=Configure::read('discountAmount');
				else $discount=0;
				foreach ($checkout_items['Services'] as $mbdate=>$service){	
					//you can set very high discount amounts for testing (so the comp works)
					//running the URLs over https fails and I don't know why, nor do I know if it will matter as long as the request is sent over https
					$CartItems[$itemkey]['Quantity']=1;
					$CartItems[$itemkey]['DiscountAmount']=$discount;
					$CartItems[$itemkey]['Item'] = new SoapVar(array('ID'=>$service['barcodeID']), SOAP_ENC_ARRAY, 'Service', 'http://clients.mindbodyonline.com/api/0_5');
					//this part will often return NULL at the slightest error, make sure the ABOVE call is working as it relies on it (and goes to the same key)
					$CartItems[$itemkey]['Appointments']['Appointment']=array('StartDateTime'=>$mbdate,'Location'=>array('ID'=>1),'Staff'=>array('ID'=>$service['StaffID'],'isMale'=>false),'SessionType'=>array('ID'=>$service['SessionTypeID']),'Notes'=>'TESTING'); // the notes don't work, leaving them here to remind me
					$itemkey++;
					//then the Double
					if (isset($service['Double'])){
						if ($service['Double']=='Double'){
							$CartItems[$itemkey]['Quantity']=1;
							$CartItems[$itemkey]['Item'] = new SoapVar(array('ID'=>$service['DoubleTypeID']), SOAP_ENC_ARRAY, 'Product', 'http://clients.mindbodyonline.com/api/0_5');
							$CartItems[$itemkey]['DiscountAmount']=$discount;
							$itemkey++;
						}
					}	
				}
				foreach ($checkout_items['Extras'] as $product_id=>$qty){
					if ($qty>0){
						$CartItems[$itemkey]['Quantity']=$qty;
						$CartItems[$itemkey]['Item'] = new SoapVar(array('ID'=>$product_id), SOAP_ENC_ARRAY, 'Product', 'http://clients.mindbodyonline.com/api/0_5');
						$CartItems[$itemkey]['DiscountAmount']=$discount;
						$itemkey++;
						//debug($CartItems);
					}
				}

				//build payment info
				$PaymentInfo['CreditCardNumber']=$this->request->data['Firearm']['CreditCardNumber'];
				$PaymentInfo['Amount']=$Amount;
				//$PaymentInfo['Amount']=0;

				
				if (strlen($this->request->data['Firearm']['ExpYear'])==2) $PaymentInfo['ExpYear']='20'.$this->request->data['Firearm']['ExpYear'];
				else $PaymentInfo['ExpYear']=$this->request->data['Firearm']['ExpYear'];
				$PaymentInfo['ExpMonth']=$this->request->data['Firearm']['ExpMonth'];
				$PaymentInfo['BillingName']=$this->request->data['Firearm']['BillingName'];
				
				if ($this->request->data['Firearm']['SameBilling'] !=true){
					$PaymentInfo['BillingAddress']=$this->request->data['Firearm']['BillingAddress'];
					$PaymentInfo['BillingCity']=$this->request->data['Firearm']['BillingCity'];
					$PaymentInfo['BillingState']=$this->request->data['Firearm']['BillingState'];
					$PaymentInfo['BillingPostalCode']=$this->request->data['Firearm']['BillingPostalCode'];
				}
				else{
					$PaymentInfo['BillingAddress']=$this->request->data['Firearm']['AddressLine1']."\n".$this->request->data['Firearm']['AddressLine2'];
					$PaymentInfo['BillingCity']=$this->request->data['Firearm']['City'];
					$PaymentInfo['BillingState']=$this->request->data['Firearm']['State'];
					$PaymentInfo['BillingPostalCode']=$this->request->data['Firearm']['PostalCode'];
				}
				$Payments['PaymentInfo']=new SoapVar($PaymentInfo, SOAP_ENC_ARRAY, 'CreditCardInfo', 'http://clients.mindbodyonline.com/api/0_5');
				
				//for testing with comp
				//$Payments['PaymentInfo']=new SoapVar(array('Amount'=>0), SOAP_ENC_ARRAY, 'CompInfo', 'http://clients.mindbodyonline.com/api/0_5');

				$checkout=$mb->CheckoutShoppingCart(array('Test'=>false,'ClientID'=>$add['AddOrUpdateClientsResult']['Clients']['Client']['ID'],
					//just for testing! (proper value is set above)
					'ClientID'=>'56c2111d-25c8-48c0-bb25-48cdc0a80194',
					//this is a TEST client from production
					'ClientID'=>'20160111185337924',
					'CartItems'=>$CartItems,
					'Payments'=>$Payments,
					//products WILL NOT SELL unless you say InStore...
					'InStore'=>true
				));
				//debug($CartItems);
				//debug($checkout);
				
				//NOTICE: It only returns the last appointment booked, but I confirmed it DOES book them all in MINDBODY
				if ($checkout['CheckoutShoppingCartResult']['ErrorCode']==200){
				//wow it's a miracle
					$this->Cookie->write(array('SuccessfulCheckout'=>'miracle'));
					$this->Session->setFlash('Booking successful. See you soon!', 'flash_success');
					return $this->redirect(array('action' => 'thankyou'));
					
				
				}
				else {
					$this->Session->setFlash('The request to checkout failed please try again or contact us.', 'flash_danger');
					debug($checkout);
				}
				
				//$this->set('request',$mb->getXMLRequest());
			}
			else {
				$this->Session->setFlash('Unable to save client, please ensure all fields are filled out properly.', 'flash_danger');
				debug($add);
			}
		}
		
		$subs=$this->Cookie->read('SubTotals');
		$final_total=$this->Cookie->read('CheckoutTotal');
		$tax_total=$subs['tax'];
		$checkout_total=$subs['sub'];
		$this->set(compact('final_total','tax_total','checkout_total'));
		$this->set('TheTitle','Final Checkout');
		$this->render('transact','frontend');
	}
	public function thankyou() {
	//need to add tracking pixel here!!
	$legit=$this->Cookie->read('SuccessfulCheckout');
	if ($legit=='miracle'){
			$cart=$this->Cookie->read('CartItems');
			//erase all trace!
			$this->Session->destroy();
			$this->Cookie->destroy();
			$this->set(compact('cart'));
			$this->set('TheTitle','Confirmation');
			$this->render('thankyou','frontend');
		}
	
	else{
		$this->Session->setFlash('Page Expired.', 'flash_danger');
		return $this->redirect(array('action'=>'pickpkg'));
		}
	}
	
	public function secretlogin(){
		if ($this->request->is('post')) {
			if($this->request->data['Login']['pwd']==Configure::read('login_password')){
				if ($this->Auth->login(array('username'=>'admin'))) {
					return $this->redirect($this->Auth->redirectUrl());
					$this->Session->setFlash('Logged in.', 'flash_success');
				}
				else{
					$this->Session->setFlash('Something is broken.', 'flash_danger');
				}
			}
			else{
				$this->Session->setFlash('Ehh... IP logged', 'flash_danger');
			}
		}
		//use a private variable to name the action, it's also gitignored
		$this->render('secretlogin','frontend');
	}
	public function logout(){
	if ($this->Auth->logout()) {
		//return $this->redirect($this->Auth->redirectUrl());
		$this->Session->setFlash('Ok bye-bye.', 'flash_success');
		return $this->redirect('/');
	}
	}
	//everything below is useful test stuff (and is now located on the Old controller file)
}
