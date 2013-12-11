<?php
/*
Template Name: Event Page
*/
?>
<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<!--BREADCUM END -->
<!--BODY PANEL START -->
<div class="maincontaner body_panel">
  <h2 class="heading"> <?php the_title(); ?></h2>
  <div class="full_width">
  	<table width="940" border="0" cellspacing="0" cellpadding="0" class="event_table">
  <tr>
    <th scope="col">
    	<table width="940" border="0" cellspacing="0" cellpadding="0">

<?php $i=1;
if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $post2 = get_post_meta($post->ID, "wpcf-post-date", true); ?>
<?php $subject = get_post_meta($post->ID, "wpcf-subject", true); ?>
<?php $post = get_post_meta($post->ID, "wpcf-post", true); ?>
          <tr>
            <td width="654" height="40" align="center" valign="middle"><?php echo stripslashes($subject); ?></td>
            <td width="150" height="40" align="left" valign="middle"><?php echo stripslashes($post); ?></td>
            <td height="40" align="left" valign="middle"><?php echo $post2; ?></td>
          </tr>
<?php 
endwhile; else:
endif;
//Reset Query
wp_reset_query();
?> 
        </table>
    </th>
  </tr>
  <tr>
    <td><table width="940" border="0" cellspacing="0" cellpadding="0">
  
<?php $i=1;
global $wpdb;
global $WP_Query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 

$querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'event' ";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$counts = 0;

if ($pageposts): foreach ($pageposts as $post): setup_postdata($post); $counts++; add_post_meta($post->ID, 'incr_number', $counts, true); update_post_meta($post->ID, 'incr_number', $counts); endforeach; endif; 





$wp_query=new WP_Query('post_type=event&order=desc&showposts=2&paged='.$paged);
//echo $wp_query->request;
if ($wp_query->found_posts) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
  <tr>
    <td width="50" height="40" align="left" valign="middle"><?php echo get_post_meta(get_the_ID(),'incr_number',true); ?></td>
    <td width="605" height="40" align="left" valign="middle"><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></td>
    <td width="150" height="40" align="left" valign="middle"><?php the_author(); ?></td>
    <td height="40"><?php the_time('M j, Y') ?></td>
  </tr>
   <?php $i++;
endwhile; else:
endif;
$max_num_pages=$wp_query->max_num_pages;
//Reset Query
wp_reset_query();
?> 
   
</table>
</td>
  </tr>
</table>

  </div>
<ul class="pagination">
<li><?php previous_posts_link('최근',$max_num_pages) ?></li>
      <li><?php next_posts_link('이전',$max_num_pages) ?></li>
      
</ul>
</div>
<?php get_footer(); ?>



