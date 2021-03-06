<div class="applications index">
	<h2><?php __('Applications');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('first_name');?></th>
			<th><?php echo $this->Paginator->sort('last_name');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('phone');?></th>
			<th><?php echo $this->Paginator->sort('organization');?></th>
			<th><?php echo $this->Paginator->sort('learn_more');?></th>
			<th><?php echo $this->Paginator->sort('position');?></th>
			<th><?php echo $this->Paginator->sort('department');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($applications as $application):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $application['Application']['id']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['first_name']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['last_name']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['email']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['phone']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['organization']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['learn_more']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['position']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['department']; ?>&nbsp;</td>
		<td><?php echo $application['Application']['title']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $application['Application']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $application['Application']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $application['Application']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Application', true), array('action' => 'add')); ?></li>
	</ul>
</div>
