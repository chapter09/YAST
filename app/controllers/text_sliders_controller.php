<?php
class TextSlidersController extends AppController {

	var $name = 'TextSliders';
  var $helpers = array('Html', 'Form', 'Javascript', 'Cksource');

	function index() {
		$this->TextSlider->recursive = 0;
		$this->set('textSliders', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid text slider', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('textSlider', $this->TextSlider->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->TextSlider->create();
			if ($this->TextSlider->save($this->data)) {
				$this->Session->setFlash(__('The text slider has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The text slider could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid text slider', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->TextSlider->save($this->data)) {
				$this->Session->setFlash(__('The text slider has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The text slider could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->TextSlider->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for text slider', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->TextSlider->delete($id)) {
			$this->Session->setFlash(__('Text slider deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Text slider was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
