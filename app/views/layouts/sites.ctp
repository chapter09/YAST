<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $event['Event']['title']; ?> | 
    <?php echo $title_for_layout; ?>
  </title>
  
  <?php
    echo $this->Html->meta('icon');
     
    echo $this->Html->css('home-banner');
    echo $this->Html->css('styles');
    echo $this->Html->css('sites');
    echo $javascript->link('jquery.min');

    echo $javascript->link('ieversion');
    echo $javascript->link('menu');

    echo $scripts_for_layout;
    
    echo $javascript->link('exbd-sitewide');
  ?>
</head>
<body>
  
  <?php echo $this->Session->flash(); ?>
  <div class="ls-canvas" id="ls-canvas">
    <div class="ls-row" id="masthead">
      <div class="ls-fxr" id="ls-gen4963707-ls-fxr">
        <div class="ls-col" id="ls-row-1-col-1">
          <div class="ls-col-body" id="ls-gen4963708-ls-col-body">
            <div class="ls-row" id="ls-row-1-col-1-row-1">
              <div class="ls-fxr" id="ls-gen4963709-ls-fxr">
                <div class="ls-area wrap group" id="ls-row-1-col-1-row-1-area-1">
                  <div class="ls-area-body" id="ls-gen4963710-ls-area-body">
                    <div class="ls-cmp-wrap ls-1st" id="w1336412673846">
                      <!--ls:begin[component-1336412673846]-->
                      <div class="iw_component" id="1336412673846">
                        <div>
                        <div class="wrap group">
                          <?php
                            echo $this->Html->image('/files/'.$event['Event']['file_name'], array(
                              'title' => "Logo",
                              'url' => array('event_id'=>$event['Event']['id'], 
                                             'action' => 'index')
                            ));
                          ?>
                          <div class="float-right">
                            <div id="utility-bar">
                              <div id="corner-right"></div>
                              
                              <ul><li class="first">
                                <?php
                                  echo $this->Html->link(__("About", true), array(
                                    'controller' => 'dashboards',
                                    'action' => 'about',
                                  ));
                                  ?>
                                <ul></ul>
                              </li></ul>
                              
                             <ul><li class="">
                                <?php
                                echo $this->Html->link("中文", array(
                                  'language' => 'chi'
                                ));
                                ?>
                                <ul></ul>
                              </li></ul>
                              
                              <ul><li class="">
                                 <?php
                                  echo $this->Html->link("English", array(
                                    'language' => 'eng'
                                  ));
                                  ?>
                                <ul></ul>
                              </li></ul>
                              
                              <ul><li class="">
                                <?php echo $this->Html->link('', array(
                                  'controller'=>'dashboards',
                                  'action'=>'index',
                                ), array(
                                  'id'=>'home',
                                ))?>
				</a>
				<ul></ul>
                              </li></ul>
                            </div>
                                   
                          </div>
                        </div>
                      </div>
                      </div>
                      <!--ls:end[component-1337291993346]-->
                    </div>
                  </div>                    
                </div>
              </div>
              <div class="ls-row-clr"></div>
            </div>
          </div>
          <div class="ls-row" id="ls-row-1-col-1-row-2">
            <div class="ls-fxr" id="ls-gen53925400-ls-fxr">
              <div class="ls-area wrap group" id="ls-row-1-col-1-row-2-area-1">
                <div class="ls-area-body" id="ls-gen53925401-ls-area-body">
                  <div class="ls-cmp-wrap ls-1st" id="w1337291993347">
                  <!--ls:begin[component-1337291993347]-->
                  <div class="iw_component" id="1337291993347">
                    <div class="wrap group">
                      
                      <ul id="nav-dropdown">
                        <?php $count = 0; ?>
                        <?php foreach($menus as $menu):?>
                          <?php 
                          $class = "";
                          $plink = null;
                          
                          if (count($menu['items'])!=0){
                            if (count($menu['items'])==1){
                              $class = " class='single";
                              $plink = $menu['items'][0]['item'];
                            }else{
                              $class = " class='multi";
                            }
                            if ($count++ == 0){
                              $class = $class." first'";
                            }else{
                              $class = $class."'";
                            }
                          };
                          
                          ?>
                          <li<?php echo $class;?>>
                            <?php if(count($menu['items'])==1){
                              echo $this->Html->link($menu['name'], 
                                                     $plink);}
                              else if (count($menu['items'])>1): ?>
                              <ul class="dropdown">
                              <?php foreach($menu['items'] as $item):?>
                                <li>
                                  <?php $this->Html->link($item['name'], 
                                                          $item['item']);?>
                                </li>
                              <?php endforeach; ?>
                              </ul>
                            <?php endif; ?>
                          </li>
                        <?php endforeach; ?>
                       
                      </ul>
                    </div>
                  </div>
                  <!--ls:end[component-1336412673847]-->
                  </div>
                </div>
              </div>
            </div>
            <div class="ls-row-clr" ></div>
          </div>
        </div>
        <div class="ls-row-clr" ></div>
      </div>
    </div>
    
    <div class="ls-row" id="main-container">
      <div class="ls-fxr" id="ls-gen4963713-ls-fxr">
        <div class="ls-area" id="ls-row-2-area-1">
          <div class="ls-area-body" id="ls-gen4963714-ls-area-body">
            <?php echo $content_for_layout; ?>
            
            <?php if($withSidebar==true):?>
              <div id="sidbar">
                <?php foreach($sponsorTypes as $st):?>
                <h3><?php echo $st['SponsorType']['title']; ?></h3>
                <ul class="group sidebar">
                  <?php foreach($st['Sponsors'] as $sponsor):?>
                  <li>
                    <a class="group" href="<?php echo $sponsor['Sponsor']['url']; ?>">
                      <?php echo $this->Html->image("../files/".$sponsor['Sponsor']['file_name'], array(
                        "width"=>"97",
                        "height"=>"46"
                      ));?>

                    </a>
                  </li>
                  <?php endforeach; ?>
                </ul>
                <?php endforeach; ?>
              </div>
            <?php endif;?>
          </div>
        </div>
        <div class="ls-row-clr" ></div>
      </div>
    </div>
    
    <div class="ls-row" id="footer">
      <div class="ls-fxr" id="ls-gen53925404-ls-fxr">
        <div class="ls-area wrap group" id="ls-row-3-area-1">
          <div class="ls-area-body" id="ls-gen53925405-ls-area-body">
            <div class="ls-cmp-wrap ls-1st" id="w1337291993353">
              <!--ls:begin[component-1337291993353]-->
              <div class="iw_component" id="1337291993353">
                <div xmlns:cal="xalan://java.util.GregorianCalendar" class="wrap group">
                  <div class="float-left">
                    <ul>
                      <li class="first">
                        <a href="#" target="_self">Terms of Service</a>
                      </li>
                      <li class="">
                        <a href="#" target="_self">Privacy Statement</a>
                      </li>
                      <li class="">
                        <a href="#" target="_self">Copyright Inquiries</a>
                      </li>
                      <li class="">
                        <a href="#" target="_self">Site Map</a>
                      </li>
                    </ul>
                    <p>©&nbsp;2012&nbsp;The ATA. All Rights Reserved.</p>
                  </div>
                  
                  <div id="safe-harbor" style="display:none;">
                    <p><a href="#" target="_blank">We self-certify compliance with</a></p>
                    <a href="#" target="_blank">
                      <?php echo $this->Html->image('footer-safe-harbor.gif',
                        array(
                          'class'=>'logo',
                          'height'=>'39',
                          'width'=>'104',
                        )
                      );?>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
<!--ls:end[body]-->
</body>
</html>
