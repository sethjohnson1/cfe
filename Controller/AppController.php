<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {

	public $components = array('RequestHandler','DebugKit.Toolbar','Search.Prg','Session','Auth'=>array('loginRedirect' => array(
                'controller' => 'products',
                'action' => 'settings'
            )));
	
	public function beforeFilter() {
		parent::beforeFilter();
		//$this->_setupSecurity();
		$this->loadModel('Description');
		$desc=$this->Description->find('all',array('conditions'=>array('Description.pagetype'=>'history','Description.visible'=>true)));
		$history_menu=array();
		foreach ($desc as $d){
			$history_menu[$d['Description']['name']]=array('controller'=>'firearms','action'=>'learn','history',$d['Description']['slug']);
		}
		$desc=$this->Description->find('all',array('conditions'=>array('Description.pagetype'=>'firearm','Description.visible'=>true)));
		$firearm_menu=array();
	/*	foreach ($desc as $d){
			$firearm_menu[$d['Description']['name']]=array('controller'=>'firearms','action'=>'learn','firearm',$d['Description']['slug']);
		}
		/*
		$desc=$this->Description->find('all',array('conditions'=>array('Description.pagetype'=>'Gun','Description.visible'=>true)));
		$gun_menu=array();
		foreach ($desc as $d){
			$gun_menu[$d['Description']['name']]=array('controller'=>'firearms','action'=>'gunview',$d['Description']['id']);
		}
		$desc=$this->Description->find('all',array('conditions'=>array('Description.pagetype'=>'Feature','Description.visible'=>true)));
		$f_menu=array();
		foreach ($desc as $d){
			$f_menu[$d['Description']['name']]=array('controller'=>'firearms','action'=>'featureview',$d['Description']['id']);
		}
		*/
		$menu_array=array(
			//'Features'=>array('dropdown'=>$f_menu),
			//'Features'=>array('controller'=>'firearms','action'=>'features'),
			'Book Now'=>array('controller'=>'firearms','action'=>'packages'),
			'Our Firearms'=>array('controller'=>'firearms','action'=>'selection'),
			//'Our Firearms'=>array('dropdown'=>$firearm_menu),
			'Firearms History'=>array('dropdown'=>$history_menu)
			
			
		);
		$this->set(compact('menu_array'));
	}
/*	
	function _setupSecurity() {
    $this->Security->blackHoleCallback = '_badRequest';
    if(Configure::read('forceSSL')) {
        $this->Security->requireSecure('*');
    }
}

function _badRequest() {
    if(Configure::read('forceSSL') && !$this->RequestHandler->isSSL()) {
        $this->_forceSSL();
    } else {
        $this->cakeError('error400');
    }
    exit;
}
  function _forceSSL() {
    $this->redirect('https://' . env('SERVER_NAME') . $this->here);
    exit;
}
*/
}
