<?php
class EventAppliesController extends AppController {

	var $name = 'EventApplies';

	function index() {
		$this->EventApply->recursive = 0;
		$this->set('eventApplies', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event apply', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('eventApply', $this->EventApply->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EventApply->create();
			if ($this->EventApply->save($this->data)) {
				$this->Session->setFlash(__('Thank you for your subscription.', true));
				$this->redirect(array(
              'controller' => 'sites',
              'event_id' => $this->data['EventApply']['event_id'],
              'action' => 'index'
            ));
			} else {
				$this->Session->setFlash(__('The event apply could not be saved. Please, try again.', true));
			}
		}
		$events = $this->EventApply->Event->find('list');
		$this->set(compact('events'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event apply', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EventApply->save($this->data)) {
				$this->Session->setFlash(__('The event apply has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The event apply could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EventApply->read(null, $id);
		}
		$events = $this->EventApply->Event->find('list');
		$this->set(compact('events'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event apply', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EventApply->delete($id)) {
			$this->Session->setFlash(__('Event apply deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event apply was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
