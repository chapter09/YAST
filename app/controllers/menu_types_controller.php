<?php
class MenuTypesController extends AppController {

	var $name = 'MenuTypes';

	function index() {
		$this->MenuType->recursive = 0;
		$this->set('menuTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid menu type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('menuType', $this->MenuType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MenuType->create();
			if ($this->MenuType->save($this->data)) {
				$this->Session->setFlash(__('The menu type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu type could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid menu type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MenuType->save($this->data)) {
				$this->Session->setFlash(__('The menu type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MenuType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for menu type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MenuType->delete($id)) {
			$this->Session->setFlash(__('Menu type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Menu type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
