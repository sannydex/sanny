<?php get_header(); ?>
<div class="maincontaner body_panel">
<div id="tmpSlideshow">
           <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div style="display:block;" class="tmpSlide">
<?php if (function_exists('has_post_thumbnail') && has_post_thumbnail()) {?>
<img src="<?php echo thumb_url();?>"  alt="Slide"/>
<? }?>
      <div class="tmpSlideCopy">
        <p class="heading"><?php the_title(); ?></p>
     <?php echo apply_filters( 'woocommerce_short_description', $post->post_content ) ?>
	
    <?php $key=get_post_meta($post->ID, "_regular_price", true); 
	if($key!="")
	{
	 ?>
  <p class="price alignleft"><span>가격 : </span>$<?php echo $key; ?></p> 
 <? }?>

 <?php $key1=get_post_meta($post->ID, "_sku", true); 
	if($key1!="")
	{
	 ?>
  <p class="price alignleft" style="clear:both;"><span>SKU: </span><?php echo $key1; ?></p> 
 <? }?>

<?php $key2=get_post_meta($post->ID, "_sale_price", true); 
	if($key2!="")
	{
	 ?>
  <p class="price alignleft" style="clear:both;"><span>세일 프라이스: </span><?php echo $key2; ?></p> 
 <? }?>
<?php $key3=get_post_meta($post->ID, "_stock_status", true); 
	if($key3!="")
	{
	 ?>
  <p class="price alignleft" style="clear:both;"><span>재고 상태:</span><?php echo $key3; ?></p> 
 <? }?>

<?php $key4=get_post_meta($post->ID, "_backorders", true); 
	if($key4!="")
	{
	 ?>
  <p class="price alignleft" style="clear:both;"><span>백 오더:</span><?php echo $key4; ?></p> 
 <? }?>

<?php $key5=get_post_meta($post->ID, "_weight", true); 
	if($key5!="")
	{
	 ?>
  <p class="price alignleft" style="clear:both;"><span>무게 (kg):</span><?php echo $key5; ?></p> 
 <? }?>

<p class="form-field dimensions_field">
<label for="product_length">치수 (cm)</label>
<span class="wrap">
<?php $key6=get_post_meta($post->ID, "_length", true); 
	if($key6!="")
	{
	 ?>
 <?php echo $key6; ?>
 <? }?>

<?php $key7=get_post_meta($post->ID, "_width", true); 
	if($key7!="")
	{
	 ?>
 <?php echo $key7; ?>
 <? }?>

<?php $key8=get_post_meta($post->ID, "_height", true); 
	if($key8!="")
	{
	 ?>
 <?php echo $key8; ?>
 <? }?>
</span>
</p>

<div class="options_group">
<p class="form-field dimensions_field"><label for="product_shipping_class">선박 종류</label> 
<?php $key9=get_post_meta($post->ID, "product_shipping_class", true); 
	if($key9!="")
	{
	 ?>
 <?php echo $key9; ?>
 <? }?>
 <?php $key=get_post_meta($post->ID, "product_shipping_class", true);?> </p>
</div>
<a href="<?php echo esc_url( $product->add_to_cart_url() ); ?>&variation_id=262" class="rounded-rect-button add-to-cart">Add to Cart</a>
    </div>
    </div>
     <? $i++;			
			?>

  <?php 
 
endwhile; else:

endif;

//Reset Query
wp_reset_query();

?>     
 
   
        </div>
 
</div>

<?php get_footer(); ?>



