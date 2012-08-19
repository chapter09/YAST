<div class="stSections form">
<?php echo $this->Form->create('StSection');?>
	<fieldset>
		<legend><?php __('Add St Section'); ?></legend>
	<?php
		echo $this->Form->input('title');
	  echo $cksource->ckeditor('body', array('escape' => false));		
		echo $this->Form->input('order');
		echo $this->Form->input('st_entry_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List St Sections', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List St Entries', true), array('controller' => 'st_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Entry', true), array('controller' => 'st_entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
