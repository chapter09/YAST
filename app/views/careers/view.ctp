<div class="careers view">
<h2><?php  __('Career');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $career['Career']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $career['Career']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $career['Career']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $career['Career']['order']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Career', true), array('action' => 'edit', $career['Career']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Career', true), array('action' => 'delete', $career['Career']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $career['Career']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Careers', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Career', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
