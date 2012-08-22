<?php
class DashboardsController extends AppController
{
  var $name = "Dashboards";
  var $uses = array(
      'StType', 
      'StEntry',
      'StSection',
      'Slider', 
      'TextSlider', 
      'About',
      'EcSlider',
      'Sponsor',
      'Contact',
      'Application',
      'Setting');
  var $helpers = array('Html', 'Javascript');
  var $components = array('Session');

  function _setLocale(){
    foreach($this->uses as $model_name){
      $this->$model_name->setLocale($this->Session->read('Config.language'));
    } 
  }

  function _getSetting($field){
    return $this->Setting->findByField($field);
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

  function _queryFooter($bool){
    $this->set('setFooter', $bool);
  }

  function beforeFilter() {
    parent::beforeFilter();
		$this->Auth->allowedActions = array('index',
                                        'about',
                                        'enterprise',
                                        'contact',
                                        'service',
                                        'apply'); 
    $this->_setLocale();
    $this->_queryMenu();
    $this->_queryFooter(true);
    
  }

  function admin(){
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

  function index(){
    $this->set('title_for_layout', 'HOME');
    $this->layout = 'yast';
    $this->_queryFooter(false);
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

  function about(){
      $this->set('title_for_layout', 'About');
      $this->layout = 'yast';
      $this->set('abouts', $this->About->find('all', array(
            'order'=>array(
              'About.order'=>'ASC',
              ))));
      $this->set('banner', $this->_getSetting('about.body'));
  }

  function enterprise(){
    $this->set('title_for_layout', 'Enterprise Client');
    $this->layout = 'yast';
    $this->set('sliders', $this->EcSlider->find('all', array(
            'order'=>array(
              'EcSlider.order'=>'ASC',
              ))));
    $this->set('sponsors', $this->Sponsor->find('all'));
    $this->set('banner', $this->_getSetting('enterprise.body'));
  }

  function contact(){
    $this->set('title_for_layout', 'Contact');
    $this->layout = 'yast';
    $this->set('lcontacts', 
        $this->Contact->findAllByPosition("0",array(),
          array(
              'Contact.order'=>'ASC'
              )));
    $this->set('rcontacts', 
        $this->Contact->findAllByPosition("1",array(),
          array(
              'Contact.order'=>'ASC'
              )));
  }

  function service($entry_id=null){
    $this->set('title_for_layout', 'Service Targets');
    $this->layout = 'yast';
    $entry = null;
    if(!$entry_id){
      $entry = $this->StEntry->find('first');
    }else{
      $entry = $this->StEntry->read(null, $entry_id);
    }
    $this->set('type', $this->StType->findById($entry['StEntry']['st_type_id']));
    $this->set('entry', $entry);
    $this->StSection->recursive = 0;
    $this->set('sections', 
        $this->StSection->findAllByStEntryId($entry['StEntry']['id'], 
          array(), 
          array('StSection.order'=>'ASC')));
  }

  function apply(){
    $this->set('title_for_layout', 'Apply');
    $this->layout = 'yast';
    $this->set('banner', $this->_getSetting('apply.body'));
  }     
}
