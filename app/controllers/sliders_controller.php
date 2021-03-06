<?php
class SlidersController extends AppController {

	var $name = 'Sliders';
  var $helpers = array('Html', 'Form', 'Cksource'); 
  var $components = array('FileUpload', 'Session', 'DebugKit.Toolbar');
  
  function beforeFilter(){ 
    parent::beforeFilter();
    $this->FileUpload->fileModel = 'Slider';
    $this->FileUpload->fields = array('name' => 'file_name', 
                                      'type' => 'file_type', 
                                      'size' => 'file_size'); 
  }

	function index() {
		$this->Slider->recursive = 0;
		$this->set('sliders', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid slider', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->Slider->setLocale($this->Session->read('Config.language'));
		$this->set('slider', $this->Slider->read(null, $id));
	}

	function add() {
    $this->Slider->setLocale(array('eng','chi'));
		if (!empty($this->data)) {
      if($this->FileUpload->success){ 
        $this->set('image', $this->FileUpload->finalFile);		
				$this->Session->setFlash(__('The slider has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
        $this->log($this->FileUpload->showErrors(), 'debug');
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid slider', true));
			$this->redirect(array('action' => 'index'));
		}
    $this->Slider->setLocale(array('eng','chi'));
    $this->Slider->multiTranslateOptions(array('validate'=>true,'find'=>true));
    
		if (!empty($this->data)) {
      if($this->FileUpload->success){ 
        $this->set('image', $this->FileUpload->finalFile);	
				$this->Session->setFlash(__('The slider has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
        $this->Session->setFlash($this->FileUpload->showErrors());	
				$this->Session->setFlash(__('The slider could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Slider->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for slider', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Slider->delete($id)) {
			$this->Session->setFlash(__('Slider deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Slider was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
