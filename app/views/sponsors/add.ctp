<div class="sponsors form">
<?php echo $this->Form->create('Sponsor', array('type'=>'file'));?>
	<fieldset>
		<legend><?php __('Add Sponsor'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('url');
    echo $this->Form->input('file', array('type'=>'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sponsors', true), array('action' => 'index'));?></li>
	</ul>
</div>
