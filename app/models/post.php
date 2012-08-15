<?php
class Post extends AppModel{
  var $name = 'Post';	
	var $actsAs = array(
			'MulitiTranslate' => array(
        'body'
        )   
  );


  var $validate = array(
     'title' => array(
      'rule' => 'notEmpty',
      'message' => '这个字段不能为空',
     ),
     'body' => array(
       'rule' => 'notEmpty',
       'message' => '这个字段不能为空',
     )
  );

}
?>
