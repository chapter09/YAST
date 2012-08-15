<div class="abouts view">
<h2><?php  __('About');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $about['About']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $about['About']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $about['About']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $about['About']['order']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit About', true), array('action' => 'edit', $about['About']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete About', true), array('action' => 'delete', $about['About']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $about['About']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Abouts', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New About', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
