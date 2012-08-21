<?php
class DashboardsController extends AppController
{
  var $name = "Dashboards";
  var $uses = array('StType', 'StEntry');
  var $helpers = array('Html', 'Javascript');
  var $components = array('Session', 'DebugKit.Toolbar');

  function _queryMenu(){
    $this->StType->setLocale($this->Session->read('Config.language'));
    $this->StEntry->setLocale($this->Session->read('Config.language'));
    $this->StType->recursive = 0;
    $stTypes = $this->StType->find('all');
    foreach($stTypes as &$stType){
      $stType['StEntry'] = $this->StEntry->findAllByStTypeId($stType['StType']['id']);
    }
    $this->set('stTypes', $stTypes);

  }

  function beforeFilter() {
    parent::beforeFilter();
		$this->Auth->allowedActions = array('home'); 
    $this->_queryMenu();
  }

  function index(){
    $this->set('items', array(
          'About' => 'abouts',
          'Application' => 'applications',
          'Contact' => 'contacts',
          'Enterpress Clients' => 'ec_sliders',
          'Settings' => 'settings',
          'Index Sliders' => 'sliders',
          'Sponsors' => 'sponsors',
          'Service target entries' => 'st_entries',
          'Service target sections' =>'st_sections',
          'Service target types' => 'st_types',
          'Text sliders' => 'text_sliders',
          'Users' => 'users',));
  }

  function home(){
    $this->pageTitle = 'YAST';
    $this->layout = 'yast';
  }
}
