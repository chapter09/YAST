<?php

  echo $this->Html->css('nbrr', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('migrated-global', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('default+en', null, array("media"=>"all", 'inline'=>false));

  echo $javascript->link('ga-global', false);
?>

<div class="ls-row wrap" id="content-container">
      <div class="ls-col-body" id="ls-gen26936985-ls-col-body">
        <div class="ls-row group" id="container">
                  
          <div class="ls-area" id="main">
                        
                      <div id="banner" class="content-wide">
                        <h1><?php echo $entry['StEntry']['title'];?></h1>
                      </div>
  
                      <div class="col-span">
                        <?php echo $entry['StEntry']['body'];?>
                      </div>
                          
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
                                <? endforeach; ?>
                              </div>
                      </div>
          </div>
          <div class="ls-row-clr"></div>
                  
                
            
          <div class="ls-area" id="sidebar">
                      
            <div>
              <a id="btn-offices" title="#" href="#"><span>Our Global Offices and Member Locations</span></a> 
               <?php echo $this->Html->link("<span>About ATA</span>",array(
                  'controller'=>'dashboards',
                  'action'=>'about'
                ), array(
                  'id'=>'btn-careers',
                  'escape'=>false
                ));?>
              <div id="btn-connect-bg">
                <a id="btn-facebook" href="<?php echo $linkedin['Setting']['value'];?>" target="_blank">    
                  <span>LinkedIn</span>
                </a> 
                <a id="btn-twitter" href="<?php echo $weibo['Setting']['value'];?>"> 
                  <span>Weibo</span>
                </a>
              </div>
            </div>
         
          </div>
          <div class="ls-row-clr"></div>
            
          <div class="ls-row-clr"></div>
          
        </div>
      </div>
    
      <div class="ls-row-clr"></div>
</div>
