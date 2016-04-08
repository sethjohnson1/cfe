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
		$desc=$this->Description->find('all',array('conditions'=>array('Description.pagetype'=>'history','Description.visible'=>true)));
		$history_menu=array();
		foreach ($desc as $d){
			$history_menu[$d['Description']['name']]=array('controller'=>'firearms','action'=>'learn','history',$d['Description']['slug']);
		}
		$desc=$this->Description->find('all',array('conditions'=>array('Description.pagetype'=>'firearm','Description.visible'=>true)));
		$firearm_menu=array();
		foreach ($desc as $d){
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
			'Firearms History'=>array('dropdown'=>$history_menu),
			'Our Firearms'=>array('dropdown'=>$firearm_menu),
			'Packages'=>array('controller'=>'firearms','action'=>'packages')
		);
		$this->set(compact('menu_array'));
	}
  
}
