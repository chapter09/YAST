<div class="textSliders view">
<h2><?php  __('Text Slider');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $textSlider['TextSlider']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $textSlider['TextSlider']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $textSlider['TextSlider']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $textSlider['TextSlider']['order']; ?>
			&nbsp;
		</dd>
		
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Text Slider', true), array('action' => 'edit', $textSlider['TextSlider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Text Slider', true), array('action' => 'delete', $textSlider['TextSlider']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $textSlider['TextSlider']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Text Sliders', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Text Slider', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
