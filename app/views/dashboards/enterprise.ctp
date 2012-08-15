<?php
  echo $this->Html->css('clients', null, array("media"=>"all", 'inline'=>false));
  
  echo $javascript->link('7355', false);
  echo $javascript->link('insight.min', false);
  echo $javascript->link('jquery.xfade', false);
  echo $javascript->link('initializations-clients', false);
?>
<div class="ls-cmp-wrap ls-1st" id="w1336775876651">
<!--ls:begin[component-1336775876651]-->
<div class="iw_component" id="1336775876651">
  <div>
    <div>
      <div id="main-container">
        <div id="content-container" class="wrap group">
          <div id="hero-text-container" style="display:none;">
            <h1><?php echo __("Our Clients", true);?></h1>
            <!--SLIDE-->
            <?php $count = 0;
            foreach($sliders as $slider):?>
            <div class="fade-text<?php echo ($count==0)?"":" hidden"; ?>" style="<?php echo ($count==0)?"display: none;":"display: block;";?>">
              <?php echo $slider['EcSlider']['body']; ?>
            </div>
            <?php $count++ ;?>
            <?php endforeach; ?>
      
            <div id="hero-nav"></div>
            <!--#hero-nav-->
          </div>
          <!--#hero-text-container-->
          
          <div id="slide-wrapper" style="display:none;">
            <div class="xfade">
              <div class="xfade-container">
                <ul id="slide" style="position: relative; height: 330px; overflow: hidden; ">
                  <?php foreach($sliders as $slider):?>
                  <li style="position: absolute; top: 0px; left: 0px; z-index: 4; display: none; ">
                    <?php echo $this->Html->image("../files/".$slider['EcSlider']['file_name'],
                    array("width"=>"960", "height"=>"330")); ?>
                     
                  </li>
                  <?php endforeach; ?>
                </ul>
              </div>
            </div>
          </div>
    
          <div class="content group">
            <p class="large-text"><?php echo $banner['Setting']['value'];?></p>
          </div>
          
          <div class="content-wide group">
            
            <ul id="filtered-list" class="group testimonials">
              <?php foreach($sponsors as $sponsor):?>
              <li>
                <a class="group" href="<?php echo $sponsor['Sponsor']['url']; ?>">
                  <?php echo $this->Html->image("../files/".$sponsor['Sponsor']['file_name'], array(
                    "width"=>"97",
                    "height"=>"46"
                  ));?>
                  <?php echo $sponsor['Sponsor']['sponsor_description']; ?><br>
                  <strong><?php echo $sponsor['Sponsor']['sponsor_name']; ?></strong>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
          </div>
        </div>
        <!--.wrap-->
      </div>
    </div>
  </div>
</div>
</div>