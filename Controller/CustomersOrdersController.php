<?php
App::uses('AppController', 'Controller');
/**
 * CustomersOrders Controller
 *
 * @property CustomersOrder $CustomersOrder
 * @property PaginatorComponent $Paginator
 */
class CustomersOrdersController extends AppController {

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
		$this->CustomersOrder->recursive = 0;
		$this->set('customersOrders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CustomersOrder->exists($id)) {
			throw new NotFoundException(__('Invalid customers order'));
		}
		$options = array('conditions' => array('CustomersOrder.' . $this->CustomersOrder->primaryKey => $id));
		$this->set('customersOrder', $this->CustomersOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CustomersOrder->create();
			if ($this->CustomersOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The customers order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customers order could not be saved. Please, try again.'));
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
		if (!$this->CustomersOrder->exists($id)) {
			throw new NotFoundException(__('Invalid customers order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->CustomersOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The customers order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customers order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CustomersOrder.' . $this->CustomersOrder->primaryKey => $id));
			$this->request->data = $this->CustomersOrder->find('first', $options);
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
		$this->CustomersOrder->id = $id;
		if (!$this->CustomersOrder->exists()) {
			throw new NotFoundException(__('Invalid customers order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->CustomersOrder->delete()) {
			$this->Session->setFlash(__('The customers order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The customers order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
