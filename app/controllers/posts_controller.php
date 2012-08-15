<?php
/**
 * Posts Controller
 */
class PostsController extends AppController
{
  var $name = "Posts"; 	
  var $helpers = array('Html', 'Form', 'Javascript', 'Cksource', 'TinyMce'); 
  var $components = array('Session', 'DebugKit.Toolbar');

  function index(){
    $this->set('posts', $this->Post->find('all'));
  }

  function view($id=null){
    $this->Post->setLocale($this->Session->read('Config.language'));
    $this->Post->id = $id;
    $this->set('post', $this->Post->read());
  }
  
  function add() {
    $this->Post->setLocale(array('eng','chi'));
    if(!empty($this->data)) {
        if($this->Post->save($this->data)) {
            $this->Session->setFlash('新文章创建完成');
            $this->Redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash('创建文章出错');
        }
    }
  }

  function edit($id = null)
  {
    $this->Post->setLocale(array('eng','chi'));
    $this->Post->id = $id;
    $this->Post->multiTranslateOptions(array('validate'=>true,'find'=>true));
    if (empty($this->data)){
      $this->data = $this->Post->read(null, $id);
    }else{
      if ($this->Post->save($this->data)){
        $this->Session->setFlash('文章已保存');
      }
    }
  }

	function beforeFilter() {
    parent::beforeFilter(); 
    $this->Auth->allowedActions = array('index', 'view');
	}
	
}
?>
