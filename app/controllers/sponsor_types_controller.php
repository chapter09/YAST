<?php
class SponsorTypesController extends AppController {

	var $name = 'SponsorTypes';

	function index() {
		$this->SponsorType->recursive = 0;
		$this->set('sponsorTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid sponsor type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('sponsorType', $this->SponsorType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SponsorType->create();
			if ($this->SponsorType->save($this->data)) {
				$this->Session->setFlash(__('The sponsor type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sponsor type could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid sponsor type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SponsorType->save($this->data)) {
				$this->Session->setFlash(__('The sponsor type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The sponsor type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SponsorType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for sponsor type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SponsorType->delete($id)) {
			$this->Session->setFlash(__('Sponsor type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Sponsor type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
