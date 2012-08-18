<h1>Add Post</h1>
<?php
    echo $this->Form->create('Post');
    echo $this->Form->input('title');
		echo $cksource->ckeditor('body', array('escape' => false)); 
		echo $this->Form->end('添加');
?>
