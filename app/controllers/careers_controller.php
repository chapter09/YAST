<?php
class CareersController extends AppController {

	var $name = 'Careers';
  var $helpers = array('Html', 'Form', 'Cksource'); 
  var $components = array('Session', 'DebugKit.Toolbar');
  
	function index() {
		$this->Career->recursive = 0;
		$this->set('careers', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid career', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->Career->setLocale($this->Session->read('Config.language'));
		$this->set('career', $this->Career->read(null, $id));
	}

	function add() {
    $this->Career->setLocale(array('eng','chi'));
		if (!empty($this->data)) {
			$this->Career->create();
			if ($this->Career->save($this->data)) {
				$this->Session->setFlash(__('The career has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid career', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->Career->setLocale(array('eng','chi'));
    $this->Career->multiTranslateOptions(array('validate'=>true,'find'=>true));

		if (!empty($this->data)) {
			if ($this->Career->save($this->data)) {
				$this->Session->setFlash(__('The career has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The career could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Career->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for career', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Career->delete($id)) {
			$this->Session->setFlash(__('Career deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Career was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
