<div class="eventSponsors index">
	<h2><?php __('Event Sponsors');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('sponsor_type_id');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('file_type');?></th>
			<th><?php echo $this->Paginator->sort('file_size');?></th>
			<th><?php echo $this->Paginator->sort('file_name');?></th>
			<th><?php echo $this->Paginator->sort('url');?></th>
			<th><?php echo $this->Paginator->sort('event_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($eventSponsors as $eventSponsor):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $eventSponsor['EventSponsor']['id']; ?>&nbsp;</td>
		<td><?php echo $eventSponsor['EventSponsor']['title']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventSponsor['SponsorType']['title'], array('controller' => 'sponsor_types', 'action' => 'view', $eventSponsor['SponsorType']['id'])); ?>
		</td>
		<td><?php echo $eventSponsor['EventSponsor']['order']; ?>&nbsp;</td>
		<td><?php echo $eventSponsor['EventSponsor']['file_type']; ?>&nbsp;</td>
		<td><?php echo $eventSponsor['EventSponsor']['file_size']; ?>&nbsp;</td>
		<td><?php echo $eventSponsor['EventSponsor']['file_name']; ?>&nbsp;</td>
		<td><?php echo $eventSponsor['EventSponsor']['url']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($eventSponsor['Event']['title'], array('controller' => 'events', 'action' => 'view', $eventSponsor['Event']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $eventSponsor['EventSponsor']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $eventSponsor['EventSponsor']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $eventSponsor['EventSponsor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $eventSponsor['EventSponsor']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Event Sponsor', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Sponsor Types', true), array('controller' => 'sponsor_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor Type', true), array('controller' => 'sponsor_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Events', true), array('controller' => 'events', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Event', true), array('controller' => 'events', 'action' => 'add')); ?> </li>
	</ul>
</div>