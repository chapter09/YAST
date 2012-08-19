<div class="sponsors view">
<h2><?php  __('Sponsor');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsor['Sponsor']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sponsor Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsor['Sponsor']['sponsor_name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsor['Sponsor']['file_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsor['Sponsor']['file_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsor['Sponsor']['file_name']; ?>
			&nbsp;
		</dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Url'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsor['Sponsor']['url']; ?>
			&nbsp;
		</dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
    <?php
    if($sponsor['Sponsor']['file_name']){
      echo $html->image('/files/'.$sponsor['Sponsor']['file_name']);
    }?>
    &nbsp;
    </dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sponsor', true), array('action' => 'edit', $sponsor['Sponsor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Sponsor', true), array('action' => 'delete', $sponsor['Sponsor']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sponsor['Sponsor']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sponsors', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
