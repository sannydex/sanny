<?php get_header(); ?>

<?php include (TEMPLATEPATH . '/banner.php'); ?> 


<div class="maincontaner body_panel">
	<div class="left">
    	<div class="product_panel">
        
        <?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 6, 'orderby' => 'menu_order', 'order' => 'asc' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
 <?php $key=get_post_meta($post->ID, "_regular_price", true); ?>
        	<div class="<?php if($i==5) { ?>product nodevider<?php }elseif($i==6){?>product nodevider<?php }else{ ?>product<?php }?>">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
           <a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_url();?>"  width="69" height="101" alt="<?php the_title(); ?>" class="alignleft"/> </a>

<?php }?>
       	    	
            	<div class="info">
                	<h2><?php the_title(); ?></h2>
                    <?php
$content = substr( get_the_content(),0, 24) ;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;
?>

                    <p class="price alignleft"><?php echo $product->get_price_html(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="grey_more_short">구매하기</a>
                </div>
            </div>
            
           <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
           
            
            
        </div>
    </div>
    <div class="right">
    <div class="product_panel">
     <?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => 'book-of-the-month', 'orderby' => 'menu_order', 'order' => 'asc' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
    
        	<div class="product">
<?php $bom = get_option('revchurch_bom'); ?>
  <? if($bom!=""){?>
<h2><?php echo stripslashes($bom); ?></h2>
 <? }else {?>
<h2>이달의 책</h2>
  <? }?>
            	
                
                  <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                 <a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_url();?>"  width="55" height="81" alt="<?php the_title(); ?>" class="alignleft"/></a>
                  
                  <?php }?>
                
              	<div class="info">
                	
                	<p><?php the_title(); ?></p>

                 
                    <a href="<?php the_permalink(); ?>" class="more">더보기</a>
                </div>
        	</div>
             <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
            <?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 1, 'product_cat' => 'steady-seller', 'orderby' => 'menu_order', 'order' => 'asc' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
    
        	<div class="product nodevider">
<?php $bomm = get_option('revchurch_bomm'); ?>
  <? if($bomm!=""){?>
<h2><?php echo stripslashes($bomm); ?></h2>
 <? }else {?>
<h2>스테디셀러</h2>
  <? }?>
            	
                  <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
                  <img src="<?php echo thumb_url();?>"  width="55" height="81" alt="<?php the_title(); ?>" class="alignleft"/>
                  
                 
                  <?php }?>
              	<div class="info">
                	
                	<p><?php the_title(); ?></p>
                  	
                    <a href="<?php the_permalink(); ?>" class="more">더보기</a>
                </div>
        	</div>
             <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
            
      </div>
    </div>
</div>

<?php get_footer(); ?>
