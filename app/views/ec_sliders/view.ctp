<div class="ecSliders view">
<h2><?php  __('Ec Slider');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ecSlider['EcSlider']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ecSlider['EcSlider']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ecSlider['EcSlider']['order']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ecSlider['EcSlider']['file_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Size'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ecSlider['EcSlider']['file_size']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('File Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ecSlider['EcSlider']['file_name']; ?>
			&nbsp;
		</dd>
    
    <dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Image'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
    <?php
    if($ecSlider['EcSlider']['file_name']){
      echo $html->image('/files/'.$ecSlider['EcSlider']['file_name']);
    }?>
    &nbsp;
    </dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ec Slider', true), array('action' => 'edit', $ecSlider['EcSlider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ec Slider', true), array('action' => 'delete', $ecSlider['EcSlider']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ecSlider['EcSlider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ec Sliders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ec Slider', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
