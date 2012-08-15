<div class="stTypes form">
<?php echo $this->Form->create('StType');?>
	<fieldset>
		<legend><?php __('Add St Type'); ?></legend>
	<?php
    echo $this->Form->input('title.eng', array('label' => 'Title')); 
		echo $this->Form->input('title.chi', array('label' => '標題')); 
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List St Types', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List St Entries', true), array('controller' => 'st_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Entry', true), array('controller' => 'st_entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
