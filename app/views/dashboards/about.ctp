<?php
  
  echo $this->Html->css('about', null, array("media"=>"all", 'inline'=>false));
  
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
          <div id="banner" class="content-wide">
            <h1><?php echo __("About Us", true); ?></h1>
            <h2><?php echo $banner['Setting']['value'];?></h2>
          </div>

          <div class="group" style="padding-bottom:15px;">
            <ul id="tabs-nav" class="side">
              <?php $count = 0;?>
              <?php foreach($abouts as $about):?>
              
              <li class="<?php echo ($count==0)?'activeli':''; ?>">
                <a href="#" class="<?php echo ($count==0)?'active':''; ?>"><?php echo $about['About']['title']?></a>
              </li>
              <?php $count++; ?>
              <? endforeach; ?>
            </ul>
            
            <div id="tabs" class="content">
              <?php $count = 0; ?>
              <?php foreach($abouts as $about): ?>
              <?php $count ++;?>
              <div id="tab<?php echo $count; ?>" class="tab" style="height: 450px; display: block; <?php echo ($count==1)?"display: block;": "display: none;"?>">
                <h2><?php echo $about['About']['title']?></h2>
                <?php echo $about['About']['body']?>
              </div>
              <?php endforeach; ?>
            </div>
            <script type="text/javascript"><!--
              var tabber1 = new Yetii({
                id: 'tabs',
                active: 1
              });
              /*
              var tabber2 = new Yetii({
                id: 'tabs-nested',
                tabclass: 'locations',
                active: 14
              });*/
        // --></script>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>