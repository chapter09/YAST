<h1>Add Post</h1>
<?php
    echo $this->Form->create('Post');
    echo $this->Form->input('title');
		//echo $tinyMce->input('body.eng', array(), array(), 'full');
    //echo $tinyMce->input('body.chi');
    echo $cksource->ckeditor('body.eng', array('escape' => false)); 
		echo $cksource->ckeditor('body.chi', array('escape' => false)); 
    echo $this->Form->end('添加');
?>
