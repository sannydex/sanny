<?php
/*
Template Name:Other
*/
?>
<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<!--BREADCUM END -->
<!--BODY PANEL START -->
<div class="maincontaner body_panel">	
	<div class="left">
    	<h2 class="heading"><?php the_title(); ?></h2>
    	<div class="product_panel">
         <?php $i=1;
global $wpdb;
global $WP_Query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; 

$querystr = "SELECT $wpdb->posts.* FROM $wpdb->posts WHERE $wpdb->posts.post_status = 'publish' AND $wpdb->posts.post_type = 'product' ";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$counts = 0;

if ($pageposts): foreach ($pageposts as $post): setup_postdata($post); $counts++; add_post_meta($post->ID, 'incr_number', $counts, true); update_post_meta($post->ID, 'incr_number', $counts); endforeach; endif; 





$wp_query=new WP_Query('post_type=product&product_cat=other&orderby=desc&showposts=12&paged='.$paged);
//echo $wp_query->request;
if ($wp_query->found_posts) : while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
        
        
        
        	
 <?php $key=get_post_meta($post->ID, "_regular_price", true); ?>
        	<div class="<?php if($i==11) { ?>product nodevider<?php }elseif($i==12){?>product nodevider<?php }else{ ?>product<?php }?>">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
            <a href="<?php the_permalink(); ?>"> <img src="<?php echo thumb_url();?>"  width="69" height="101" alt="pic" class="alignleft"/></a>

<?php }?>
       	    	
            	<div class="info">
                	<h2><?php the_title(); ?></h2>
                   <?php
$content = substr( get_the_content(),0, 24) ;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;
?> 

 <?php $buy = get_option('revchurch_buy'); ?>
                    <p class="price alignleft"><?php echo $product->get_price_html(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="grey_more_short"><?php echo stripslashes($buy); ?></a>
                </div>
            </div>
            
           <?php $i++;
endwhile; else:
endif;
$max_num_pages=$wp_query->max_num_pages;
//Reset Query
wp_reset_query();
?> 
          
          
         
            
        </div>
         <ul class="pagination">
      <li><?php next_posts_link('최근',$max_num_pages) ?></li>
      <li><?php previous_posts_link('이전',$max_num_pages) ?></li>
</ul>
    </div>
    <div class="right">
    <div class="product_panel">
    <?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 2, 'product_cat' => 'other', 'orderby' => 'desc' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
 <?php $key=get_post_meta($post->ID, "_regular_price", true); ?>
        	<div class="<?php if($i==3) { ?>product nodevider<?php }else{ ?>product<?php }?>">
            	<?php if($i==1) { ?><h2>이달의 책</h2><?php }?>
                 <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
   	    		
                
                  <a href="<?php the_permalink(); ?>"> <img src="<?php echo thumb_url();?>"  width="55" height="81" alt="pic" class="alignleft"/></a>
                  
                  <?php }?>
                  <?php $more = get_option('revchurch_more'); ?>
              	<div class="info">
                	
                	<p><?php the_title(); ?></p>
                  
                    <a href="<?php the_permalink(); ?>" class="more"><?php echo stripslashes($more); ?></a>
                </div>
        	</div>
            
            <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
            
            
      </div>
    </div>
</div>

<?php get_footer(); ?>



