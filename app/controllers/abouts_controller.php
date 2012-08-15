<?php
class AboutsController extends AppController {

	var $name = 'Abouts';
  var $helpers = array('Html', 'Form', 'Javascript', 'Cksource');

	function index() {
		$this->About->recursive = 0;
		$this->set('abouts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid about', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->About->setLocale($this->Session->read('Config.language'));
		$this->set('about', $this->About->read(null, $id));
	}

	function add() {
    $this->About->setLocale(array('eng','chi'));
		if (!empty($this->data)) {
			$this->About->create();
			if ($this->About->save($this->data)) {
				$this->Session->setFlash(__('The about has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid about', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->About->setLocale(array('eng','chi'));
    $this->About->multiTranslateOptions(array('validate'=>true,'find'=>true));
		if (!empty($this->data)) {
			if ($this->About->save($this->data)) {
				$this->Session->setFlash(__('The about has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The about could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->About->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for about', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->About->delete($id)) {
			$this->Session->setFlash(__('About deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('About was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
