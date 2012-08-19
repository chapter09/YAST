<?php
class EcSlidersController extends AppController {

	var $name = 'EcSliders';
  var $helpers = array('Html', 'Form', 'Javascript', 'Cksource');
  var $components = array('FileUpload');

  function beforeFilter(){ 
    parent::beforeFilter();
    $this->FileUpload->fileModel = 'EcSlider';
    $this->FileUpload->fields = array('name' => 'file_name', 
                                      'type' => 'file_type', 
                                      'size' => 'file_size'); 
  }

	function index() {
		$this->EcSlider->recursive = 0;
		$this->set('ecSliders', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ec slider', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ecSlider', $this->EcSlider->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
      if($this->FileUpload->success){ 
        $this->set('image', $this->FileUpload->finalFile);		
				$this->Session->setFlash(__('The ec slider has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
        $this->Session->setFlash($this->FileUpload->showErrors());
				$this->Session->setFlash(__('The ec slider could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ec slider', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		  if($this->FileUpload->success){ 
        $this->set('image', $this->FileUpload->finalFile);	
				$this->Session->setFlash(__('The ec slider has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
        $this->Session->setFlash($this->FileUpload->showErrors());	
				$this->Session->setFlash(__('The ec slider could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EcSlider->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ec slider', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EcSlider->delete($id)) {
			$this->Session->setFlash(__('Ec slider deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ec slider was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
