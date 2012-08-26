<?php
class EventSponsorsController extends AppController {

	var $name = 'EventSponsors';

	function index() {
		$this->EventSponsor->recursive = 0;
		$this->set('eventSponsors', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event sponsor', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eventSponsor', $this->EventSponsor->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EventSponsor->create();
			if ($this->EventSponsor->save($this->data)) {
				$this->Session->setFlash(__('The event sponsor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event sponsor could not be saved. Please, try again.', true));
			}
		}
		$sponsorTypes = $this->EventSponsor->SponsorType->find('list');
		$events = $this->EventSponsor->Event->find('list');
		$this->set(compact('sponsorTypes', 'events'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event sponsor', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EventSponsor->save($this->data)) {
				$this->Session->setFlash(__('The event sponsor has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event sponsor could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EventSponsor->read(null, $id);
		}
		$sponsorTypes = $this->EventSponsor->SponsorType->find('list');
		$events = $this->EventSponsor->Event->find('list');
		$this->set(compact('sponsorTypes', 'events'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event sponsor', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EventSponsor->delete($id)) {
			$this->Session->setFlash(__('Event sponsor deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event sponsor was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
