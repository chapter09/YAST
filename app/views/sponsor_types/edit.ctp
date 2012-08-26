<div class="sponsorTypes form">
<?php echo $this->Form->create('SponsorType');?>
	<fieldset>
		<legend><?php __('Edit Sponsor Type'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title');
		echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('SponsorType.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('SponsorType.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sponsor Types', true), array('action' => 'index'));?></li>
	</ul>
</div>