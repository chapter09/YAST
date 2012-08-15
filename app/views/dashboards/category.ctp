<?php
  
  echo $this->Html->css('category', null, array("media"=>"all", 'inline'=>false));
  
  echo $javascript->link('7355', false);
  echo $javascript->link('insight.min', false);
  echo $javascript->link('ga', false);
  echo $javascript->link('jquery.innerfade', false);
  echo $javascript->link('yetii', false);
  echo $javascript->link('initializations-about-us', false);
  echo $javascript->link('ga-global', false);
?>

<div class="ls-cmp-wrap ls-1st" id="w1337291993388">
  <!--ls:begin[component-1337291993388]-->
  <div class="iw_component" id="1337291993388">
    <div>
      <div>
        <div id="content-container" class="wrap">
          
          <div class="group" style="padding-bottom:15px;">
            <ul id="tabs-nav" class="side">
              <?php $count = 0;?>
              <?php foreach($categories as $c):?>
              
              <li class="<?php echo ($count==0)?'activeli':''; ?>">
                <?php if($c['Category']['id']==$category['Category']['id']){
                  echo $this->Html->link($c['Category']['title'], array(
                    'controller'=>'dashboards',
                    'action'=>'category',
                    $c['Category']['id']
                  ), array(
                    'class'=>'active',
                  ));
                }else{
                  echo $this->Html->link($c['Category']['title'], array(
                    'controller'=>'dashboards',
                    'action'=>'category',
                    $c['Category']['id']
                  ));
                }
                
                
                ?>
              </li>
              <?php $count++; ?>
              <? endforeach; ?>
            </ul>
            
            <div id="tabs" class="content">
              <?php $count = 0; ?>
              <?php foreach($categories as $c): ?>
              <?php $count ++;
              if ($c['Category']['id']==$category['Category']['id']): ?>
              <div id="tab<?php echo $count; ?>" class="tab" style="height: 450px; display: block;">
                <h2><?php echo $c['Category']['title']?></h2>
                <ul>
                <?php foreach($news as $n):?>
                  <li><?php echo $this->Html->link($n['News']['title'], array(
                    'controller' => 'dashboards',
                    'action' =>'news',
                    $n['News']['id']
                  )); ?>
                  <p class="datetime"><?php echo $n['News']['datetime']; ?></p>
                  </li>
                <?php endforeach; ?>
                </ul>
                
                
                <div class="paging">
              		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
              	 | 	<?php echo $this->Paginator->numbers();?>
               |
              		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
              	</div>
              	
                <?php else:?>
              <div id="tab<?php echo $count; ?>" class="tab" style="height: 450px; display: none;">
                <?php endif; ?>
              </div>
              <?php endforeach; ?>
            </div>
       
          </div>
        </div>
      </div>
    </div>
  </div>
</div>