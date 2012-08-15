<div class="applications form">
<?php echo $this->Form->create('Application');?>
	<fieldset>
		<legend><?php __('Edit Application'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('organization');
		echo $this->Form->input('learn_more');
		echo $this->Form->input('position');
		echo $this->Form->input('department');
		echo $this->Form->input('title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Application.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Application.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Applications', true), array('action' => 'index'));?></li>
	</ul>
</div>