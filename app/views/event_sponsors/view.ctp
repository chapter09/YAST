<div class="eventSponsors view">
<h2><?php  __('Event Sponsor');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventSponsor['EventSponsor']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventSponsor['EventSponsor']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sponsor Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($eventSponsor['SponsorType']['title'], array('controller' => 'sponsor_types', 'action' => 'view', $eventSponsor['SponsorType']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventSponsor['EventSponsor']['order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventSponsor['EventSponsor']['file_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventSponsor['EventSponsor']['file_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventSponsor['EventSponsor']['file_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventSponsor['EventSponsor']['url']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Event'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($eventSponsor['Event']['title'], array('controller' => 'events', 'action' => 'view', $eventSponsor['Event']['id'])); ?>
			&nbsp;
		</dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
    <?php
    if($eventSlider['EventSlider']['file_name']){
      echo $html->image('/files/'.$eventSlider['EventSlider']['file_name']);
    }?>
    &nbsp;
    </dd>

	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event Sponsor', true), array('action' => 'edit', $eventSponsor['EventSponsor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Event Sponsor', true), array('action' => 'delete', $eventSponsor['EventSponsor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $eventSponsor['EventSponsor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Sponsors', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event Sponsor', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sponsor Types', true), array('controller' => 'sponsor_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor Type', true), array('controller' => 'sponsor_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
