<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    YAST | 
    <?php echo $title_for_layout; ?>
  </title>
  
  <?php
    echo $this->Html->meta('icon');
     
    echo $this->Html->css('home-banner');
    echo $this->Html->css('styles');
    
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
                            echo $this->Html->image('logo-ceb.png', array(
                              'title' => "Logo",
                              'url' => array('controller' => 'dashboards', 
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
                              
                              <ul><li class="first">
                                <?php
                                  echo $this->Html->link(__("About", true), array(
                                    'controller' => 'dashboards',
                                    'action' => 'about',
                                  ));
                                  ?>
                                <ul></ul>
                              </li></ul>
                             
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
                                <a id="home" href="/">
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
                        <li class="service-toggle">
                          <?php
                            echo $this->Html->link(__("Service Targets", true), array(
                              'controller' => 'dashboards',
                              'action' => 'service',
                            ));
                            ?>
                          <ul class="services-dropdown">
                            <?php foreach($stTypes as $stType): ?>
                            <li class="heading"><a target="_self">
                            <?php echo $stType['StType']['title']; ?>
                            </a></li>
                            <?php foreach($stType['StEntry'] as $stEntry): ?>
                            <li><?php echo $this->Html->link($stEntry['StEntry']['title'],
                            array(
                              'controller'=>'dashboards',
                              'action'=> 'service',
                              $stEntry['StEntry']['id']
                            ),
                            array(
                              'escape'=>false
                            )
                            
                            );?></li>
                            <?php endforeach; ?>
                            <?php endforeach; ?> 
                          </ul>

                        </li>
          
                        <li>
                          <?php
                            echo $this->Html->link(__("Enterprise Clients", true), array(
                              'controller' => 'dashboards',
                              'action' => 'enterprise',
                            ));
                            ?>
                        </li>
                        
                        <li>
                          <?php
                            echo $this->Html->link(__("News", true), array(
                              'controller' => 'dashboards',
                              'action' => 'news',
                            ));
                            ?>
                        </li>
                        
                        <li>
                          
                          <?php
                            echo $this->Html->link(__("About", true), array(
                              'controller' => 'dashboards',
                              'action' => 'about',
                            ));
                            ?>
                        </li>
                        
                        
                        
                        <li>
                          <?php
                            echo $this->Html->link(__("Contact", true), array(
                              'controller' => 'dashboards',
                              'action' => 'contact',
                            ));
                            ?>
                        </li>
                        
                        
                        <li>
                          <?php
                            echo $this->Html->link(__("Career", true), array(
                              'controller' => 'dashboards',
                              'action' => 'career',
                            ));
                            ?>
                        </li>
                        
                        
                        <li class="membership-btn">
                          <?php
                            echo $this->Html->link(
                            "<span>".__("Apply for the conference", true)."<span>", 
                              array(
                                'controller' => 'dashboards',
                                'action' => 'apply',
                            ),
                            array('escape'=>false));
                            ?> 
                        </li>
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
          </div>
        </div>
        <div class="ls-row-clr" ></div>
      </div>
    </div>
    <?php if($setFooter):?>
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
                    <p>©&nbsp;2012&nbsp;The Corporate Executive Board Company. All Rights Reserved.</p>
                  </div>
                  
                  <div id="safe-harbor">
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
    <?php endif; ?>
  </div>
<!--ls:end[body]-->
</body>
</html>
