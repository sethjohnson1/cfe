<?php
App::uses('Controller', 'Controller');
class AppController extends Controller {

	public $components = array('DebugKit.Toolbar','Search.Prg','Session','Auth'=>array('loginRedirect' => array(
                'controller' => 'products',
                'action' => 'settings'
            )));
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->loadModel('Description');
		$desc=$this->Description->find('all',array('conditions'=>array('Description.pagetype'=>'Package','Description.visible'=>true)));
		//debug($desc);
		$pkg_menu=array();
		foreach ($desc as $d){
			$pkg_menu[$d['Description']['name']]=array('controller'=>'firearms','action'=>'gunview',$d['Description']['id']);
		}
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
		$menu_array=array(
			'Features'=>array('dropdown'=>$f_menu),
			'Packages'=>array('dropdown'=>$pkg_menu),
			'Guns'=>array('dropdown'=>$gun_menu)
		);
		$this->set(compact('menu_array'));
	}
  
}
