<?php
class PagesController extends AppController {

	var $name = 'Pages';
  var $helpers = array('Html', 'Form', 'Cksource'); 
  var $components = array('Session', 'DebugKit.Toolbar');

	function index() {
		$this->Page->recursive = 0;
		$this->set('pages', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid page', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->Page->setLocale($this->Session->read('Config.language'));
		$this->set('page', $this->Page->read(null, $id));
	}

	function add() {
    $this->Page->setLocale(array('eng','chi'));
		if (!empty($this->data)) {
			$this->Page->create();
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash(__('The page has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.', true));
			}
		}
		$events = $this->Page->Event->find('list');
		$menuTypes = $this->Page->MenuType->find('list');
		$this->set(compact('events', 'menuTypes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid page', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->Page->setLocale(array('eng','chi'));
    $this->Page->multiTranslateOptions(array('validate'=>true,'find'=>true));

		if (!empty($this->data)) {
			if ($this->Page->save($this->data)) {
				$this->Session->setFlash(__('The page has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The page could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Page->read(null, $id);
		}
		$events = $this->Page->Event->find('list');
		$menuTypes = $this->Page->MenuType->find('list');
		$this->set(compact('events', 'menuTypes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for page', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Page->delete($id)) {
			$this->Session->setFlash(__('Page deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Page was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
