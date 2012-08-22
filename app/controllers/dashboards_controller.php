<?php
class DashboardsController extends AppController
{
  var $name = "Dashboards";
  var $uses = array('StType', 'StEntry', 'Slider', 'TextSlider');
  var $helpers = array('Html', 'Javascript');
  var $components = array('Session', 'DebugKit.Toolbar');

  function _setLocale(){
    foreach($this->uses as $model_name){
      $this->$model_name->setLocale($this->Session->read('Config.language'));
    } 
  }

  function _queryMenu(){
    $this->StType->recursive = 0;
    $stTypes = $this->StType->find('all', array('order'=>array(
              'StType.order' => 'ASC',
            )));
    foreach($stTypes as &$stType){
      $stType['StEntry'] = $this->StEntry->findAllByStTypeId($stType['StType']['id'], array('id', 'title'),array('StEntry.order'=>'ASC'));
    }
    $this->set('stTypes', $stTypes);

  }

  function beforeFilter() {
    parent::beforeFilter();
		$this->Auth->allowedActions = array('home'); 
    $this->_setLocale();
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
    $this->set('title_for_layout', 'HOME');
    $this->layout = 'yast';
    $this->set('sliders', $this->Slider->find('all', array(
            'order'=>array(
              'Slider.order'=> 'ASC',
              ))));
    $this->set('textSliders', $this->TextSlider->find('all', array(
            'order'=>array(
              'TextSlider.order'=>'ASC',
              ))));
    $this->set('sliderShows', array(
            'about_active.jpg'=>'about',
            'businesses_active.jpg'=>'about',
            'people_active.jpg'=>'enterprise',
            'sustainability_active.jpg'=>'about',
            'investor_active.jpg'=>'service',
            'media_active.jpg'=>'contact',
          ));
  }
}
