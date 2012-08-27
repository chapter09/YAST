<div class="eventApplies view">
<h2><?php  __('Event Apply');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventApply['EventApply']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Event'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($eventApply['Event']['title'], array('controller' => 'events', 'action' => 'view', $eventApply['Event']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $eventApply['EventApply']['email']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Event Apply', true), array('action' => 'edit', $eventApply['EventApply']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Event Apply', true), array('action' => 'delete', $eventApply['EventApply']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $eventApply['EventApply']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Event Applies', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>
