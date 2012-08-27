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
      'News',
      'Category',
      'Career',
      'Event',
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
    $this->set('stEntries', $this->StEntry->find('all',array(
            'fields'=>array('id', 'title'),
            'order'=>array('StEntry.order'=>'ASC'))));
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
                                        'apply',
                                        'news',
                                        'cotegory',
                                        'career',
                                        'event'); 
    $this->_setLocale();
    $this->_queryMenu();
    $this->_queryFooter(true);
    
  }

  function admin(){
    $this->set('items', array(
      'Main Site' => array(
          'About' => 'abouts',
          'Contact' => 'contacts',
          'Enterpress Clients' => 'ec_sliders',
          'Settings' => 'settings',
          'Index Sliders' => 'sliders',
          'Sponsors' => 'sponsors',
          'Service target entries' => 'st_entries',
          'Service target sections' =>'st_sections',
          'Service target types' => 'st_types',
          'Careers' => 'careers',
          'News Categoies' => 'categories',
          'News' => 'news',
          'Events' => 'events',
          'Users' => 'users',),
      'Event Site' => array(
          'Event Sponsors' => 'event_sponsors',
          'Menu Types' => 'menu_types',
          'Sponsor types' => 'sponsor_types',
          'Pages' => 'pages', 
        ),
      'Forms' => array(
          'Applications' => 'applications',
          'Contact Forms' => 'contact_forms',
          'Event Applications' => 'event_applies',
        )
      ));
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
            'about_active.jpg'=>'service',
            'businesses_active.jpg'=>'enterprise',
            'people_active.jpg'=>'news',
            'sustainability_active.jpg'=>'about',
            'investor_active.jpg'=>'contact',
            'media_active.jpg'=>'career',
          ));
    $this->set('news', $this->News->find('all', array(
            'fileds'=>array('title','id','description'),
            'order'=>array('News.datetime'=>'DESC'),
            'limit'=>5,
            )));
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

  function news($id=null)
  {
    if($id){
      $this->set('title_for_layout', 'News');
      $this->layout = 'yast';
      $entry = $this->News->read(null, $id);
      $this->set('news', $entry);
      $this->set('category', $this->Category->read(null, $entry['News']['category_id']));
      $this->set('categories', $this->Category->find('all'), array(
            'order'=>array(
                'Category.order'=>'ASC',
              )));
    }else{
      $this->redirect(array(
            'action'=>'category',
            ));
    }
  }

  function category($category_id=null){
    $this->set('title_for_layout', 'News');
    $this->layout = 'yast';
    $categories = $this->Category->find('all', array(
          'order' => array(
            'Category.order' => 'ASC',
            )));
    $category = null;
    if($category_id){
      $category = $this->Category->read(null, $category_id);
    }else{
      $category = $categories[0];
      $category_id = $category['Category']['id'];
    }
    $news = $this->paginate('News', array(
            'News.category_id' => $category_id ));
 
    $this->set('news', $news);
    $this->set('category', $category);
    $this->set('categories', $categories);
  }

  function career(){
    $this->set('title_for_layout', 'Career');
    $this->layout = 'yast';
    $this->set('careers', $this->Career->find('all'));
  }

  function event(){
    $this->set('title_for_layout', 'Event');
    $this->layout = 'yast';
    $this->set('events', $this->Event->find('all')); 
  }
    
}
