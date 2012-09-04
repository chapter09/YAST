<?php
  echo $this->Html->css('main', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('home', null, array("media"=>"all", 'inline'=>false));
  
  echo $javascript->link('jquery.easing.1.3', false);
  echo $javascript->link('jquery.xfade', false);
  echo $javascript->link('jquery.bxSlider', false);
  
  echo $javascript->link('initializations-home-global', false);

?>

  <div class="ls-cmp-wrap ls-1st" id="w1336775876334">
    <!--ls:begin[component-1336775876334]-->
    <div class="iw_component" id="1336775876334">
      <div class="wrap">
        <div id="hero-text-container">
          <?php foreach($sliders as $slider):?>
          <div class="fade-text">
            <h1><?php echo $slider['Slider']['title']; ?></h1>
            <h2><?php echo $slider['Slider']['body']; ?></h2>
          </div>
          <?php endforeach; ?>
        
          <div id="hero-nav"></div>
        </div>
      </div>
      <div id="slide-wrapper">
        <ul id="slide">
          <?php foreach($sliders as $slider):?>
          <li style="background-image:url(<?php echo $this->webroot.'files/'.$slider['Slider']['file_name'];?>);"></li>
          <!--li><?php echo $this->Html->image('../files/'.$slider['Slider']['file_name']);?></li-->
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
    <!--ls:end[component-1336775876334]-->
  </div>

  <div class="ls-cmp-wrap" id="w1336686522183">
    <!--ls:begin[component-1336686522183]-->
    <!--div class="iw_component" id="1336686522183">
      <div class="wrap"></div>
    </div-->
    <!--ls:end[component-1336686522183]-->
  </div>
  <div class="ls-cmp-wrap" id="w1336686522128">
    <!--ls:begin[component-1336686522128]-->
    <div class="iw_component" id="1336686522128">
        <div id="insight-container">
          <div class="wrap">
            <div id="insight-navigation-container" class="group">
              <div id="insight-navigation">
                <h4><?php echo __('News_'); ?></h4>
              </div>
              <div style="clear:both;"></div>
              <div id="go-prev">
                <span>Previous</span>
              </div>
              <div id="go-next">
                <span>Next</span>
              </div>
            </div>
            <div id="insight-content">
              <ul id="insights">
                <?php foreach($news as $n):?>
                <li><?php echo $n['News']['title']; ?><br/>
                  <?php echo $this->Html->link($n['News']['description'],array(
                    'controller'=>'dashboards',
                    'action'=>'news',
                    $n['News']['id']
                  ))?>
                  <br/>
                </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    <!--ls:end[component-1336686522128]-->
  </div>

  <div id="slideshow">
    <ul id="menu">
      <?php $count = 0; ?>
      <?php foreach($sliderShows as $action => $img):?>
      <?php $count ++; ?>
      <li class=<?php echo ($count == count($sliderShows))?'"last"':'""';?>>
        <?php echo $this->Html->image($img, array(
          'width'=>'150',
          'height'=>'82',
          'url'=>array(
            'controller'=>'dashboards',
            'action'=>$action,
          )
        ));?>
      </li>
      <?php endforeach; ?>
      
      <li class="background" style="visibility: visible; zoom: 1; opacity: 1; left: 328px; top: 0px; width: 164px; height: 82px; right: 164px; bottom: 82px; ">
        <div class="inner">
          
        </div>
      </li>
    </ul>
  </div>

  <div class="ls-cmp-wrap" id="w1336686522184" style="display:none;">
    <!--ls:begin[component-1336686522184]-->
    <div class="iw_component" id="1336686522184">
      <div>
        <div>
          <div id="sub-links-container">
            <div class="wrap group">
              <div class="sub-links">
                <h3>Title 0</h3>
                  <ul>
                  <li><a href="/exbd/careers/index.page?">Link 0</a></li>
                  <li><a href="/exbd/careers/alumni/index.page?">Link 0</a></li>
                  <li><a href="http://ceb.mediaroom.com/">Link 0</a></li>
                  <li><a href="/exbd/community/index.page?">Link 0</a></li>
                  <li><a href="/exbd/executive-guidance/2012/q1/index.page?">Link 0</a></li>
                  </ul>
              </div>
              <!--.sub-links-->
              <div class="sub-links">
                <h3>Title 1</h3>
                <ul>
                <li><a href="/exbd/about/index.page?tabs=6">Link 2</a></li>
                <li><a href="/exbd/about/index.page?tabs=7">Link 2</a></li>
                <li><a href="/exbd/about/index.page?tabs=8">Link 2</a></li>
                <li><a href="http://ir.executiveboard.com/phoenix.zhtml?c=113226&amp;p=irol-irhome">Link 2</a></li>
                <li><a href="http://ceb.mediaroom.com/">Link 2</a></li>
                </ul>
              </div>
              <!--.sub-links-->
              <div class="sub-links">
                <h3>Title 2</h3>
                <ul>
                <li><a href="/exbd/service-areas/index.page?">Link 3</a></li>
                <li><a href="/exbd/smb/index.page?">Link 3</a></li>
                <li><a href="/exbd/government/index.page?">Link 3</a></li>
                <li><a href="/exbd/contact-us/index.page?">Link 3<a></li>
                <li><a href="/exbd/member-login/index.page?">Link 3</a></li>
                </ul>
              </div>
              <!--.sub-links-->
              <div class="sub-links">
                <h3>Title 3</h3>
                <ul>
                <li><a href="/exbd/finance/index.page?">Link 4</a></li>
                <li><a href="/exbd/human-resources/index.page?">Link 4</a></li>
                <li><a href="/exbd/information-technology/index.page?">Link 4</a></li>
                <li><a href="/exbd/innovation-strategy/index.page?">Link 4</a></li>
                <li><a href="/exbd/legal-risk-compliance/index.page?">Link 4</a></li>
                </ul>
              </div>
              <!--.sub-links-->
              <div class="sub-links">
                <ul style="padding-top:13px;">
                <li><a href="/exbd/marketing-communications/index.page?">Link 4</a></li>
                <li><a href="/exbd/procurement-operations/index.page?">Link 4</a></li>
                <li><a href="/exbd/sales-service/index.page?">Link 4</a></li>
                <li><a href="/exbd/financial-services/index.page?">Link 4</a></li>
                <li><a href="/exbd/government/index.page?">Link 4</a></li>
                </ul>
              </div>
              <!--.sub-links-->
            </div>
            <!--.wrap-->
          </div>
          <!--#sub-links-container">-->
        </div>
      </div>
    </div>
    <!--ls:end[component-1336686522184]-->
  </div>
