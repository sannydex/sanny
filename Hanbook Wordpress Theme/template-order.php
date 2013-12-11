<?php
if ( !is_user_logged_in() ) {
$url = site_url().'/login';
wp_redirect( $url ,301 );
} 
/*
Template Name:post-order
*/
?>
<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<!--BREADCUM END -->
<!--BODY PANEL START -->
<div class="maincontaner body_panel">
  <h2 class="heading">주문판매 정보/문의 <span><a class="new-button" href="<?php bloginfo('url');?>/?p=381">Get Quote</a></span></h2>
  <?php if (is_user_logged_in()) {?>
  <div class="full_width woocommerce">
  	<table width="940" border="0" cellspacing="0" cellpadding="0" class="event_table">
  <tr>
    <th scope="col">
    	<table width="1000" border="0" cellspacing="0" cellpadding="0">

<?php $i=1;
if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php $orderno = get_post_meta($post->ID, "wpcf-order-no", true); ?>
<?php $catname = get_post_meta($post->ID, "wpcf-category-name", true); ?>
<?php $rhedaing = get_post_meta($post->ID, "wpcf-reply-heading", true); ?>
<?php $post2 = get_post_meta($post->ID, "wpcf-post-date", true); ?>
<?php $subject = get_post_meta($post->ID, "wpcf-subject", true); ?>
<?php $post = get_post_meta($post->ID, "wpcf-post", true); ?>


          <tr>          
            <td width="113" height="40" align="left" valign="middle"><?php echo stripslashes($orderno); ?></td>
            <td width="113" height="40" align="left" valign="middle"><?php echo stripslashes($catname); ?></td>
            <td width="313" height="40" align="left" valign="middle"><?php echo stripslashes($subject); ?></td>
            <td width="150" height="40" align="left" valign="middle" style="padding-left:50px;"><?php echo stripslashes($rhedaing); ?></td>
            <!--<td width="115" height="40" align="left" valign="middle"><?php //echo stripslashes($post); ?></td>-->
            <td class="aa" height="40" align="left" valign="middle"><?php //echo $post2; ?></td>
          </tr>
<?php 
endwhile; else:
endif;
//Reset Query
wp_reset_query();
?> 
        </table>
    </th>
  </tr>
  <tr>
    <td><table width="1000" border="0" cellspacing="0" cellpadding="0">
  
<?php


global $woocommerce;

$customer_id = get_current_user_id();

$args = array(
    'numberposts'     => $recent_orders,
    'meta_key'        => '_customer_user',
    'meta_value'	  => $customer_id,
    'post_type'       => 'shop_order',
    'post_status'     => 'publish'
);
$customer_orders = get_posts($args);

if ($customer_orders) :
?>
	

<?php //print_r($customer_orders); ?>


	

	<?php $count=1;
			foreach ($customer_orders as $customer_order) :
				$order = new WC_Order(); 
//print_r($customer_order);
				$order->populate( $customer_order );

				$status = get_term_by('slug', $order->status, 'shop_order_status');

				?>
	<tr> 
    <td class="aa" width="113" height="40" align="left" valign="middle"><a href="<?php echo esc_url( add_query_arg('order', $order->id, get_permalink(woocommerce_get_page_id('view_order'))) ); ?>"><?php echo $order->get_order_number(); ?></a></td>
    <td width="113" height="40" align="left" valign="middle"><?php $price = $order->get_formatted_order_total(); if($price=='$0'){ echo 'N/A'; } else { echo $price; }?> </td>
    <td width="313" height="40" align="left" valign="middle"><?php
	if (sizeof($order->get_items())>0) :
	foreach($order->get_items() as $item) :
	if (isset($item['variation_id']) && $item['variation_id'] > 0) :
	$_product = new WC_Product_Variation( $item['variation_id'] );
				else :
					$_product = new WC_Product( $item['id'] );
				endif;

				echo '

						';

			echo '<a href="'.esc_url( add_query_arg('order', $order->id, get_permalink(woocommerce_get_page_id('view_order'))) ).'">' . $item['name'] . '</a>';

				$item_meta = new WC_Order_Item_Meta( $item['item_meta'] );
				$item_meta->display();

				if ( $_product->exists() && $_product->is_downloadable() && $_product->has_file() && ( $order->status=='completed' || ( get_option( 'woocommerce_downloads_grant_access_after_payment' ) == 'yes' && $order->status == 'processing' ) ) ) :

					echo '<small><a href="' . $order->get_downloadable_file_url( $item['id'], $item['variation_id'] ) . '">' . __('Download file &rarr;', 'woocommerce') . '</a></small>';

				endif;

				// Show any purchase notes
				if ($order->status=='completed' || $order->status=='processing') :
					if ($purchase_note = get_post_meta( $_product->id, '_purchase_note', true)) :
						echo '' . apply_filters('the_content', $purchase_note) . '';
					endif;
				endif;  
			endforeach;
		endif;

		do_action( 'woocommerce_order_items_table', $order );
		?></td>
     <td width="150" height="40" align="left" valign="middle" style="padding-left:50px ;"><?php echo ucfirst( __( $status->name, 'woocommerce' ) ); ?>
						<?php if (in_array($order->status, array('pending', 'failed'))) : ?>
							<a href="<?php echo esc_url( $order->get_cancel_order_url() ); ?>" class="cancel" title="<?php _e('Click to cancel this order', 'woocommerce'); ?>">(<?php _e('Cancel', 'woocommerce'); ?>)</a>
						<?php endif; ?></td>
    <!--<td width="115" height="40" align="left" valign="middle"><?php //the_author(); ?></td>-->
    <td height="40" text-align="right" style="text-align: right;">

<?php 
/*
echo $price.'======='.$price = strcmp($price,'$0');
if($price == 0){
echo 'Price is 0'.$price;
}else { 
echo 'Price is 1'.$price;
}
*/

 //echo date_i18n(get_option('date_format'), strtotime($order->order_date)); 
 
 							$actions = array();

							if ( in_array( $order->status, apply_filters( 'woocommerce_valid_order_statuses_for_payment', array( 'pending', 'failed' ), $order ) ) )
								$actions['pay'] = array(
									'url'  => $order->get_checkout_payment_url(),
									'name' => __( 'Pay', 'woocommerce' )
								);

							if ( in_array( $order->status, apply_filters( 'woocommerce_valid_order_statuses_for_cancel', array( 'pending', 'failed' ), $order ) ) )
								$actions['cancel'] = array(
									'url'  => $order->get_cancel_order_url(),
									'name' => __( 'Cancel', 'woocommerce' )
								);

							$actions['view'] = array(
								'url'  => add_query_arg( 'order', $order->id, get_permalink( woocommerce_get_page_id( 'view_order' ) ) ),
								'name' => __( 'View', 'woocommerce' )
							);

							$actions = apply_filters( 'woocommerce_my_account_my_orders_actions', $actions, $order );

							foreach( $actions as $key => $action ) {
								$addC='';if($key == 'pay') { $addC = 'new-button'; } else { $addC = 'view-button'; }
								echo '<a href="' . esc_url( $action['url'] ) . '" class="'.$addCXX.' button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
							}
						 
 
?>
</td></tr>
<?php $count++; endforeach; ?>

	
<?php
else :
?>

<?php
endif;
?>



   
</table>
</td>
  </tr>
</table>

  </div>
<ul class="pagination">
      <li><?php next_posts_link('최근',$max_num_pages) ?></li>
      <li><?php previous_posts_link('이전',$max_num_pages) ?></li>
</ul>

 <?php }?>
</div>
<?php get_footer();?> 