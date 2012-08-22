<div class="sliders view">
<h2><?php  __('Slider');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slider['Slider']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slider['Slider']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slider['Slider']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slider['Slider']['order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slider['Slider']['file_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slider['Slider']['file_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $slider['Slider']['file_name']; ?>
			&nbsp;
		</dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
    <?php
    if($slider['Slider']['file_name']){
      echo $html->image('/files/'.$slider['Slider']['file_name']);
    }?>
    &nbsp;
    </dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Slider', true), array('action' => 'edit', $slider['Slider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Slider', true), array('action' => 'delete', $slider['Slider']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $slider['Slider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sliders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slider', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
