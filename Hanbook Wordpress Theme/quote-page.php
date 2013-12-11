<?php
if($_POST){
extract($_POST);

if(isset($_POST['new_quoted'])) {
	
	
function set_html_content_type() {
	return 'text/html';
}
add_filter( 'wp_mail_content_type', 'set_html_content_type' );

$multiple_to_recipients = array('sanny@dexusa.com',get_option('admin_email'));

$coupon = array(    
	'post_type' 	=> 'shop_order',
	'post_title' 	=> sprintf( __( 'Order &ndash; %s', 'woocommerce' ), strftime( _x( '%b %d, %Y @ %I:%M %p', 'Order date parsed by strftime', 'woocommerce' ) ) ),
    'post_content' => $book_description,
    'post_status' => 'publish',
	'ping_status'	=> 'closed',
	'post_author' 	=> 1,
    'post_type'     => 'shop_order'
); 

$new_coupon_id = wp_insert_post( $coupon );

wp_set_object_terms( $new_coupon_id, 'waiting for approval', 'shop_order_status' );
$item_id = woocommerce_add_order_item( $new_coupon_id, array('order_item_name' => $book_name,'order_item_type' => 'line_item') );

update_post_meta( $new_coupon_id, '_customer_user', $user_id);
update_post_meta( $new_coupon_id, '_quoted_product', 'no link');
update_post_meta( $new_coupon_id, '_custom_order', 'true');
// Add line item meta
if ( $item_id ) {
woocommerce_add_order_item_meta( $item_id, '_qty', apply_filters( 'woocommerce_stock_amount', $quantity ) );
}



# Hook the details to a Custom tables
global $wpdb;
$wpdb->insert( 
	'custom_orders', 
	array( 
		'order_id' => $new_coupon_id, 
		'order_name' => $book_name,
		'order_description' => $book_description, 
		'order_quantity' => $quantity,
		'order_total' => 'Not Set',
		'order_status' => 'waiting for approval', 
		'customer_id' => $user_id 				
	)
);






# Email Content Setup

$order_url = site_url().'/wp-admin/post.php?post='.$new_coupon_id.'&action=edit';
$newproduct_url = site_url().'/wp-admin/post-new.php?post_type=product';
$subject = 'New Order Quote By '.$user_name;
$message = "<div style='color: rgb(102, 102, 102);line-height: 20px;'>
<p>Greetings,<br/></p>
<p>A Customer registered as $user_name ($user_mail) have sent a new quote request, find details below:<br/></p>
<p><strong> Name:</strong> $book_name <br/> 
<strong>Quantity:</strong> $quantity <br/> 
<strong>Description:</strong> $book_description<br/><br/>
If you want to approve this Quote, you'll need to create a new product regarding this quote. Please navigate to the link below to create new product.</P>
<div style='clear: both;margin: 10px 0;width: 100%;float: left;'><a style='text-align: center;text-transform: none;text-decoration: none;background: #7C0046;color: #fff;padding: 5px 10px;margin: auto; border-radius: 5px;' href='$newproduct_url'>Create New Product</a></div>
<p>If you want to approve or cancel this request, please visit the below link. (Steps are clearly defined in the Manual DOC.)<br/>
Here is the order link <div style='clear: both;margin: 10px 0;width: 100%;text-align: left;float;left;'><a style='text-align: center;text-transform: none;text-decoration: none;background: #7C0046;color: #fff;padding: 5px 10px;margin: auto; border-radius: 5px;' href='$order_url'>Approve this order</a></div>
</div><br/>
Thanks</p>";
wp_mail( $multiple_to_recipients,$subject,$message);
remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
$url = site_url().'/order-sales';
wp_redirect( $url ,301 );
}


}
/*
Template Name: Quote Page
*/
?>
<?php get_header(); ?>
<?php include (TEMPLATEPATH . '/breadcum.php'); ?> 
<!--BREADCUM END -->
<!--BODY PANEL START -->
<div class="maincontaner body_panel">
  <h2 class="heading">Get a Quote</h2>
  <div class="full_width">
  	
    <form action="" method="post">
    <input type="hidden" name="user_mail" value="<?php $user_ID = get_current_user_id(); $curr_user = get_userdata($user_ID); echo $curr_user->user_email;?>" />
    <input type="hidden" name="user_id" value="<?php echo $user_ID = get_current_user_id(); ?>" />
     <input type="hidden" name="user_name" value="<?php echo $curr_user->user_nicename;?>" />
     	<div class="block title">
        	<label>Book Title</label>
            <input type="text" name="book_name" />
        </div>
        <div class="block quantites">
        	<label>Quantity</label>
            <input type="text" name="quantity" />
        </div>        
        <div class="block clear description">
        	<label>Description</label>
            <textarea name="book_description"></textarea>
        </div>
        <div class="clear"></div>
        <input class="send-button" name="new_quoted" type="submit" value="Submit Quote" />
	</form>
  </div>
  
</div>
<?php get_footer();?> 


