<?php
/*
Template Name: QA Page
*/
?>
<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<!--BREADCUM END -->
<!--BODY PANEL START -->
<div class="maincontaner body_panel">


<?php $i=1;
if (have_posts()) : while (have_posts()) : the_post(); ?>
  <h2 class="heading"><?php the_title(); ?></h2>
  
  
  <div class="full_width">
  
  <?php the_content(); ?>
  	
  </div>
<?php
endwhile; else:
endif;
//Reset Query
wp_reset_query();
?> 
  
  
</div>

<?php get_footer(); ?>



