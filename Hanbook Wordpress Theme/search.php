<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<!--BREADCUM END -->
<!--BODY PANEL START -->
<div class="maincontaner body_panel 21 search-results">

<style>
.search-results .product {
  border-bottom: 1px solid #E1E1E1;
  float: left;
  margin-bottom: 40px;
  padding-bottom: 20px;
  width: 100%;
}

.search-results .alignleft {
  margin-right: 20px;
}
</style>
<?php wp_reset_query();
 global $WP_Query, $wpdb, $s; 
$s =  $_REQUEST["s"]; 

function filter_wherea($where) {
		global $s;
		$where .= " OR wp_posts.ID IN (select distinct(post_id) from wp_postmeta where meta_key='wpcf-author-name' AND meta_value LIKE '%$s%' OR meta_value LIKE '$s%')";
		return $where;
} 
$arg = array(
'post_type' => 'product',
's' => $s,
);
add_filter( 'posts_where', 'filter_wherea' );
$query = new WP_Query($arg);  $i=1;
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
  
<?php $key=get_post_meta($post->ID, "_sale_price", true); ?>
 <?php $show_post = get_post_meta($post->ID, "wpcf-show-on-home-page", true); ?>
   <?php $author_name=get_post_meta($post->ID, "wpcf-author-name", true); ?>
        	<div class="<?php if($i==5) { ?>product nodevider<?php }elseif($i==6){?>product nodevider<?php }else{ ?>product<?php }?>">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
           <a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_url();?>"  width="69" height="101" alt="<?php the_title(); ?>" class="alignleft"/> </a>

<?php }?>
       	    	
            	<div class="info">
                	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php if($author_name!=""){?>_ <?php echo stripslashes($author_name); ?> <? }?></a></h2>
                    <?php /*?><?php
$content = substr( get_the_content(),0, 24) ;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;
?><?php */?><?php $more = get_option('revchurch_more'); ?>

                    <p class="price alignleft"><?php echo $product->get_price_html(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="grey_more_short"><?php echo stripslashes($more); ?></a>
                </div>
            </div>
<?php
endwhile; remove_filter( 'posts_where', 'filter_wherea' );  else : ?>
<p>Nothing found with your keyword</p>
<?php 
endif;
//Reset Query
wp_reset_query();
?> 
  
  
</div>

<?php get_footer(); ?>