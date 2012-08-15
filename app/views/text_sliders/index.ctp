<div class="textSliders index">
	<h2><?php __('Text Sliders');?></h2>
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
	foreach ($textSliders as $textSlider):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $textSlider['TextSlider']['id']; ?>&nbsp;</td>
		<td><?php echo $textSlider['TextSlider']['title']; ?>&nbsp;</td>
		<td><?php echo $textSlider['TextSlider']['body']; ?>&nbsp;</td>
		<td><?php echo $textSlider['TextSlider']['order']; ?>&nbsp;</td>
	<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $textSlider['TextSlider']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $textSlider['TextSlider']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $textSlider['TextSlider']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $textSlider['TextSlider']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Text Slider', true), array('action' => 'add')); ?></li>
	</ul>
</div>
