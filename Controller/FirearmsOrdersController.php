<?php
App::uses('AppController', 'Controller');
/**
 * FirearmsOrders Controller
 *
 * @property FirearmsOrder $FirearmsOrder
 * @property PaginatorComponent $Paginator
 */
class FirearmsOrdersController extends AppController {

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
		$this->FirearmsOrder->recursive = 0;
		$this->set('firearmsOrders', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->FirearmsOrder->exists($id)) {
			throw new NotFoundException(__('Invalid firearms order'));
		}
		$options = array('conditions' => array('FirearmsOrder.' . $this->FirearmsOrder->primaryKey => $id));
		$this->set('firearmsOrder', $this->FirearmsOrder->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->FirearmsOrder->create();
			if ($this->FirearmsOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The firearms order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The firearms order could not be saved. Please, try again.'));
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
		if (!$this->FirearmsOrder->exists($id)) {
			throw new NotFoundException(__('Invalid firearms order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->FirearmsOrder->save($this->request->data)) {
				$this->Session->setFlash(__('The firearms order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The firearms order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('FirearmsOrder.' . $this->FirearmsOrder->primaryKey => $id));
			$this->request->data = $this->FirearmsOrder->find('first', $options);
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
		$this->FirearmsOrder->id = $id;
		if (!$this->FirearmsOrder->exists()) {
			throw new NotFoundException(__('Invalid firearms order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->FirearmsOrder->delete()) {
			$this->Session->setFlash(__('The firearms order has been deleted.'));
		} else {
			$this->Session->setFlash(__('The firearms order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
