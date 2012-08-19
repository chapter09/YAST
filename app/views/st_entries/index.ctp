<div class="stEntries index">
	<h2><?php __('St Entries');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('st_type_id');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stEntries as $stEntry):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stEntry['StEntry']['id']; ?>&nbsp;</td>
		<td><?php echo $stEntry['StEntry']['title']; ?>&nbsp;</td>
		<td><?php echo $stEntry['StEntry']['body']; ?>&nbsp;</td>
		<td><?php echo $stEntry['StEntry']['order']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stEntry['StType']['title'], array('controller' => 'st_types', 'action' => 'view', $stEntry['StType']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $stEntry['StEntry']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $stEntry['StEntry']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $stEntry['StEntry']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stEntry['StEntry']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New St Entry', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List St Types', true), array('controller' => 'st_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Type', true), array('controller' => 'st_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List St Sections', true), array('controller' => 'st_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Section', true), array('controller' => 'st_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>