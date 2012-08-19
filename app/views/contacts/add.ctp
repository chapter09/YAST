<div class="contacts form">
<?php echo $this->Form->create('Contact');?>
	<fieldset>
		<legend><?php __('Add Contact'); ?></legend>
	<?php
		echo $this->Form->input('title');
		echo $cksource->ckeditor('body', array('escape' => false)); 
		echo $this->Form->input('order');
		echo $this->Form->input('position', array('type'=>'select',
                                              'options'=>array(
                                                  0=>'left',
                                                  1=>'right',
                                                )));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contacts', true), array('action' => 'index'));?></li>
	</ul>
</div>
