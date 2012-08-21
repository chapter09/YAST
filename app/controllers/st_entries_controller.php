<?php
class StEntriesController extends AppController {

	var $name = 'StEntries';
  var $helpers = array('Html', 'Form', 'Cksource');
  var $components = array('Session', 'DebugKit.Toolbar');

	function index() {
		$this->StEntry->recursive = 0;
		$this->set('stEntries', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid st entry', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->StEntry->setLocale($this->Session->read('Config.language'));
		$this->set('stEntry', $this->StEntry->read(null, $id));
	}

	function add() {
    $this->StEntry->setLocale(array('eng','chi'));
		if (!empty($this->data)) {
			$this->StEntry->create();
			if ($this->StEntry->save($this->data)) {
				$this->Session->setFlash(__('The st entry has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The st entry could not be saved. Please, try again.', true));
			}
		}
		$stTypes = $this->StEntry->StType->find('list');
		$this->set(compact('stTypes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid st entry', true));
			$this->redirect(array('action' => 'index'));
		}

    $this->StEntry->setLocale(array('eng','chi'));
    $this->StEntry->multiTranslateOptions(array('validate'=>true,'find'=>true));
 
		if (!empty($this->data)) {
			if ($this->StEntry->save($this->data)) {
				$this->Session->setFlash(__('The st entry has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The st entry could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StEntry->read(null, $id);
		}
		$stTypes = $this->StEntry->StType->find('list');
		$this->set(compact('stTypes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for st entry', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StEntry->delete($id)) {
			$this->Session->setFlash(__('St entry deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('St entry was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
