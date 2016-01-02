<?php
App::uses('AppController', 'Controller');
/**
 * Webpages Controller
 *
 * @property Webpage $Webpage
 * @property PaginatorComponent $Paginator
 */
class WebpagesController extends AppController {

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
		$this->Webpage->recursive = 0;
		$this->set('webpages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Webpage->exists($id)) {
			throw new NotFoundException(__('Invalid webpage'));
		}
		$options = array('conditions' => array('Webpage.' . $this->Webpage->primaryKey => $id));
		$this->set('webpage', $this->Webpage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Webpage->create();
			if ($this->Webpage->save($this->request->data)) {
				$this->Session->setFlash(__('The webpage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webpage could not be saved. Please, try again.'));
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
		if (!$this->Webpage->exists($id)) {
			throw new NotFoundException(__('Invalid webpage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Webpage->save($this->request->data)) {
				$this->Session->setFlash(__('The webpage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The webpage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Webpage.' . $this->Webpage->primaryKey => $id));
			$this->request->data = $this->Webpage->find('first', $options);
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
		$this->Webpage->id = $id;
		if (!$this->Webpage->exists()) {
			throw new NotFoundException(__('Invalid webpage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Webpage->delete()) {
			$this->Session->setFlash(__('The webpage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The webpage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
