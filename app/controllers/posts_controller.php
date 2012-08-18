<?php
/**
 * Posts Controller
 */
class PostsController extends AppController
{
  var $name = "Posts"; 	
  var $helpers = array('Html', 'Form', 'Javascript', 'Cksource'); 
  var $components = array('Session', 'DebugKit.Toolbar');

  function index(){
    $this->set('posts', $this->Post->find('all'));
  }

  function view($id=null){
    $this->Post->id = $id;
    $this->set('post', $this->Post->read());
  }
  
  function add() {
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
    $this->Post->id = $id;
    if (empty($this->data)){
      $this->data = $this->Post->read();
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
