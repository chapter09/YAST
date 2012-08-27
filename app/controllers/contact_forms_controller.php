<?php
class ContactFormsController extends AppController {

	var $name = 'ContactForms';

	function index() {
		$this->ContactForm->recursive = 0;
		$this->set('contactForms', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid contact form', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contactForm', $this->ContactForm->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ContactForm->create();
			if ($this->ContactForm->save($this->data)) {
				$this->Session->setFlash(__('The contact form has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact form could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid contact form', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ContactForm->save($this->data)) {
				$this->Session->setFlash(__('The contact form has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contact form could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ContactForm->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for contact form', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ContactForm->delete($id)) {
			$this->Session->setFlash(__('Contact form deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Contact form was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
