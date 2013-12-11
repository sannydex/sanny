<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<div class="maincontaner body_panel">
	 <?php 
if (have_posts()) : while (have_posts()) : the_post(); ?>
 <h2 class="heading"><?php the_title(); ?></h2>
      <?php the_content(''); ?>
     <?php if (is_single()){?>
      <?php comments_template(); ?>  

<?php }?>
<?php 
endwhile; else:

endif;
?>

</div>

<?php get_footer(); ?>



