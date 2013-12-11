<?php
/*
Template Name:Checkout
*/
?>
<?php include (TEMPLATEPATH . '/header-checkout.php'); ?> 

<div class="maincontaner body_panel">
	 <?php 
if (have_posts()) : while (have_posts()) : the_post(); ?>
   <h1> <?php the_title(); ?></h1>
      <?php the_content(''); ?>
<?php 
endwhile; else:

endif;
?>

</div>

<?php get_footer(); ?>



