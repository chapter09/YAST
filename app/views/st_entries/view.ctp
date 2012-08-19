<div class="stEntries view">
<h2><?php  __('St Entry');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stEntry['StEntry']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stEntry['StEntry']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stEntry['StEntry']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stEntry['StEntry']['order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('St Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stEntry['StType']['title'], array('controller' => 'st_types', 'action' => 'view', $stEntry['StType']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit St Entry', true), array('action' => 'edit', $stEntry['StEntry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete St Entry', true), array('action' => 'delete', $stEntry['StEntry']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stEntry['StEntry']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List St Entries', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Entry', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List St Types', true), array('controller' => 'st_types', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Type', true), array('controller' => 'st_types', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List St Sections', true), array('controller' => 'st_sections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Section', true), array('controller' => 'st_sections', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related St Sections');?></h3>
	<?php if (!empty($stEntry['StSection'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Body'); ?></th>
		<th><?php __('Order'); ?></th>
		<th><?php __('St Entry Id'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($stEntry['StSection'] as $stSection):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $stSection['id'];?></td>
			<td><?php echo $stSection['title'];?></td>
			<td><?php echo $stSection['body'];?></td>
			<td><?php echo $stSection['order'];?></td>
			<td><?php echo $stSection['st_entry_id'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'st_sections', 'action' => 'view', $stSection['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'st_sections', 'action' => 'edit', $stSection['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'st_sections', 'action' => 'delete', $stSection['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stSection['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New St Section', true), array('controller' => 'st_sections', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
