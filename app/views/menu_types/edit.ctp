<div class="menuTypes form">
<?php echo $this->Form->create('MenuType');?>
	<fieldset>
		<legend><?php __('Edit Menu Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
    echo $this->Form->input('title.eng', array('label'=>'Title'));
		echo $this->Form->input('title.chi', array('label'=>'標題')); 

		echo $this->Form->input('title');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('MenuType.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('MenuType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Menu Types', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Pages', true), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page', true), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
