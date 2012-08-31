<?php
  echo $this->Html->css('E', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('two-column-form', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('migrated-global', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('accordion', null, array("media"=>"all", 'inline'=>false));
    echo $this->Html->css('stylesheet.v2', null, array("media"=>"all", 'inline'=>false));
  
  echo $javascript->link('widget', false);
  echo $javascript->link('jquery.selectBox', false);
  echo $javascript->link('jquery.infieldlabel', false);
  echo $javascript->link('membership-form', false);
  
  //echo $javascript->link('jquery.accordion', false);
  //echo $javascript->link('accordion-menu', false);
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
                <div id="left-col" class="form-block tiny">
                  <?php echo $this->Form->create('ContactForm', array(
                    'action'=>'add',
                    'inputDefaults'=>array(
                      'label' => false,
                      'div' => false)));?>
                  <div class="fields group">
                    <p>
                      <label class="elqLabel" for="FirstName"><span>* </span><?php echo __("First Name", true);?></label>
                      <?php echo $this->Form->input('first_name', array(
                        'id'=>'FirstName'
                      )) ;?>
                    </p>
                    <p>
                      <label class="elqLabel" for="LastName"><span>* </span><?php echo __("Last Name", true);?></label>
                      <?php echo $this->Form->input('last_name', array(
                        'id'=>'LastName',
                      )) ;?>
                    </p>
                    <p>
                      <label class="elqLabel" for="Email"><span>* </span><?php echo __("Business E-Mail Address", true);?></label>
                      <?php echo $this->Form->input('email', array(
                        'id'=>'Email',
                      ));?>
                    </p>
                    <p>
                      <label class="elqLabel" for="Phone"><span>* </span><?php echo __("Business Phone Number",true);?></label>
                      <?php echo $this->Form->input('phone', array(
                        'id'=>'Phone'
                      ));?>
                    </p>
                    <p>
                      <label class="elqLabel" for="Organization"><span>* </span><?php echo __("Organization Name", true); ?></label>
                     <?php echo $this->Form->input('organization', array(
                        'id'=>'Organization',
                     ));?>
                    </p>
                    <p class="group">
                       <?php echo $this->Form->input('learn_more', array(
                         'id'=>'OptIn',
                         'type'=>'checkbox'
                       ));?>
                       <label for="OptIn" class="checkbox"><?php echo __("I am interested in receiving e-mail communications from ATA.",true);?></label>
                    </p>
                </div>
                 <div id="form-footer" class="group">
                     <span id="progress-button" class="button left">
                     <label id="progress-button-label" for="submit"><?php echo __("Submit", true);?>
                     <?php echo $this->Html->image('btn-arrow-white-innershadow-right.png')?>
                     </label>

                     <?php echo $this->Form->end(array(
                       'label'=>"", 
                       'div'=>false,
                       'class'=>'elqSubmit',
                       'id'=>'submit'));?>
                     </span> 
                  </div>
                </div>
                
                <div id="right-col">
                  <?php foreach($rcontacts as $contact):?>
                  <h3><?php echo $contact['Contact']['title']; ?></h3>
                  <?php echo $contact['Contact']['body']; ?>
                  </br>
                  <?php endforeach; ?>
                </div>
                
                
              </div>
              
              <div id="sidebar">
                <a id="btn-offices" title="#" href="#"><span>Our Global Offices and Member Locations</span></a> 
               
                <?php echo $this->Html->link("<span>ATA Careers</span>",array(
                  'controller'=>'dashboards',
                  'action'=>'career'
                ), array(
                  'id'=>'btn-careers',
                  'escape'=>false
                ))?>
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
          </div>
        </div>
      </div>
    </div>
  <!--ls:end[component-1335793459118]-->
</div>