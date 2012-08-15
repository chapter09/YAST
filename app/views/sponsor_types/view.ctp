<div class="sponsorTypes view">
<h2><?php  __('Sponsor Type');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsorType['SponsorType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Title'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsorType['SponsorType']['title']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Order'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $sponsorType['SponsorType']['order']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Sponsor Type', true), array('action' => 'edit', $sponsorType['SponsorType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Sponsor Type', true), array('action' => 'delete', $sponsorType['SponsorType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sponsorType['SponsorType']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Sponsor Types', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sponsor Type', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
