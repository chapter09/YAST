<?php
class News extends AppModel {
	var $name = 'News';
  var $actsAs = array(
      'MulitiTranslate' => array(
          'title', 'body', 'description'
        )
  );
	var $validate = array(
		'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
      
		),

    'description' => array(
      'notempty' => array(
				'rule' => array('notempty'),
			),
      

      'maxLength' => array(
        'rule' => array('maxLength', 140),
        'message'=>'no longer than 140 characters'
        )
      ),

		'category_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),	

    'datetime' => array(
        'notempty' => array(
          'rule' => array('notempty'),
         ),
     ),
    
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Category' => array(
			'className' => 'Category',
			'foreignKey' => 'category_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
