<div class="stTypes view">
<h2><?php  __('St Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stType['StType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stType['StType']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stType['StType']['order']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit St Type', true), array('action' => 'edit', $stType['StType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete St Type', true), array('action' => 'delete', $stType['StType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stType['StType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List St Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Type', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List St Entries', true), array('controller' => 'st_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Entry', true), array('controller' => 'st_entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related St Entries');?></h3>
	<?php if (!empty($stType['StEntry'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Order'); ?></th>
		<th><?php __('St Type Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($stType['StEntry'] as $stEntry):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $stEntry['id'];?></td>
			<td><?php echo $stEntry['title'];?></td>
			<td><?php echo $stEntry['body'];?></td>
			<td><?php echo $stEntry['order'];?></td>
			<td><?php echo $stEntry['st_type_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'st_entries', 'action' => 'view', $stEntry['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'st_entries', 'action' => 'edit', $stEntry['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'st_entries', 'action' => 'delete', $stEntry['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stEntry['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New St Entry', true), array('controller' => 'st_entries', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
