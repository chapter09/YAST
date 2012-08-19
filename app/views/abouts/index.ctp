<div class="abouts index">
	<h2><?php __('Abouts');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($abouts as $about):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $about['About']['id']; ?>&nbsp;</td>
		<td><?php echo $about['About']['title']; ?>&nbsp;</td>
		<td><?php echo $about['About']['body']; ?>&nbsp;</td>
		<td><?php echo $about['About']['order']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $about['About']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $about['About']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $about['About']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $about['About']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New About', true), array('action' => 'add')); ?></li>
	</ul>
</div>