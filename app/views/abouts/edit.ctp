<div class="abouts form">
<?php echo $this->Form->create('About');?>
	<fieldset>
		<legend><?php __('Edit About'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
    echo $cksource->ckeditor('body', array('escape' => false));
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('About.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('About.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Abouts', true), array('action' => 'index'));?></li>
	</ul>
</div>
