<div class="menuTypes view">
<h2><?php  __('Menu Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menuType['MenuType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menuType['MenuType']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $menuType['MenuType']['order']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menu Type', true), array('action' => 'edit', $menuType['MenuType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Menu Type', true), array('action' => 'delete', $menuType['MenuType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $menuType['MenuType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menu Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu Type', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Pages', true), array('controller' => 'pages', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Page', true), array('controller' => 'pages', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Pages');?></h3>
	<?php if (!empty($menuType['Page'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Title'); ?></th>
		<th><?php __('Text'); ?></th>
		<th><?php __('Event Id'); ?></th>
		<th><?php __('Menu Type Id'); ?></th>
		<th><?php __('Order'); ?></th>
		<th><?php __('In Front'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($menuType['Page'] as $page):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $page['id'];?></td>
			<td><?php echo $page['title'];?></td>
			<td><?php echo $page['text'];?></td>
			<td><?php echo $page['event_id'];?></td>
			<td><?php echo $page['menu_type_id'];?></td>
			<td><?php echo $page['order'];?></td>
			<td><?php echo $page['in_front'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'pages', 'action' => 'view', $page['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'pages', 'action' => 'edit', $page['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'pages', 'action' => 'delete', $page['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $page['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Page', true), array('controller' => 'pages', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
