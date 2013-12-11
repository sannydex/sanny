<?php

function my_project_updated_send_email( $post_id ) {

$slug = 'shop_order';
if ( $slug != $_POST['post_type'] ) {
return;
}
function set_html_content_type() {
	return 'text/html';
}
add_filter( 'wp_mail_content_type', 'set_html_content_type' );
extract($_POST);

$user = get_userdata($_POST['customer_user']); 
foreach ($_POST['order_item_qty'] as $field=>$value) { $quantity = $value; }

$order = new WC_Order( $ID );
$items = $order->get_items();
foreach ( $items as $item ) {
    $product_name = $item['name'];
    $product_id = $item['product_id'];
    $product_variation_id = $item['variation_id'];
}

$subject = 'Order Status Changed for #'.$ID;
$to = $user->user_email;
$book_description = get_the_content($product_id); 
$order_page = site_url().'/order-sales';

$message = "<div style='color: rgb(102, 102, 102);line-height: 20px;'>
<p>Greetings,<br/>
Your Order status has been changed by Admin, please check below about the status:<br/></p>
<strong> Order ID:</strong> $ID <br/> 
<strong> Name:</strong> $product_name <br/> 
<strong>Quantity:</strong> $quantity <br/> 
<strong>Status:</strong> $order_status<br/>
<strong>Total Amount:</strong> $_order_total <br/>
Have a visit to Order Sales page for more details.
<div style='clear: both;margin: 10px 0;width: 100%;float: left;'><a style='text-align: center;text-transform: none;text-decoration: none;background: #7C0046;color: #fff;padding: 5px 10px;margin: auto; border-radius: 5px;' href='$order_page'>Visit Order Sales Page</a></div>
<p>Thanks</p>";

wp_mail( $to, $subject, $message );
remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
}
add_action( 'save_post', 'my_project_updated_send_email' );



add_filter('excerpt_length', 'my_excerpt_length');
function my_excerpt_length($length) {
return 40; }
//remove_filter('the_content', 'wpautop');
if ( function_exists( 'add_image_size' ) ) add_theme_support( 'post-thumbnails' );
if ( function_exists( 'add_image_size' ) ) {
add_image_size( 'post-thumb', 700, 270 );
add_image_size( 'home-thumb', 203, 203, true );
}
function thumb_url(){
global $post;

$thumb_src= wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), array( 2100,2100 ));
return $thumb_src[0];
}
if ( function_exists('register_sidebars') )
register_sidebar( array (
'name'=>'Footer Widget',
'before_widget'=>'<div class="ftextbox">',
'after_widget'=> '</div>',
'before_title'=>'<h2>',
'after_title'=>'</h2>'
));


$themename = "Hanbook";
$shortname = "revchurch";

$categories = get_categories('hide_empty=0&orderby=name');
$wp_cats = array();
foreach ($categories as $category_list ) {
       $wp_cats[$category_list->cat_ID] = $category_list->cat_name;
}
array_unshift($wp_cats, "Choose a category"); 

$options = array (
 
array( "name" => $themename." Options",

	"type" => "title"),

array( "name" => "General",

	"type" => "section"),

array( "type" => "open"),

 
array(	"name" => "Header Logo",

						"std" => "",

			    		"id" => $shortname."_logo",

			    		"desc" => "Header Logo",

			    		"type" => "text"),

array(	"name" => "Search Input Text",

						"std" => "",

			    		"id" => $shortname."_stxt",

			    		"desc" => "Text for search input box",

			    		"type" => "text"),
array(	"name" => "More",

						"std" => "",

			    		"id" => $shortname."_more",

			    		"desc" => "Text For Sidebar More",

			    		"type" => "text"),

array(	"name" => "Buy",

						"std" => "",

			    		"id" => $shortname."_buy",

			    		"desc" => "Text For buy Button",

			    		"type" => "text"),

array(	"name" => "Author",

						"std" => "",

			    		"id" => $shortname."_author",

			    		"desc" => "Text for Author",

			    		"type" => "text"),
array(	"name" => "Post Date",

						"std" => "",

			    		"id" => $shortname."_pdate",

			    		"desc" => "Text for Post date",

			    		"type" => "text"),
array(	"name" => "Top Menu1",

						"std" => "",

			    		"id" => $shortname."_tmenu1",

			    		"desc" => "Text Top Menu1",

			    		"type" => "text"),
array(	"name" => "Top Menu2",

						"std" => "",

			    		"id" => $shortname."_tmenu2",

			    		"desc" => "Text Top Menu2",

			    		"type" => "text"),
array(	"name" => "Top Menu3",

						"std" => "",

			    		"id" => $shortname."_tmenu3",

			    		"desc" => "Text Top Menu3",

			    		"type" => "text"),
array(	"name" => "Cart Page Product Heading",

						"std" => "",

			    		"id" => $shortname."_cpheading",

			    		"desc" => "Cart Page Product Heading",

			    		"type" => "text"),
array(	"name" => "Cart Page Cart Subtotal Heading",

						"std" => "",

			    		"id" => $shortname."_csubheading",

			    		"desc" => "Cart Page Cart Subtotal Heading",

			    		"type" => "text"),
array(	"name" => "Heading for lost password page",

						"std" => "",

			    		"id" => $shortname."_mheading",

			    		"desc" => "Heading for lost password page",

			    		"type" => "text"),
array(	"name" => "Text for lost password page",

						"std" => "",

			    		"id" => $shortname."_lost_password",

			    		"desc" => "Text for lost password page",

			    		"type" => "textarea"),
array(	"name" => "Login Heading For Checkout page",

						"std" => "",

			    		"id" => $shortname."_log_heading",

			    		"desc" => "Login Heading For Checkout page",

			    		"type" => "text"),
array(	"name" => "Coupan text For checkout page",

						"std" => "",

			    		"id" => $shortname."_coupan_text",

			    		"desc" => "Coupan text For checkout page",

			    		"type" => "text"),
array(	"name" => "Heading For Billing Address",

						"std" => "",

			    		"id" => $shortname."_bil_addrs",

			    		"desc" => "Heading For Billing Address",

			    		"type" => "text"),
array(	"name" => "Heading For Shipping Address",

						"std" => "",

			    		"id" => $shortname."_ship_addrs",

			    		"desc" => "Heading For Shipping Address",

			    		"type" => "text"),
array(	"name" => "Breadcrumb Text",

						"std" => "",

			    		"id" => $shortname."_brdtxt",

			    		"desc" => "Breadcrumb Text",

			    		"type" => "text"),
						
												
array( "type" => "close"),

/*array( "name" => "Contact Page Right Panel Settings",

	"type" => "section"),

array( "type" => "open"),

 
array(	"name" => "Quote Text Box",

						"std" => "",

			    		"id" => $shortname."_qtxbox",

			    		"desc" => "Quote Text Box",

			    		"type" => "textarea"),	
						
					array(	"name" => "Quote Click Button Hyperlink ",

						"std" => "",

			    		"id" => $shortname."_btqtxbox",

			    		"desc" => "Quote Click Button Hyperlink",

			    		"type" => "text"),	
						
					array(	"name" => "Survey Image Box",

						"std" => "",

			    		"id" => $shortname."_surimg",

			    		"desc" => "Survey Image Box",

			    		"type" => "text"),			
						
					array(	"name" => "Survey Image Box Hyperlink ",

						"std" => "",

			    		"id" => $shortname."_hysurimg",

			    		"desc" => "Survey Image Box Hyperlink",

			    		"type" => "text"),	
						
						array(	"name" => "Survey Box Small Text ",

						"std" => "",

			    		"id" => $shortname."_textp",

			    		"desc" => "Survey Box Small Text",

			    		"type" => "textarea"),			
						
												
array( "type" => "close"),*/

array( "name" => "Home Page Right Sidebar Heading",

	"type" => "section"),

array( "type" => "open"),

						array(	"name" => "Heading Settings",

						"type" => "heading"),

							

						array(	"name" => "Heading1",

						"std" => "",

			    		"id" => $shortname."_bom",

			    		"desc" => "Book of the Month ",

			    		"type" => "text"),

						array(	"name" => "Heading2",

						"std" => "",

			    		"id" => $shortname."_bomm",

			    		"desc" => "Basic",

			    		"type" => "text"),

						array(	"name" => "Heading3",

						"std" => "",

			    		"id" => $shortname."_bommm",

			    		"desc" => "Other",

			    		"type" => "text"),

array( "type" => "close"),

array( "name" => "Footer",

	"type" => "section"),

array( "type" => "open"),

						array(	"name" => "Footer Settings",

						"type" => "heading"),

							

						array(	"name" => "Footer Left Text",

						"std" => "",

			    		"id" => $shortname."_fltext",

			    		"desc" => "Footer Left Text ",

			    		"type" => "textarea"),

array( "type" => "close")

 

);

function mytheme_add_admin() {
 
global $themename, $shortname, $options;
 
if ( $_GET['page'] == basename(__FILE__) ) {
 
	if ( 'save' == $_REQUEST['action'] ) {
 
		foreach ($options as $value) {
		update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
foreach ($options as $value) {
	if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }
 
	header("Location: admin.php?page=functions.php&saved=true");
die;
 
} 
else if( 'reset' == $_REQUEST['action'] ) {
 
	foreach ($options as $value) {
		delete_option( $value['id'] ); }
 
	header("Location: admin.php?page=functions.php&reset=true");
die;
 
}
}
 
add_menu_page($themename, $themename, 'administrator', basename(__FILE__), 'mytheme_admin');
}

function mytheme_add_init() {

$file_dir=get_bloginfo('template_directory');
wp_enqueue_style("functions", $file_dir."/functions/functions.css", false, "1.0", "all");
wp_enqueue_script("rm_script", $file_dir."/functions/rm_script.js", false, "1.0");

}
function mytheme_admin() {
 
global $themename, $shortname, $options;
$i=0;
 
if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';
 
?>
<div class="wrap rm_wrap">
<h2><?php echo $themename; ?> Settings</h2>

<?php
    
echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/admin/css/admin.css" type="text/css" media="screen" />
<script type="text/javascript" src="'.get_bloginfo('template_url').'/lib/admin/js/jquery.tabs.js"></script>
<script type="text/javascript" src="'.get_bloginfo('template_url').'/lib/admin/js/jquery.color.picker.js"></script>'; ?>
 
<div class="rm_opts">
<form method="post">
<?php foreach ($options as $value) {
switch ( $value['type'] ) {
 
case "open":
?>
 
<?php break;
 
case "close":
?>
 
</div>
</div>
<br />

 
<?php break;
 
case "title":
?>
<p>To easily use the <?php echo $themename;?> theme, you can use the menu below.</p>

 
<?php break;


case "colorpicker":
?>
<div class="rm_input rm_text">
  <div class="option option-colorpicker">
<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
    <div class="section">
      <div class="element">
        <script type="text/javascript">
        jQuery(document).ready(function($) {  
          $("#<?php echo $value['id']; ?>").ColorPicker({
            onSubmit: function(hsb, hex, rgb) {
            	$("#<?php echo $value['id']; ?>").val("#"+hex);
            },
            onBeforeShow: function () {
            	$(this).ColorPickerSetColor(this.value);
            	return false;
            },
            onChange: function (hsb, hex, rgb) {
            	$("#cp_<?php echo $value['id']; ?> div").css({"backgroundColor":"#"+hex, "backgroundImage": "none", "borderColor":"#"+hex});
            	$("#cp_<?php echo $value['id']; ?>").prev("input").attr("value", "#"+hex);
            }
          })	
          .bind('keyup', function(){
            $(this).ColorPickerSetColor(this.value);
          });
        });
        </script>
        <input type="text" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" class="cp_input" />
        <div id="cp_<?php echo $value['id']; ?>" class="cp_box">
          <div style="background-color:<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo '#fff'; } ?>;<?php if ( get_settings( $value['id'] ) != "") { echo 'background-image:none; border-color:' . get_settings($value['id']) . ';'; } ?>"> 
          </div>
        </div> 
      </div>
      <div class="clear"></div>
      <div class="option-desc">Click the text box to select color.</div>
    </div>
  </div>
   </div><? 
   break;
 
case 'text':
?>



<div class="rm_input rm_text">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'])  ); } else { echo $value['std']; } ?>" />
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
<?php
break;
 
case 'textarea':
?>

<div class="rm_input rm_textarea">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
 	<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows=""><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id']) ); } else { echo $value['std']; } ?></textarea>
 <small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 
 </div>
  
<?php
break;
 
case 'select':
?>

<div class="rm_input rm_select">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
<?php foreach ($value['options'] as $option) { ?>
		<option <?php if (get_settings( $value['id'] ) == $option) { echo 'selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?>
</select>

	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
</div>
<?php
break;
 
case "checkbox":
?>

<div class="rm_input rm_checkbox">
	<label for="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></label>
	
<?php if(get_option($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = "";} ?>
<input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />


	<small><?php echo $value['desc']; ?></small><div class="clearfix"></div>
 </div>
<?php break; 
case "section":

$i++;

?>

<div class="rm_section">
<div class="rm_title"><h3><img src="<?php bloginfo('template_directory')?>/functions/images/trans.gif" class="inactive" alt="""><?php echo $value['name']; ?></h3><span class="submit"><input name="save<?php echo $i; ?>" type="submit" value="Save changes" />
</span><div class="clearfix"></div></div>
<div class="rm_options">

 
<?php break;
 
}
}
?>
 
<input type="hidden" name="action" value="save" />
</form>
<form method="post">
<p class="submit">
<input name="reset" type="submit" value="Reset" />
<input type="hidden" name="action" value="reset" />
</p>
</form>
<div style="font-size:9px; margin-bottom:10px;"></div>
 </div> 
 

<?php
}
?>
<?php
add_action('admin_init', 'mytheme_add_init');
add_action('admin_menu', 'mytheme_add_admin');

class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '';
           $append = '';
           $description  = ! empty( $item->description ) ? ''.esc_attr( $item->description ).'' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'><span>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= '</span>'.$description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}

?>
<?php //this function will be called in the next section
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
 <ul>
            	<li> <?php echo get_avatar($comment,$size='69',$default='' ); ?></li>
                <li>
                	<div class="info">
                    	<h3><?php printf(__('%s'), get_comment_author_link()) ?></h3>
                        <p><span><?php the_time('t'); ?><?php the_time('S'); ?> <?php the_time('F'); ?><?php the_time('Y'); ?></span></p>
                        <p><?php comment_text() ?></p>
                    </div>
                </li>
            </ul>
 
     <div class="clear"></div>
 
     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
     <?php endif; ?>
 
     <div class="comment-text">	
         <?php //comment_text() ?>
     </div>
 
   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
   </div>
   <div class="clear"></div>
 <?php } ?>
<?php 
function close_comments( $posts ) {
	if ( !is_single() ) { return $posts; }
	if ( time() - strtotime( $posts[0]->post_date_gmt ) > ( 30 * 24 * 60 * 60 ) ) {
		$posts[0]->comment_status = 'closed';
		$posts[0]->ping_status    = 'closed';
	}
	return $posts;
}
add_filter( 'the_posts', 'close_comments' ); 
?>
<?php function check_referrer() {
    if (!isset($_SERVER['HTTP_REFERER']) || $_SERVER['HTTP_REFERER'] == "") {
        wp_die( __('Please enable referrers in your browser, or, if you\'re a spammer, get out of here!') );
    }
}
 
add_action('check_comment_flood', 'check_referrer');
register_nav_menus( array('topmenu' => 'Top Navigation', 'main' => 'Main Navigation' ,'Footer' => 'Footer Navigation')
 );



add_action( 'password_reset', 'my_password_reset' );

function my_password_reset( $user, $new_pass ) {
//echo '-------------------------------------------------'. $user.$new_pass;
//update_user_meta( $user,  'user_pass' , $new_pass);
wp_redirect( home_url() ); //exit;
}

?>