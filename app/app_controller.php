<?php

class AppController extends Controller{
  
  var $components = array('Auth', 'Acl', 'Session');
  var $helpers = array('Html', 'Form', 'Session');

  function beforeFilter(){
    $this->Auth->authorize ='actions'; 
    $this->Auth->loginAction = array('controller'=>'users', 
                                     'action'=>'login');
    $this->Auth->logoutRedirect= array('controller'=>'users', 
                                       'action'=>'logout'); 
    $this->Auth->loginRedirect= array('controller'=>'post', 
                                      'action'=>'add');
  }
}
?>
