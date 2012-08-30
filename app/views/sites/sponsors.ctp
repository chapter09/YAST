<?php
  echo $this->Html->css('clients', null, array("media"=>"all", 'inline'=>false));
  
  echo $javascript->link('7355', false);
  echo $javascript->link('insight.min', false);
  echo $javascript->link('jquery.xfade', false);
  echo $javascript->link('initializations-clients', false);
?>
<div class="ls-cmp-wrap ls-1st" id="w1336775876651">
<!--ls:begin[component-1336775876651]-->
<div class="iw_component" id="1336775876651">
  <div>
    <div>
      <div id="main-container">
        <div id="content-container" class="wrap group">
          
    
          <div class="content group">
            <p class="large-text"><?php echo __('Sponsors', true);?></p>
          </div>
          
          <div class="content-wide group">
            <?php foreach($sponsorTypes as $st):?>
            <h2><?php echo $st['SponsorType']['title']; ?></h2>
            <ul class="group testimonials">
              <?php foreach($st['Sponsors'] as $sponsor):?>
              <li>
                <a class="group" href="<?php echo $sponsor['EventSponsor']['url']; ?>">
                  <?php echo $this->Html->image("../files/".$sponsor['EventSponsor']['file_name'], array(
                    "width"=>"160",
                  ));?>
                  
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
            <?php endforeach; ?>
          </div>
        </div>
        <!--.wrap-->
      </div>
    </div>
  </div>
</div>
</div>