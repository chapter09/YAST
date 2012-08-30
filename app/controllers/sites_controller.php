<?php

class SitesController extends AppController{
  var $uses = array('Event', 
      'EventSponsor', 
      'SponsorType', 
      'MenuType',
      'Page',
      'Setting');
  var $helpers = array('Html', 'Javascript');
  var $components = array('Session');
  var $event = null;

  function beforeFilter(){
    parent::beforeFilter(); 
    $this->_setLocale();
    $this->_setEvent();
    $this->_queryMenu();
		$this->_querySiderbar();
		$this->_setSidebar(true);
    $this->Auth->allowedActions = array(
				'index',
				'page',
				'register',
				'sponsors',
				);
  }

	function _setSidebar($enable){
		$this->set('withSidebar', $enable);
	}

  function _setEvent(){
    if (isset($this->params['event_id'])){
      $this->event = $this->Event->read(null, $this->params['event_id']);
      $this->set('event', $this->event);
    }
  }

  function _setLocale(){
    foreach($this->uses as $model_name){
      $this->$model_name->setLocale($this->Session->read('Config.language'));
    }
  }

  function _getSetting($field){
    return $this->Setting->findByField($field);
  }

	function _querySiderbar(){
		$sts = $this->SponsorType->find('all', array(
					'order' => array(
						'SponsorType.order'=>'ASC')));
		foreach($sts as &$st){
			$st['Sponsors'] = $this->EventSponsor->find('all',
					array(
						'conditions'=>array(
							'EventSponsor.event_id'=>$this->event['Event']['id'],
							'EventSponsor.sponsor_type_id'=>$st['SponsorType']['id'])
						));
		}
		$agenda = $this->Page->find('first',array(
					'conditions'=>array(
						'Page.menu_type_id'=>6,
						'Page.event_id'=>$this->event['Event']['id'])));
		$this->set('agenda_id', $agenda['Page']['id']);
		$this->set('sponsorTypes', $sts);
	}

  function _queryPagesByMenuType($mt_id, $addition=null){
    $menu = $this->MenuType->read(null, $mt_id);
    $pages = $this->Page->find('all',array(
				'conditions'=>array(
					'Page.menu_type_id'=>$mt_id,
					'Page.event_id'=>$this->event['Event']['id']), 
				'fields'=>array(
              'title', 'id'  
            ),
				'order'=>array(
              'Page.order' => 'ASC',
            )));
    $items = array();
    foreach($pages as $page){
      $items[] = array(
          'name' => $page['Page']['title'],
          'item' => $this->_wrapRouter(array(
            'action' => 'page',
            $page['Page']['id'],
          )));
    };
    if ($addition){
      $items[] = $addition;
    }

    return array(
        'name' => $menu['MenuType']['title'],
        'items' => $items    
    );
  }

	function _wrapRouter($item){
		$item['event_id'] = $this->event['Event']['id'];
		return $item;
	}

  function _queryMenu(){
    $this->set('menus', array(
         $this->_queryPagesByMenuType(5),
         array(
           'name' => __('Register', true),
           'items' => array(
             array('item' => $this->_wrapRouter(array('action' => 'register'))),
             ),
          ),
         $this->_queryPagesByMenuType(6),
         $this->_queryPagesByMenuType(7),
         $this->_queryPagesByMenuType(8, array(
             'name' => __('Sponsors', true),
             'item' => $this->_wrapRouter(array('action' => 'sponsors')),
             )),
         $this->_queryPagesByMenuType(9),
         $this->_queryPagesByMenuType(10)
	 ));
		$contact = $this->Page->find('first',array(
								'conditions'=>array(
								'Page.event_id'=>$this->event['Event']['id'],
								'Page.menu_type_id'=>9)));
		$this->set('contact_id', $contact['Page']['id']);
  }


  function index(){
    $this->set('title_for_layout', $this->event['Event']['title']);
    $this->layout = 'sites';
    $this->set('content', $this->Page->find('first',array(
						'conditions'=>array(
							'Page.menu_type_id'=>5,
							'Page.event_id'=>$this->event['Event']['id']))));
  }

	function register(){
		$this->set('title_for_layout', __('Register',true));
		$this->layout = 'sites';
		$this->_setSidebar(false);
	}

	function page($page_id=null){
		$this->layout = 'sites';
		if(!$page_id){
			$this->redirect(array(
						'event_id'=>$this->event['Event']['id'],
						'action'=>'index',
						));
		}else{
			$page = $this->Page->read(null, $page_id);
			$this->set('page', $page);
			$this->set('title_for_layout', $page['Page']['title']);
		}
	}

	function sponsors(){
		$this->set('title_for_layout', __('Sponsors', true));
		$this->layout = 'sites';
		$this->_setSidebar(false);
	}
	
}


?>
