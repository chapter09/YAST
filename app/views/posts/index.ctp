<!-- File: /app/View/Posts/index.ctp -->
<h1><?php __('Blog posts'); ?></h1>
<p><?php echo $html->link("Add Post","/posts/add");?>
 
 
<!-- Here is where we loop through our $posts array, printing out post info -->
<table>
    <?php 

  echo $html->tableHeaders(array_keys($posts[0]['Post']));

  foreach ($posts as $post)
  {
    echo $html->tableCells($post['Post']);
    echo $html->link('Edit','/posts/edit/'.$post['Post']['id']);
  };
    ?>
</table>
