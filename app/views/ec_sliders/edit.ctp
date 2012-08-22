<div class="ecSliders form">
<?php echo $this->Form->create('EcSlider', array('type'=>'file'));?>
	<fieldset>
		<legend><?php __('Edit Ec Slider'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->label('body.eng', 'Body');
    echo $cksource->ckeditor('body.eng', array('escape'=>false));
    echo $this->Form->label('body.chi', '正文');
		echo $cksource->ckeditor('body.chi', array('escape'=>false));	 
		echo $this->Form->input('order');
    echo $this->Form->input('file', array('type'=>'file'));
    if($this->data['EcSlider']['file_name']){
      echo $html->image('/files/'.$this->data['EcSlider']['file_name']);
    }

	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('EcSlider.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('EcSlider.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ec Sliders', true), array('action' => 'index'));?></li>
	</ul>
</div>
