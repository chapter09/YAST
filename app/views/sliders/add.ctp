<div class="sliders form">
<?php echo $this->Form->create('Slider', array('type'=>'file'));?>
	<fieldset>
		<legend><?php __('Add Slider'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('order');
		echo $this->Form->input('file', array('type' => 'file'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sliders', true), array('action' => 'index'));?></li>
	</ul>
</div>
