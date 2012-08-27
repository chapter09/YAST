<?php
class EventsController extends AppController {

	var $name = 'Events';
  var $helpers = array('Html', 'Form', 'Javascript', 'Cksource');
  var $components = array('FileUpload', 'DebugKit.Toolbar');


  function beforeFilter(){ 
    parent::beforeFilter();
    $this->FileUpload->fileModel = 'Event';
    $this->FileUpload->fields = array('name' => 'file_name', 
                                      'type' => 'file_type', 
                                      'size' => 'file_size'); 
  }

	function index() {
		$this->Event->recursive = 0;
		$this->set('events', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->Event->setLocale($this->Session->read('Config.language'));
		$this->set('event', $this->Event->read(null, $id));
	}

	function add() {
    $this->Event->setLocale(array('eng','chi'));
		if (!empty($this->data)) {
      if($this->FileUpload->success){ 
        $this->set('image', $this->FileUpload->finalFile);	
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
        $this->Session->setFlash($this->FileUpload->showErrors());
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid event', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->Event->setLocale(array('eng','chi'));
    $this->Event->multiTranslateOptions(array('validate'=>true,'find'=>true));
 
    if (!empty($this->data)) {
      if($this->FileUpload->success){ 
        $this->set('image', $this->FileUpload->finalFile);
				$this->Session->setFlash(__('The event has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
        $this->Session->setFlash($this->FileUpload->showErrors());
				$this->Session->setFlash(__('The event could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Event->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for event', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Event->delete($id)) {
			$this->Session->setFlash(__('Event deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Event was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
