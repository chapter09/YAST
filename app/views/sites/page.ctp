<?php
  
  echo $this->Html->css('page', null, array("media"=>"all", 'inline'=>false));
  
  echo $javascript->link('7355', false);
  echo $javascript->link('insight.min', false);
  echo $javascript->link('ga', false);
  echo $javascript->link('jquery.innerfade', false);
  echo $javascript->link('yetii', false);
  echo $javascript->link('initializations-about-us', false);
  echo $javascript->link('ga-global', false);
?>


<div class="content-body">
 <span class="breadcrumb">
  <?php echo __('Your present position',true); ?>: &gt;
  <?php echo $page['Page']['title']; ?>
 </span>
 <?php echo $page['Page']['text']; ?>
</div>
