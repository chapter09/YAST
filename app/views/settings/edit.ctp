<div class="settings form">
<?php echo $this->Form->create('Setting');?>
	<fieldset>
		<legend><?php __('Edit Setting'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('field');
    echo $this->Form->input('value.eng');
    echo $this->Form->input('value.chi');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Settings', true), array('action' => 'index'));?></li>
	</ul>
</div>
