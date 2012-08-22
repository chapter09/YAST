<?php
class Setting extends AppModel {
	var $name = 'Setting';
  var $actsAs = array(
      'MulitiTranslate'=> array(
        'value',
       ));
	var $validate = array(
		'field' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
}
