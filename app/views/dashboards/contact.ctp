<?php
  echo $this->Html->css('E');
  echo $this->Html->css('migrated-global');
  echo $this->Html->css('accordion');
  
  echo $javascript->link('jquery.accordion', false);
  echo $javascript->link('accordion-menu', false);
?>

<div class="ls-cmp-wrap ls-1st" id="w1335793459118">
  <!--ls:begin[component-1335793459118]-->
    <div class="iw_component" id="1335793459118">
      <div>
        <div>
          <div id="content-container" class="wrap">
            <div id="container" class="group">
              <div id="main">
                <div id="breadcrumbs" style="display:none;">Contact Us</div>
                <h1><?php echo __("Contact Us", true); ?></h1>
                <div id="left-col">
                  <?php foreach($lcontacts as $contact):?>
                  <h3><?php echo $contact['Contact']['title']; ?></h3>
                  <?php echo $contact['Contact']['body']; ?>
                  </br>
                  <?php endforeach; ?>
                </div>
                
                <div id="right-col">
                  <h3><?php echo __("Office Locations", true); ?></h3>
                  <div id="accordion-container">
                    <h4 class="first"><?php echo __("Headquarters", true); ?></h4>
                    <ul id="accordion" class="menu">
                      <?php foreach($rcontacts as $contact):?>
                      <li class="group"><span class="expanded"><?php echo $contact['Contact']['title']?></span> 
                        <ul style="dislpay:none;">
                          <li>
                        <?php echo $contact['Contact']['body']; ?>
                          </li>
                        </ul>
                      </li>
                      <?php endforeach; ?>
                    </ul>

                  </div>
                </div>
              </div>
              
              <div id="sidebar">
                <a id="btn-offices" title="#" href="#"><span>Our Global Offices and Member Locations</span></a> 
                <a id="btn-careers" title="CEB Careers" href="#"> 
                  <span>CEB Careers</span>
                </a>
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
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--ls:end[component-1335793459118]-->
</div>