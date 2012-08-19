<div class="abouts form">
<?php echo $this->Form->create('About');?>
	<fieldset>
		<legend><?php __('Add About'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Abouts', true), array('action' => 'index'));?></li>
	</ul>
</div>
