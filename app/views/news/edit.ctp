<div class="news form">
<?php echo $this->Form->create('News');?>
	<fieldset>
		<legend><?php __('Edit News'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('title', array('label'=>'Title'));
    echo $this->Form->input('description', array('label'=>'Abstract'));

    echo $this->Form->label('body', 'Body');
    echo $cksource->ckeditor('body', array('escape'=>false));

		echo $this->Form->input('category_id');
    echo $this->Form->input('datetime');
    echo $this->Form->select('locale', array(
          'chi'=>'Chinese',
          'eng'=>'English',),array(
            'value'=>'chi',
            'label'=>'Language'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('News.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('News.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List News', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Categories', true), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category', true), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
