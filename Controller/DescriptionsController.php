<?php
App::uses('AppController', 'Controller');

class DescriptionsController extends AppController {

	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
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
		$this->set('descriptions', $this->Paginator->paginate());
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
		$products = $this->Description->Product->find('list',array('conditions' => array('Product.CategoryName' => 'Service')));
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
	$products = $this->Description->Product->find('list',array('conditions' => array('Product.CategoryName' => 'Service')));
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
