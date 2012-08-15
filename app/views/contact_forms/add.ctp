<div class="contactForms form">
<?php echo $this->Form->create('ContactForm');?>
	<fieldset>
		<legend><?php __('Add Contact Form'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
		echo $this->Form->input('phone');
		echo $this->Form->input('organization');
		echo $this->Form->input('learn_more');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contact Forms', true), array('action' => 'index'));?></li>
	</ul>
</div>