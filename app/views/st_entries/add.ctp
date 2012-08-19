<div class="stEntries form">
<?php echo $this->Form->create('StEntry');?>
	<fieldset>
		<legend><?php __('Add St Entry'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('order');
		echo $this->Form->input('st_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List St Entries', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List St Types', true), array('controller' => 'st_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Type', true), array('controller' => 'st_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List St Sections', true), array('controller' => 'st_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Section', true), array('controller' => 'st_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>