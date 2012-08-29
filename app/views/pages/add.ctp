<div class="pages form">
<?php echo $this->Form->create('Page');?>
	<fieldset>
		<legend><?php __('Add Page'); ?></legend>
	<?php
	  echo $this->Form->input('title.eng', array('label'=>'Title'));
		echo $this->Form->input('title.chi', array('label'=>'標題'));
    echo $this->Form->label('text.eng', 'Body');
    echo $cksource->ckeditor('text.eng', array('escape'=>false));
    echo $this->Form->label('text.chi', '正文');
		echo $cksource->ckeditor('text.chi', array('escape'=>false));	

    echo $this->Form->input('event_id');
		echo $this->Form->input('menu_type_id');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Pages', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menu Types', true), array('controller' => 'menu_types', 'action' => 'index')); ?> </li>
	</ul>
</div>
