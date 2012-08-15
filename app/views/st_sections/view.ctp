<div class="stSections view">
<h2><?php  __('St Section');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stSection['StSection']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stSection['StSection']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stSection['StSection']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $stSection['StSection']['order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('St Entry'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($stSection['StEntry']['title'], array('controller' => 'st_entries', 'action' => 'view', $stSection['StEntry']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit St Section', true), array('action' => 'edit', $stSection['StSection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete St Section', true), array('action' => 'delete', $stSection['StSection']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $stSection['StSection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List St Sections', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Section', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List St Entries', true), array('controller' => 'st_entries', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New St Entry', true), array('controller' => 'st_entries', 'action' => 'add')); ?> </li>
	</ul>
</div>
