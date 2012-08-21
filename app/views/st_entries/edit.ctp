<div class="stEntries form">
<?php echo $this->Form->create('StEntry');?>
	<fieldset>
		<legend><?php __('Edit St Entry'); ?></legend>
	<?php
		echo $this->Form->input('id');
	  echo $this->Form->input('title.eng', array('label'=>'Title'));
		echo $this->Form->input('title.chi', array('label'=>'標題'));
     echo $this->Form->label('body.eng', 'Body');
    echo $cksource->ckeditor('body.eng', array('escape'=>false));
    echo $this->Form->label('body.chi', '正文');
		echo $cksource->ckeditor('body.chi', array('escape'=>false));	
    
		echo $this->Form->input('order');
		echo $this->Form->input('st_type_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('StEntry.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('StEntry.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List St Entries', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List St Types', true), array('controller' => 'st_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Type', true), array('controller' => 'st_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List St Sections', true), array('controller' => 'st_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Section', true), array('controller' => 'st_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
