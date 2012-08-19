
<h1>Dashoard</h1>
<table>
  <tr><th>Items</th></tr>
  <?php foreach  ($items as $title => $item): ?>
  <tr><td>
<?php
  echo $html->link($title, array('controller'=>$item, 'action'=>'index'));
?>
  </td></tr>
  <?php endforeach; ?>
</table>
