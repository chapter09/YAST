<?php
class DashboardsController extends AppController
{
  var $name = "Dashboards";
  var $uses = null;
  var $helpers = array('Html');

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
}

?>
