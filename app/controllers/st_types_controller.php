<?php
class StTypesController extends AppController {

	var $name = 'StTypes';

	function index() {
		$this->StType->recursive = 0;
		$this->set('stTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid st type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stType', $this->StType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->StType->create();
			if ($this->StType->save($this->data)) {
				$this->Session->setFlash(__('The st type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The st type could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid st type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StType->save($this->data)) {
				$this->Session->setFlash(__('The st type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The st type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for st type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StType->delete($id)) {
			$this->Session->setFlash(__('St type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('St type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
