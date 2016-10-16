<?php
App::uses('AppController', 'Controller');

class DescriptionsController extends AppController {

	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->pagetypes=array(
			'package'=>'package',
			'firearm'=>'firearm',
			'history'=>'history'
			//,'Feature'=>'Feature'
		);
		$this->set('pagetypes',$this->pagetypes);
		//$this->Auth->allow('frontview');
	}


/* MOVED THIS TO FIREARMS CONTROLLER TO MAKE AUTH SIMPLER
	public function frontview($id=null) {
		if (!$this->Description->exists($id)) {
			throw new NotFoundException(__('Invalid webpage'));
		}
		$options = array('conditions' => array('Description.' . $this->Description->primaryKey => $id));
		$this->set('description', $this->Description->find('first', $options));
		$this->set('others', $this->Description->find('all', array('conditions'=>array('Description.id !='=>$id))));
		$this->render('frontview','frontend');
	}
	
	*/

	public function index() {
		$this->Description->recursive = 0;
		$conditions=array();
		if (isset($this->request->query['filter'])){
			$conditions=array('Description.pagetype'=>$this->request->query['filter']);
		}
		$this->set('descriptions', $this->Description->find('all',array('conditions'=>$conditions,'order'=>'Description.modified DESC')));
		$this->render('index','frontend');
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Description->create();
			if ($this->Description->save($this->request->data)) {
				$this->Session->setFlash('The Description has been saved.','flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Description could not be saved. Please, try again.','flash_danger');
			}
		}
		$this->request->data['Description']['visible']=1;
		$all_products = $this->Description->Product->find('all',array('conditions' => array('Product.CategoryName' => 'Service')));
		$products=array();
		foreach ($all_products as $k=>$v){
			$products[$v['Product']['SessionTypeID']]=$v['Product']['Name'];
		}
		//debug($products);
		$this->set(compact('products'));
		$this->render('add','frontend');
	}


	public function edit($id = null) {
		if (!$this->Description->exists($id)) {
			throw new NotFoundException(__('Invalid Description'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Description->save($this->request->data)) {
				$this->Session->setFlash('The Description has been saved.','flash_success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The Description could not be saved. Please, try again.','flash_danger');
			}
		} else {
			$options = array('conditions' => array('Description.' . $this->Description->primaryKey => $id));
			$this->request->data = $this->Description->find('first', $options);
		}
		$all_products = $this->Description->Product->find('all',array('conditions' => array('Product.CategoryName' => 'Service')));
		$products=array();
		foreach ($all_products as $k=>$v){
			$products[$v['Product']['SessionTypeID']]=$v['Product']['Name'];
		}
	$this->set(compact('products'));
	$this->set('edit',1);
	$this->render('add','frontend');
	}

	public function delete($id = null) {
		$this->Description->id = $id;
		if (!$this->Description->exists()) {
			throw new NotFoundException(__('Invalid Description'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Description->delete()) {
			$this->Session->setFlash('The Description has been deleted.','flash_success');
		} else {
			$this->Session->setFlash('The Description could not be deleted. Please, try again.','flash_danger');
		}
		return $this->redirect(array('action' => 'index'));
	}
}
