<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <?php echo $this->Html->charset(); ?>
  <title>
    <?php echo $title_for_layout; ?>
  </title>
  
  <?php
    echo $this->Html->meta('icon');
    echo $this->Html->css('E'); 
    echo $this->Html->css('main');
    echo $this->Html->css('home-banner');
    echo $this->Html->css('styles');
    echo $this->Html->css('home');
    
    echo $javascript->link('jquery.min');

    echo $javascript->link('ieversion');
    echo $javascript->link('menu');
    echo $javascript->link('ieversion');

    
    echo $javascript->link('jquery.easing.1.3');
    echo $javascript->link('jquery.xfade');
    echo $javascript->link('jquery.bxSlider');
    echo $javascript->link('initializations-home-global');
    echo $javascript->link('exbd-sitewide');

    echo $scripts_for_layout;
  ?>
</head>
<body>
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
                                             'action' => 'home')
                            ));
                          ?>
                          <div class="float-right">
                            <div id="utility-bar">
                              <div id="corner-right"></div>
                              
                              <ul><li class="first">
                                <?php
                                  echo $this->Html->link("About", array(
                                    'controller' => 'pages',
                                    'action' => 'display',
                                    'about'
                                  ));
                                  ?>
                                <ul></ul>
                              </li></ul>
                              
                              <ul><li class="">
                                <?php
                                echo $this->Html->link("Chinese", array(
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
                            echo $this->Html->link("Service Targets", array(
                              'controller' => 'pages',
                              'action' => 'display',
                              'service'
                            ));
                            ?>
                          <ul class="services-dropdown">
                            <?php foreach($stTypes as $stType): ?>
                            <li class="heading"><a target="_self">
                            <?php echo $stType['StType']['title']; ?>
                            </a></li>
                            <?php foreach($stType['StEntry'] as $stEntry): ?>
                            <li><a target="_self" href="#">
                              <?php echo $stEntry['StEntry']['title'];?>
                            </a></li>
                            <?php endforeach; ?>
                            <?php endforeach; ?> 
                          </ul>

                        </li>
          
                        <li>
                          <?php
                            echo $this->Html->link("Enterprise Clients", array(
                              'controller' => 'pages',
                              'action' => 'display',
                              'enterprise'
                            ));
                            ?>
                        </li>
                        
                        <li>
                          
                          <?php
                            echo $this->Html->link("About", array(
                              'controller' => 'pages',
                              'action' => 'display',
                              'about'
                            ));
                            ?>
                        </li>
                        
                        <li>
                          <?php
                            echo $this->Html->link("Contact", array(
                              'controller' => 'pages',
                              'action' => 'display',
                              'contact'
                            ));
                            ?>
                        </li>
                        
                        <li class="membership-btn">
                          <?php
                            echo $this->Html->link(
                            "<span>"."Apply for the conference"."<span>", 
                              array(
                                'controller' => 'pages',
                                'action' => 'display',
                                'apply'
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
            <div class="ls-cmp-wrap ls-1st" id="w1336775876334">
              <!--ls:begin[component-1336775876334]-->
              <div class="iw_component" id="1336775876334">
                <div class="wrap">
                  <div id="hero-text-container">
                    <div class="fade-text">
                      <h1>Head 1</h1>
                      <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h2>
                      <h2><a href="http://news.executiveboard.com/2012-08-02-Corporate-Executive-Board-Completes-The-Acquisition-Of-SHL-Declares-Quarterly-Cash-Dividend" target="_blank" title=""><span>&raquo; Link 1</span></a></h2>
                    </div>
                    <div class="fade-text hidden">
                      <h1>Head 2</h1>
                      <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h2>
                      <h2><a href="/exbd/executive-guidance/2012/q2/index.page?cid=70180000000a0Ya" target="_self" title=""><span>&raquo; Link 2</span></a></h2>
                    </div>
                    <div class="fade-text hidden">
                      <h1>Head 3</h1>
                      <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h2>
                      <h2><a href="/exbd/clients/index.page?" target="_self" title=""><span>&raquo; Link 3</span></a></h2>
                    </div>
                    <div class="fade-text hidden">
                      <h1>Head 4</h1>
                      <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h2>
                      <h2><a href="/exbd/information-technology/insight-deficit/index.page?" target="_self" title=""><span>&raquo; Link 4</span></a></h2>
                    </div>
                    <div class="fade-text hidden">
                      <h1>Head 5</h1>
                      <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </h2>
                      <h2><a href="/exbd/legal-risk-compliance/making-integrity-pay/index.page?" target="_self" title=""><span>&raquo; Link 5</span></a></h2>
                    </div>
                    <div class="fade-text hidden">
                      <h1>Head 6</h1>
                      <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</h2>
                      <h2><a href="/exbd/marketing-communications/the-new-consumer/decision-simplicity/index.page?cid=70180000000ZJbC" target="_self" title=""><span>&raquo; Link 6</span></a></h2>
                    </div>
                  
                    <div id="hero-nav"></div>
                  </div>
                </div>
                <div id="slide-wrapper">
                  <ul id="slide">
                    <li style="background-image:url(/yast/img/businessman-handshake.png);"></li>
                    <li style="background-image:url(/yast/img/exploding-lightbulbs.png);"></li>
                    <li style="background-image:url(/yast/img/carabiner-in-rock.png);"></li>
                    <li style="background-image:url(/yast/img/green-cables.png);"></li>
                    <li style="background-image:url(/yast/img/office-door.png);"></li>
                    <li style="background-image:url(/yast/img/shopping-bags.png);"></li>
                  </ul>
                </div>
              </div>
              <!--ls:end[component-1336775876334]-->
            </div>
          
            <div class="ls-cmp-wrap" id="w1336686522183">
              <!--ls:begin[component-1336686522183]-->
              <div class="iw_component" id="1336686522183">
                <div class="wrap"></div>
              </div>
              <!--ls:end[component-1336686522183]-->
            </div>
            <div class="ls-cmp-wrap" id="w1336686522128">
              <!--ls:begin[component-1336686522128]-->
              <div class="iw_component" id="1336686522128">
                  <div id="insight-container">
                    <div class="wrap">
                      <div id="insight-navigation-container" class="group">
                        <div id="insight-navigation">
                          <h2>YAST</h2>
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
                          <li>Header 0<br/>
                            <a href="/exbd/corporate-benchmarking/budget-staff-spend/index.page?cid=70180000000ZZTM">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</a>
                            <br/>
                          </li>
                          <li>Header 1<br/>
                            <a href="/exbd/financial-services/consumer-financial-monitor/index.page?">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</a>
                            <br/>
                          </li>
                          <li>Header 2<br/>
                            <a href="/exbd/executive-guidance/2012/government/index.page?cid=70180000000ZUYZ">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</a>
                            <br/>
                          </li>
                          <li>Header 3<br/>
                            <a href="/exbd/human-resources/battle-for-chinas-talent.page?cid=70180000000Z1Fp">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</a>
                            <br/>
                          </li>
                         
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              <!--ls:end[component-1336686522128]-->
            </div>

            <div id="slideshow">
              <ul id="menu">
                <li class="">
                  <a href="" class="slide"><img src="/yast/img/about_active.jpg" alt="" width="150" height="82"></a>
                </li>
                <li class="">
                  <a href="" class="slide"><img src="/yast/img/businesses_active.jpg" alt="" width="150" height="82"></a>
                </li>
                <li class="slide">
                  <a href="" class="slide"><img src="/yast/img/people_active.jpg" alt="" width="150" height="82"></a>
                </li>
                <li class="">
                  <a href="" class="slide"><img src="/yast/img/sustainability_active.jpg" alt="" width="150" height="82"></a>
                </li>
                <li class="">
                  <a href="" class="slide"><img src="/yast/img/investor_active.jpg" alt="" width="150" height="82"></a>
                </li>
                <li class="last ">
                  <a href="" class="slide"><img src="/yast/img/media_active.jpg" alt="" width="150" height="82"></a>
                </li>
                <li class="background" style="visibility: visible; zoom: 1; opacity: 1; left: 328px; top: 0px; width: 164px; height: 82px; right: 164px; bottom: 82px; ">
                  <div class="inner">
                    
                  </div>
                </li>
              </ul>
            </div>

            <div class="ls-cmp-wrap" id="w1336686522184">
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
          </div>
        </div>
        <div class="ls-row-clr" ></div>
      </div>
    </div>
  </div>
<!--ls:end[body]-->
</body>
</html>
