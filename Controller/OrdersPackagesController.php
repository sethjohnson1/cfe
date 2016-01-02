<?php
App::uses('AppController', 'Controller');
/**
 * OrdersPackages Controller
 *
 * @property OrdersPackage $OrdersPackage
 * @property PaginatorComponent $Paginator
 */
class OrdersPackagesController extends AppController {

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
		$this->OrdersPackage->recursive = 0;
		$this->set('ordersPackages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->OrdersPackage->exists($id)) {
			throw new NotFoundException(__('Invalid orders package'));
		}
		$options = array('conditions' => array('OrdersPackage.' . $this->OrdersPackage->primaryKey => $id));
		$this->set('ordersPackage', $this->OrdersPackage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->OrdersPackage->create();
			if ($this->OrdersPackage->save($this->request->data)) {
				$this->Session->setFlash(__('The orders package has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orders package could not be saved. Please, try again.'));
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
		if (!$this->OrdersPackage->exists($id)) {
			throw new NotFoundException(__('Invalid orders package'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->OrdersPackage->save($this->request->data)) {
				$this->Session->setFlash(__('The orders package has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The orders package could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('OrdersPackage.' . $this->OrdersPackage->primaryKey => $id));
			$this->request->data = $this->OrdersPackage->find('first', $options);
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
		$this->OrdersPackage->id = $id;
		if (!$this->OrdersPackage->exists()) {
			throw new NotFoundException(__('Invalid orders package'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->OrdersPackage->delete()) {
			$this->Session->setFlash(__('The orders package has been deleted.'));
		} else {
			$this->Session->setFlash(__('The orders package could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
