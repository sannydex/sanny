
<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<!--BREADCUM END -->
<!--BODY PANEL START -->
<div class="maincontaner body_panel">	
	<div class="left">
    	<h2 class="heading"><?php the_title(); ?></h2>
    	<div class="product_panel">
        
        
        
        
        	<?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 8, 'orderby' => 'desc' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
 <?php $key=get_post_meta($post->ID, "_regular_price", true); ?>
        	<div class="product">
            <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
            <a href="<?php the_permalink(); ?>"> <img src="<?php echo thumb_url();?>"  alt="Slide" width="69" height="101" alt="pic" class="alignleft"/></a>

<?php }?>
       	    	
            	<div class="info">
                	<h2><?php the_title(); ?></h2>
                    <p><?php
$content = substr( get_the_content(),0, 24) ;
$content = apply_filters('the_content', $content);
$content = str_replace(']]>', ']]>', $content);
echo $content;
?> by <?php the_time('D, M d') ?></p>
 <?php $buy = get_option('revchurch_buy'); ?>
                    <p class="price alignleft"><?php echo $product->get_price_html(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="grey_more_short"><?php echo stripslashes($buy); ?></a>
                </div>
            </div>
            
           <?php $i++; endwhile; ?>
    <?php wp_reset_query(); ?>
          
          
         
            
        </div>
       
       <?php /*?><ul class="pagination">
        	<li><a href="#">??</a></li>
            <li><a href="#">??</a></li>
        </ul> <?php */?>
    </div>
    <div class="right">
    <div class="product_panel">
    <?php $i=1;
        $args = array( 'post_type' => 'product', 'posts_per_page' => 3,  'orderby' => 'desc' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
 <?php $key=get_post_meta($post->ID, "_regular_price", true); ?>
        	<div class="<?php if($i==3) { ?>product nodevider<?php }else{ ?>product<?php }?>">
            	<?php if($i==1) { ?><h2><?php wp_title(''); ?></h2><?php }?>
                 <?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
   	    		
                
                 <a href="<?php the_permalink(); ?>">  <img src="<?php echo thumb_url();?>"  alt="Slide" width="55" height="81" alt="pic" class="alignleft"/></a>
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



