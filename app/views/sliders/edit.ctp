<div class="sliders form">
<?php echo $this->Form->create('Slider', array('type'=>'file'));?>
	<fieldset>
		<legend><?php __('Edit Slider'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('body');
		echo $this->Form->input('order');
		echo $this->Form->input('file', array('type'=>'file'));
    if($this->data['Slider']['file_name']){
      echo $html->image('/files/'.$this->data['Slider']['file_name']);
    }

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Slider.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Slider.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sliders', true), array('action' => 'index'));?></li>
	</ul>
</div>
