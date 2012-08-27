<?php

  echo $this->Html->css('nbrr', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('migrated-global', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('default+en', null, array("media"=>"all", 'inline'=>false));

  echo $javascript->link('ga-global', false);
?>

<div class="ls-row wrap" id="content-container">
  <div class="ls-fxr" id="ls-gen26936984-ls-fxr">
    <div class="ls-col" id="ls-row-2-col-1-row-1-col-1">
      <div class="ls-col-body" id="ls-gen26936985-ls-col-body">
        <div class="ls-row group" id="container">
          <div class="ls-fxr" id="ls-gen26936986-ls-fxr">
            <div class="ls-col" id="ls-row-2-col-1-row-1-col-1-row-1-col-1">
              <div class="ls-col-body" id="ls-gen26936987-ls-col-body">
                <div class="ls-row" id="ls-row-2-col-1-row-1-col-1-row-1-col-1-row-1">
                  <div class="ls-fxr" id="ls-gen26936988-ls-fxr">
                    <div class="ls-area" id="main">
                      <div class="ls-area-body" id="ls-gen26936989-ls-area-body">
                        <div class="ls-cmp-wrap ls-1st" id="w1337292009454">
                          <!--ls:begin[component-1337292009454]-->
                          <!--ls:end[component-1337292009454]-->
                        </div>
                        
                        <div class="ls-cmp-wrap" id="w1337292009455">
                          <!--ls:begin[component-1337292009455]-->
                          <div class="iw_component" id="1337292009455">
                            <div id="banner" class="content-wide">
                              <h1><?php echo $entry['StEntry']['title'];?></h1>
                            </div>
                          </div>
                          <!--ls:end[component-1337292009455]-->
                        </div>
                        
                        <div class="ls-cmp-wrap" id="w1337292009456">
                          <!--ls:begin[component-1337292009456]-->
                          <div class="iw_component" id="1337292009456">
                            <div>
                              <div class="col-span">
                                <?php echo $entry['StEntry']['body'];?>
                              </div>
                            </div>
                          </div>
                          <!--ls:end[component-1337292009456]-->
                        </div>
                        
                        <div class="ls-cmp-wrap" id="w1337292009482">
                          <!--ls:begin[component-1337292009482]-->
                          <div class="iw_component" id="1337292009482">
                            <div>
                              <?php
                                echo $javascript->link('news-feed-xml');
                                echo $javascript->link('saved_resource');
                                echo $javascript->link('default+en.I.js');
                              ?>
                              <div>
                                <span class="more">
                                  <a title="More" href="" target="_self">
                                  
                                  </a>
                                </span>

                                <? foreach ($sections as $section):?>
                                <h3><?php echo $section['StSection']['title']?></h3>
                                <div id="section<?php echo $section['StSection']['id']?>">
                                  <?php echo $section['StSection']['body']; ?>
                                </div>
                              </div>
                                <? endforeach; ?>
                            </div>
                          </div>
                          <!--ls:end[component-1337292009457]-->
                        </div>
                      </div>
                    </div>
                    <div class="ls-row-clr"></div>
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="ls-col" id="ls-row-2-col-1-row-1-col-1-row-1-col-2">
              <div class="ls-col-body" id="ls-gen26936990-ls-col-body">
                <div class="ls-row" id="ls-row-2-col-1-row-1-col-1-row-1-col-2-row-1">
                  <div class="ls-fxr" id="ls-gen26936991-ls-fxr">
                    <div class="ls-area" id="sidebar">
                      <div class="ls-area-body" id="ls-gen26936992-ls-area-body">
                        <div class="ls-cmp-wrap ls-1st" id="w1337292009458">
                          <!--ls:begin[component-1337292009458]-->
                          <div class="iw_component" id="1337292009458">
                            <div>
                              <div id="sidebar" style="padding:20px 0px 0px 20px">
                                <a id="btn-offices" title="#" href="#"><span>Our Global Offices and Member Locations</span></a> 
                                 <?php echo $this->Html->link("<span>ATA Careers</span>",array(
                                    'controller'=>'dashboards',
                                    'action'=>'career'
                                  ), array(
                                    'id'=>'btn-careers',
                                    'escape'=>false
                                  ))?>
                                <div id="btn-connect-bg">
                                  <a id="btn-facebook" href="#" target="_blank">    
                                    <span>Facebook</span>
                                  </a> 
                                  <a id="btn-twitter" href=""> 
                                    <span>Twitter</span>
                                  </a>
                                  <a id="btn-youtube" href="#" target="_blank">     
                                    <span>YouTube</span>
                                  </a>
                                </div>
                                <!-- #EndLibraryItem -->
                                <!--#btn-connect-bg-->
                              </div>
                            </div>
                          </div>
                          <!--ls:end[component-1337292009458]-->
                        </div>
                      </div>
                    </div>
                    <div class="ls-row-clr"></div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="ls-row-clr"></div>
          </div>
        </div>
      </div>
    
    
    <div class="ls-row-clr"></div>
  </div>
</div>
