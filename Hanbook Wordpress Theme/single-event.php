<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<!--BREADCUM END -->
<!--BODY PANEL START -->
<div class="maincontaner body_panel">


<?php $i=1;
if (have_posts()) : while (have_posts()) : the_post(); ?>
  <h2 class="heading"><?php the_title(); ?></h2>
  
  <?php $author = get_option('revchurch_author'); ?>
   <?php $pdate = get_option('revchurch_pdate'); ?>
 <div class="inncon"> <strong><?php echo stripslashes($author); ?></strong>  <?php the_author(); ?> &nbsp;&nbsp;&nbsp;&nbsp;
       <strong><?php echo stripslashes($pdate); ?></strong>  <?php the_time('M j, Y') ?></div>
       
           
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



