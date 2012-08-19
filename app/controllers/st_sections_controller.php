<?php
class StSectionsController extends AppController {

	var $name = 'StSections';
  var $helpers = array('Html', 'Form', 'Javascript', 'Cksource');

	function index() {
		$this->StSection->recursive = 0;
		$this->set('stSections', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid st section', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stSection', $this->StSection->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->StSection->create();
			if ($this->StSection->save($this->data)) {
				$this->Session->setFlash(__('The st section has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The st section could not be saved. Please, try again.', true));
			}
		}
		$stEntries = $this->StSection->StEntry->find('list');
		$this->set(compact('stEntries'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid st section', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StSection->save($this->data)) {
				$this->Session->setFlash(__('The st section has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The st section could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StSection->read(null, $id);
		}
		$stEntries = $this->StSection->StEntry->find('list');
		$this->set(compact('stEntries'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for st section', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StSection->delete($id)) {
			$this->Session->setFlash(__('St section deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('St section was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
