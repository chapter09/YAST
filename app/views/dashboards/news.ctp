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
             <!-- JiaThis Button BEGIN -->
              <div class="jiathis_style">
              	<span class="jiathis_txt">分享到：</span>
              	<a class="jiathis_button_icons_1"></a>
              	<a class="jiathis_button_icons_2"></a>
              	<a class="jiathis_button_icons_3"></a>
              	<a class="jiathis_button_icons_4"></a>
              	<a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
              	<a class="jiathis_counter_style"></a>
              </div>
              <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1334643638129254" charset="utf-8"></script>
              <!-- JiaThis Button END -->
            <?php echo $news['News']['body'];?>
          </div>
          
        </div>
        <!--.wrap-->
      </div>
    </div>
  </div>
</div>
</div>