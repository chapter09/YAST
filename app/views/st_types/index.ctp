<div class="stTypes index">
	<h2><?php __('St Types');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($stTypes as $stType):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $stType['StType']['id']; ?>&nbsp;</td>
		<td><?php echo $stType['StType']['title']; ?>&nbsp;</td>
		<td><?php echo $stType['StType']['order']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $stType['StType']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $stType['StType']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $stType['StType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stType['StType']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New St Type', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List St Entries', true), array('controller' => 'st_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Entry', true), array('controller' => 'st_entries', 'action' => 'add')); ?> </li>
	</ul>
</div>