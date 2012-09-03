<?php
  echo $this->Html->css('events', null, array("media"=>"all", 'inline'=>false));
  
?>
<div class="ls-cmp-wrap ls-1st" id="w1336775876651">
<!--ls:begin[component-1336775876651]-->
<div class="iw_component" id="1336775876651">
  <div>
    <div>
      <div id="main-container">
        <div id="content-container" class="wrap group">
          
          
          <div class="content group">
           <table class="events">
             <tr>
               <th>Logo</th>
               <th><?php echo __('Name',true);?></th>
               <th><?php echo __('Date',true);?></th>
               <th><?php echo __('Place',true);?></th>
             </tr>
             <?php $count = 0;?>
             <?php foreach($events as $e):?>
               <tr"<?php echo ($count++ %2 ==0)?' class="altrow"':'';?>">
                 <td><?php echo $this->Html->image('/files/'.$e['Event']['file_name']);?></td>
                 <td><?php echo $e['Event']['title'];?></td>
                 <td><?php echo $e['Event']['date'];?></td>
                 <td><?php echo $e['Event']['place'];?></td>
                </tr>
             <?php endforeach;?>
           </table>
          </div>
          
        </div>
        <!--.wrap-->
      </div>
    </div>
  </div>
</div>
</div>
