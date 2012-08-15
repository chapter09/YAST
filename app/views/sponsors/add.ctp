<div class="sponsors form">
<?php echo $this->Form->create('Sponsor', array('type'=>'file'));?>
	<fieldset>
		<legend><?php __('Add Sponsor'); ?></legend>
	<?php
		echo $this->Form->input('sponsor_name.eng', array('label'=>'Name'));
    echo $this->Form->input('sponsor_name.chi', array('label'=>'名称')); 
    echo $this->Form->input('sponsor_description.eng', array('label'=>'Description'));
		echo $this->Form->input('sponsor_description.chi', array('label'=>'描述'));
    echo $this->Form->input('file', array('type'=>'file'));
    echo $this->Form->input('url');
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
