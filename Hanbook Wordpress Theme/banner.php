<div class="maincontaner slider">
	<div id="tmpSlideshow">
           <?php $i=1;
        $args = array( 'post_type' => 'product', 'product_cat' => 'slider', 'orderby' => 'desc' );
        $loop = new WP_Query( $args );
        while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
       <?php $author_name=get_post_meta($post->ID, "wpcf-author-name", true); ?>
        <?php $banner_text=get_post_meta($post->ID, "wpcf-banner-text", true); ?>
    <div style="display: <? if($i==1) { ?>block<? } else {?>none<? }?>;" id="tmpSlide-<? echo $i;?>" class="tmpSlide">
<?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
 <a href="<?php the_permalink(); ?>"><img src="<?php echo thumb_url();?>"  alt="Product Image" width="234" height="323"/></a>
<? }?>
      <div class="tmpSlideCopy">
        <p class="heading"> <a href="<?php the_permalink(); ?>" ><?php the_title(); ?> <?php if($author_name!=""){?>_ <?php echo stripslashes($author_name); ?> <? }?></a></p>
     <?php if($banner_text!=""){?> <p class="botmar25"> <?php echo stripslashes($banner_text); ?></p><?php }?>
    <?php $key=get_post_meta($post->ID, "_sale_price", true); 
	if($key!="")
	{
	 ?>
  <p class="price alignleft"><span>가격 : </span><?php echo $product->get_price_html(); ?></p> 
 <? }?><?php $more = get_option('revchurch_more'); ?>
       <a href="<?php the_permalink(); ?>" class="read_more"><?php echo stripslashes($more); ?></a>
      </div>
    </div>
     <?php $i++;			
			?>

   <?php endwhile; ?>
    <?php wp_reset_query(); ?>
 
   
        </div>
</div>



