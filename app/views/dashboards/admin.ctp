
<h1>Dashoard</h1>
  <?php foreach ($items as $item => $contents): ?>
  
<table>
  <tr><th><?php echo $item; ?></th></tr>
  <?php foreach  ($contents as $title => $content): ?>
  <tr><td>
<?php
  echo $html->link($title, array('controller'=>$content, 'action'=>'index'));
?>
  </td></tr>
  <?php endforeach; ?>
</table>
  <?php endforeach; ?>
