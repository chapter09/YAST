<div class="careers form">
<?php echo $this->Form->create('Career');?>
	<fieldset>
		<legend><?php __('Add Career'); ?></legend>
	<?php
		echo $this->Form->input('title.eng', array('label'=>'Title'));
		echo $this->Form->input('title.chi', array('label'=>'標題'));
    echo $this->Form->label('body.eng', 'Body');
    echo $cksource->ckeditor('body.eng', array('escape'=>false));
    echo $this->Form->label('body.chi', '正文');
		echo $cksource->ckeditor('body.chi', array('escape'=>false));	

    echo $this->Form->input('order');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Careers', true), array('action' => 'index'));?></li>
	</ul>
</div>
