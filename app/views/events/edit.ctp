<div class="events form">
<?php echo $this->Form->create('Event');?>
	<fieldset>
		<legend><?php __('Edit Event'); ?></legend>
	<?php
		echo $this->Form->input('id');
	  echo $this->Form->input('title.eng', array('label'=>'Title'));
		echo $this->Form->input('title.chi', array('label'=>'標題'));
   
    echo $this->Form->label('description.eng', 'Description');
    echo $cksource->ckeditor('description.eng', array('escape'=>false));
    echo $this->Form->label('description.chi', '描述');
		echo $cksource->ckeditor('description.chi', array('escape'=>false));	
    echo $this->Form->input('place.eng', array('label'=>'Place'));
		echo $this->Form->input('place.chi', array('label'=>'地址'));
   
		echo $this->Form->input('date');
    echo $this->Form->input('file', array('type' => 'file'));
    
    if($this->data['Event']['file_name']){
      echo $html->image('/files/'.$this->data['Event']['file_name']);
    }
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Event.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Event.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Events', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Applications', true), array('controller' => 'applications', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Applies', true), array('controller' => 'event_applies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages', true), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page', true), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
