<h1>Edit Post</h1>
 
<?php
 
  echo$cksource->create('Post', array('action'=>'edit'));
  echo$cksource->input('title');
  echo $cksource->ckeditor('body.eng', array('escape' => false)); 
	echo $cksource->ckeditor('body.chi', array('escape' => false));   
  echo $cksource->input('id', array('type'=>'hidden'));
  echo $cksource->end('Save Post');

?>
