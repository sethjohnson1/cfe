<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {

	public $components = array('DebugKit.Toolbar','Search.Prg','Session');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->loadModel('Description');
		$desc=$this->Description->find('all');
		//debug($desc);
		$pkg_menu=array();
		foreach ($desc as $d){
			$pkg_menu[$d['Description']['name']]=array('controller'=>'descriptions','action'=>'frontview',$d['Description']['id']);
		}
		$menu_array=array(
			'Home'=>array('action'=>'entry','controller'=>'firearms'),
			'Packages'=>array('dropdown'=>$pkg_menu),
			'Guns'=>array('dropdown'=>array(
				'A','B','C'
			))
		);
		$this->set(compact('menu_array'));
	}
  
}
