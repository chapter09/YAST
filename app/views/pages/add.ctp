<div class="pages form">
<?php echo $this->Form->create('Page');?>
	<fieldset>
		<legend><?php __('Add Page'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('text');
		echo $this->Form->input('event_id');
		echo $this->Form->input('menu_type_id');
		echo $this->Form->input('order');
		echo $this->Form->input('in_front');
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
		<li><?php echo $this->Html->link(__('New Menu Type', true), array('controller' => 'menu_types', 'action' => 'add')); ?> </li>
	</ul>
</div>