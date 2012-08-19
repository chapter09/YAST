<?php
class SponsorsController extends AppController {

	var $name = 'Sponsors'; 
  var $helpers = array('Html', 'Form');
  var $components = array('FileUpload', 'DebugKit.Toolbar');


  function beforeFilter(){ 
    parent::beforeFilter();
    $this->FileUpload->fileModel = 'Sponsor';
    $this->FileUpload->fields = array('name' => 'file_name', 
                                      'type' => 'file_type', 
                                      'size' => 'file_size'); 
  }


	function index() {
		$this->Sponsor->recursive = 0;
		$this->set('sponsors', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid sponsor', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('sponsor', $this->Sponsor->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
      if($this->FileUpload->success){ 
        $this->set('image', $this->FileUpload->finalFile);	
				$this->Session->setFlash(__('The sponsor has been saved', true));
        $this->redirect(array('action' => 'index'));
      }else{
        $this->Session->setFlash($this->FileUpload->showErrors());
				$this->Session->setFlash(__('The sponsor could not be saved. Please, try again.', true));
      }
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid sponsor', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
      if($this->FileUpload->success){ 
        $this->set('image', $this->FileUpload->finalFile);
				$this->Session->setFlash(__('The sponsor has been saved', true)); 
				$this->redirect(array('action' => 'index'));
      }else{
        $this->Session->setFlash($this->FileUpload->showErrors());
				$this->Session->setFlash(__('The sponsor could not be saved. Please, try again.', true));
      }
		}
		if (empty($this->data)) {
			$this->data = $this->Sponsor->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for sponsor', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Sponsor->delete($id)) {
			$this->Session->setFlash(__('Sponsor deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Sponsor was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
