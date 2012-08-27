<div class="eventSponsors form">
<?php echo $this->Form->create('EventSponsor', array('type'=>'file'));?>
	<fieldset>
		<legend><?php __('Edit Event Sponsor'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('sponsor_type_id');
		echo $this->Form->input('order');
    
    echo $this->Form->input('file', array('type'=>'file'));
    if($this->data['EventSponsor']['file_name']){
      echo $html->image('/files/'.$this->data['EventSponsor']['file_name']);
    }
		echo $this->Form->input('url');
		echo $this->Form->input('event_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EventSponsor.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EventSponsor.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Event Sponsors', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sponsor Types', true), array('controller' => 'sponsor_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor Type', true), array('controller' => 'sponsor_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
