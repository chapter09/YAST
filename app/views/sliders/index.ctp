<div class="sliders index">
	<h2><?php __('Sliders');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('title');?></th>
			<th><?php echo $this->Paginator->sort('body');?></th>
			<th><?php echo $this->Paginator->sort('order');?></th>
			<th><?php echo $this->Paginator->sort('file_type');?></th>
			<th><?php echo $this->Paginator->sort('file_size');?></th>
			<th><?php echo $this->Paginator->sort('file_name');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sliders as $slider):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $slider['Slider']['id']; ?>&nbsp;</td>
		<td><?php echo $slider['Slider']['title']; ?>&nbsp;</td>
		<td><?php echo $slider['Slider']['body']; ?>&nbsp;</td>
		<td><?php echo $slider['Slider']['order']; ?>&nbsp;</td>
		<td><?php echo $slider['Slider']['file_type']; ?>&nbsp;</td>
		<td><?php echo $slider['Slider']['file_size']; ?>&nbsp;</td>
		<td><?php echo $slider['Slider']['file_name']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $slider['Slider']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $slider['Slider']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $slider['Slider']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $slider['Slider']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Slider', true), array('action' => 'add')); ?></li>
	</ul>
</div>