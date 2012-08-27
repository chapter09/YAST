<?php
  echo $this->Html->css('news', null, array("media"=>"all", 'inline'=>false));
  
?>
<div class="ls-cmp-wrap ls-1st" id="w1336775876651">
<!--ls:begin[component-1336775876651]-->
<div class="iw_component" id="1336775876651">
  <div>
    <div>
      <div id="main-container">
        <div id="content-container" class="wrap group">
          
          
          <div class="content group">
            <h1><?php echo $news['News']['title'];?></h1>
            <span class="datetime"><?php echo $news['News']['datetime'];?></span>
            
            <?php echo $news['News']['body'];?>
          </div>
          
        </div>
        <!--.wrap-->
      </div>
    </div>
  </div>
</div>
</div>