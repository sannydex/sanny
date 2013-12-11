<?php
/*
Template Name:Home
*/
?>
<?php get_header(); ?>

<?php include (TEMPLATEPATH . '/banner.php'); ?> 


<div class="maincontaner body_panel">
	<div class="left">
    	<div class="product_panel">
        
        <?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'asc','meta_key' => 'wpcf-show-on-home-page', 'meta_value' => '1' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
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
            
           <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
           
            
            
        </div>
    </div>
    <div class="right">
    <div class="product_panel">
     <?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => 'book-of-the-month', 'orderby' => 'menu_order', 'order' => 'asc', 'meta_key' => 'wpcf-show-on-home-rightbar', 'meta_value' => '1' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
     <?php $show_post = get_post_meta($post->ID, "wpcf-show-on-home-page", true); ?>
     <?php $author_name=get_post_meta($post->ID, "wpcf-author-name", true); ?>
        	<div class="product">
<?php $bom = get_option('revchurch_bom'); ?>
  <? if($bom!=""){?>
<h2><?php echo stripslashes($bom); ?></h2>
 <? } else { ?>
<h2>이달의 책</h2>
  <? }?>
            	
                
                  <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                 <a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_url();?>"  width="55" height="81" alt="<?php the_title(); ?>" class="alignleft"/></a>
                  
                  <?php }?>
                
              	<div class="info">
                	
                	<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <?php if($author_name!=""){?>_ <?php echo stripslashes($author_name); ?> <? }?></p>
			    <p class="price alignleft" style="width:100%;"><span class="amount">$<?php echo get_post_meta($post->ID, "_sale_price", true); ?></span></p>
               <?php $more = get_option('revchurch_more'); ?>
                    <a href="<?php the_permalink(); ?>" class="more"><?php echo stripslashes($more); ?></a>
                </div>
        	</div>
             <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
            <?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => 'steady-seller', 'orderby' => 'menu_order', 'order' => 'asc', 'meta_key' => 'wpcf-show-on-home-rightbar', 'meta_value' => '1' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
     <?php $show_post = get_post_meta($post->ID, "wpcf-show-on-home-page", true); ?>
     <?php $author_name=get_post_meta($post->ID, "wpcf-author-name", true); ?>
        	<div class="product nodevider">
<?php $bomm = get_option('revchurch_bomm'); ?>
  <? if($bomm!=""){?>
<h2><?php echo stripslashes($bomm); ?></h2>
 <? }else {?>
<h2>스테디셀러</h2>
  <? }?>
            	
                  <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                 <a href="<?php the_permalink(); ?>"> <img src="<?php echo thumb_url();?>"  width="55" height="81" alt="<?php the_title(); ?>" class="alignleft"/>
                  
                 </a>
                  <?php }?>
              	<div class="info">
                	
                <p><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php if($author_name!=""){?>_ <?php echo stripslashes($author_name); ?> <? }?></a></p>
                 <p class="price alignleft" style="width:100%;"><span class="amount">$<?php echo get_post_meta($post->ID, "_sale_price", true); ?></span></p>
				 <?php $more = get_option('revchurch_more'); ?>
                    <a href="<?php the_permalink(); ?>" class="more"><?php echo stripslashes($more); ?></a>
                </div>
        	</div>
             <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
            
      </div>
    </div>
</div>

<?php get_footer(); ?>