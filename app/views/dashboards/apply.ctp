<?php
  echo $this->Html->css('E', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('two-column-form', null, array("media"=>"all", 'inline'=>false));
  echo $this->Html->css('stylesheet.v2', null, array("media"=>"all", 'inline'=>false));
  
  echo $javascript->link('widget', false);
  echo $javascript->link('jquery.selectBox', false);
  echo $javascript->link('jquery.infieldlabel', false);
  echo $javascript->link('membership-form', false);
  echo $javascript->link('ga-global', false);
?>


<div class="ls-cmp-wrap ls-1st" id="w1342215584988">
  <!--ls:begin[component-1342215584988]-->
  <div class="iw_component" id="1342215584988">
    <div>
      <div>
        <div id="banner" class="group wrap">
          <div id="text-container">
            <div id="breadcrumbs"><?php echo $this->Html->link(__('Contact Us',true),
              array(
                'controller'=>'dashboards',
                'action'=>'about',
              )
            )?> / Interested in Membership?
            </div>
            
            <h1><?php echo __("Thank you for your interest in YAST.", true);?></h1>
            
            <h2 class="subtitle"><?php echo __("YAST is the leading member-based advisory company."); ?></h2>
          </div>
          <!--#text-container-->
          <div id="image-container">&nbsp;</div>
          
          <!--#image-container--> 
        </div>
        <!--#banner-->
        
      </div>
    </div>
  </div>
  <!--ls:end[component-1342215584988]-->
</div>

<div class="ls-cmp-wrap" id="w1342215584989">
<!--ls:begin[component-1342215584989]-->
<div class="iw_component" id="1342215584989">
  <div>
    <div>
      <div class="group wrap" style="background-color:#fff;">
        <div id="main">
<p style="width:613px;"><?php echo $banner['Setting']['value'];?></p> 


<?php echo $this->Form->create('Application', array(
  'action'=>'add',
  'inputDefaults'=>array(
    'label' => false,
    'div' => false)));?>

<div id="form-container" class="group">
<div id="slider1">
  <div id="page1">
    <div class="form-block group">
      <h4><?php echo __("Contact Information",true); ?></h4>
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
      </div>
      <!--.fields group--> 
    </div>
    <!--.form-block group-->
    
    <div class="form-block group">
      <h4><?php echo __("Professional Information", true);?></h4>
      <div class="fields group">
        <p>
          <label class="elqLabel" for="JobTitle"><?php echo __("Professional Title",true);?></label>
          <?php echo $this->Form->input('position', array(
            'id'=>'JobTitle',
          ));?>
        </p>
        <p>
          <select class="elqSelect selectBox" id="Position" name="position" size="1" style="display: none; ">
            <option selected="selected" value="">* Position</option>
            <option value="CXO">CXO</option>
            <option value="Head of Function">Head of Function</option>
            <option value="Vice President">Vice President</option>
            <option value="Director">Director</option>
            <option value="Manager">Manager</option>
            <option value="Individual Contributor ">Individual Contributor</option>
          </select>
          
        </p>
        <p>
          <select class="elqSelect selectBox" id="JobFunction" name="department" size="1" style="display: none; ">
            <option value="" selected="selected">* Department/Function</option>
            <option value="Communications">Communications</option>
            <option value="Finance">Finance</option>
            <option value="Customer Service">Customer Service</option>
            <option value="HR Management">HR Management</option>
            <option value="HR Benefits">HR Benefits</option>
            <option value="HR Compensation">HR Compensation</option>
            <option value="HR Learning and Development">HR Learning and Development</option>
            <option value="Information Technology">Information Technology</option>
            <option value="Legal Risk and Compliance">Legal Risk and Compliance</option>
            <option value="Marketing">Marketing</option>
            <option value="Operations">Operations</option>
            <option value="Sales">Sales</option>
          </select>
        </p>
      </div>
      <!--.fields group-->
      <h4><?php echo __("Learn More",true);?></h4>
      <div class="fields group">
        <p class="group">
          <?php echo $this->Form->input('learn_more', array(
            'id'=>'OptIn',
            'type'=>'checkbox'
          ));?>
          <label for="OptIn" class="checkbox"><?php echo __("I am interested in receiving e-mail communications from ATA.",true);?></label>
        </p>
      </div>
      <!--fields group--> 
    </div>
    <!--form-block group--> 
  </div>
  <!--page1-->
  
</div>
<!--#slider1--> 
</div>
<!--#form-container group-->
    <div id="form-footer" class="group">
      <span id="progress-button" class="button">
      <label id="progress-button-label" for="submit"><?php echo __("Submit", true);?>
      <?php echo $this->Html->image('btn-arrow-white-innershadow-right.png')?>
      </label>
      
      <?php echo $this->Form->end(array(
        'label'=>"", 
        'div'=>false,
        'class'=>'elqSubmit',
        'id'=>'submit'));?>
      </span> </div>
  </form>
</div>
</div></div><!--ls:end[component-1342215584989]--></div></div></div>