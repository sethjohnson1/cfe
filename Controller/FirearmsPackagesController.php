<?php
App::uses('AppController', 'Controller');
/**
 * FirearmsPackages Controller
 *
 * @property FirearmsPackage $FirearmsPackage
 * @property PaginatorComponent $Paginator
 */
class FirearmsPackagesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->FirearmsPackage->recursive = 0;
		$this->set('firearmsPackages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FirearmsPackage->exists($id)) {
			throw new NotFoundException(__('Invalid firearms package'));
		}
		$options = array('conditions' => array('FirearmsPackage.' . $this->FirearmsPackage->primaryKey => $id));
		$this->set('firearmsPackage', $this->FirearmsPackage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FirearmsPackage->create();
			if ($this->FirearmsPackage->save($this->request->data)) {
				$this->Session->setFlash(__('The firearms package has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The firearms package could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->FirearmsPackage->exists($id)) {
			throw new NotFoundException(__('Invalid firearms package'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FirearmsPackage->save($this->request->data)) {
				$this->Session->setFlash(__('The firearms package has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The firearms package could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FirearmsPackage.' . $this->FirearmsPackage->primaryKey => $id));
			$this->request->data = $this->FirearmsPackage->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->FirearmsPackage->id = $id;
		if (!$this->FirearmsPackage->exists()) {
			throw new NotFoundException(__('Invalid firearms package'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FirearmsPackage->delete()) {
			$this->Session->setFlash(__('The firearms package has been deleted.'));
		} else {
			$this->Session->setFlash(__('The firearms package could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
