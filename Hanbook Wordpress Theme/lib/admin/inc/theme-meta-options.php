<?php // Meta Options (WPShout.com)

require(ghostpool_inc . 'options.php');

add_action( 'admin_menu', 'ghostpool_create_meta_box' );
add_action( 'save_post', 'ghostpool_save_meta_data' );

function ghostpool_create_meta_box() {
	global $theme_name;

	add_meta_box( 'post-meta-boxes', __('Post Settings'), 'post_meta_boxes', 'post', 'normal', 'high' );
	add_meta_box( 'page-meta-boxes', __('Page Settings'), 'page_meta_boxes', 'page', 'normal', 'high' );
	add_meta_box( 'slide-meta-boxes', __( 'Slide Settings'), 'slide_meta_boxes', 'slide', 'normal', 'high');
}


/*************************** Post Options ***************************/

function ghostpool_post_meta_boxes() {

	$meta_boxes = array(

	'format_settings' => array('name' => 'format_settings', 'type' => 'open', 'title' => __('Format Settings', 'ghostpool')),

		'ghostpool_thumbnail' => array( 'name' => 'ghostpool_thumbnail', 'title' => __('Image URL', 'ghostpool'), 'desc' => 'The URL of your thumbnail.', 'extras' => 'getimage', 'type' => 'text'),	
		
		'ghostpool_lightbox_type' => array( 'name' => 'ghostpool_lightbox_type', 'title' => __('Lightbox Type', 'ghostpool'), 'desc' => 'Choose this option to open this image in a lightbox (applies to category, archives, portfolio pages etc.).', 'options' => array('None', 'Image', 'Video'), 'type' => 'select'),

		'ghostpool_custom_url' => array( 'name' => 'ghostpool_custom_url', 'title' => __('Custom URL', 'ghostpool'), 'desc' => 'A custom url which your image links to (used for your lightbox URL and overrides the default page URL).', 'type' => 'text'),

		array('type' => 'divider'),
		
		'ghostpool_skin' => array( 'name' => 'ghostpool_skin', 'title' => __('Page Skin', 'ghostpool'), 'desc' => 'Choose the skin of this page.', 'options' => array('Default', 'Obsidian', 'Obsidian Grunge', 'Chocolate', 'Arctic Fox', 'Tiger'), 'type' => 'select'),
		
		'ghostpool_columns_individual' => array( 'name' => 'ghostpool_columns_individual', 'title' => __('Columns', 'ghostpool'), 'desc' => 'Choose your column style.', 'options' => array('Default', 'Sidebar Right', 'Sidebar Left', 'Fullwidth'), 'type' => 'select'),	

		'ghostpool_frame_individual' => array( 'name' => 'ghostpool_frame_individual', 'title' => __('Frame', 'ghostpool'), 'desc' => 'Choose whether to display a frame around your content.', 'options' => array('Default', 'Enable', 'Disable'), 'type' => 'select'),

		array('type' => 'divider'),	
		
		'ghostpool_breadcrumbs_individual' => array( 'name' => 'ghostpool_breadcrumbs_individual', 'title' => __('Breadcrumbs', 'ghostpool'), 'desc' => 'Choose whether to display a breadcrumbs navigation at the top of this page.', 'options' => array('Default', 'Enable', 'Disable'), 'type' => 'select'),		
		
		'ghostpool_sidebar' => array( 'name' => 'ghostpool_sidebar', 'title' => __('Sidebar', 'ghostpool'), 'desc' => 'Choose which sidebar area to display on this page.', 'std' => 'Default Sidebar', 'type' => 'select_sidebar'),
		
		'ghostpool_page_title' => array( 'name' => 'ghostpool_page_title', 'title' => __('Hide Page Title', 'ghostpool'), 'desc' => 'Hide the page title.', 'type' => 'checkbox'),

		array('type' => 'divider'),
		
		'ghostpool_top_content' => array( 'name' => 'ghostpool_top_content', 'title' => __('Top Content', 'ghostpool'), 'desc' => 'Add any content, including shortcodes, that you want to insert above your main content and sidebar.', 'size' => 'large', 'type' => 'textarea'),
		
	array('type' => 'close'),
	
	array('type' => 'clear'),
	
	);

	return apply_filters( 'ghostpool_post_meta_boxes', $meta_boxes );
}


/*************************** Page Options ***************************/

function ghostpool_page_meta_boxes() {
	
	$meta_boxes = array(

	'format_settings' => array('name' => 'format_settings', 'type' => 'open', 'title' => __('Format Settings', 'ghostpool')),
		
		'ghostpool_thumbnail' => array( 'name' => 'ghostpool_thumbnail', 'title' => __('Image URL', 'ghostpool'), 'desc' => 'The URL of your thumbnail.', 'extras' => 'getimage', 'type' => 'text'),	
		
		'ghostpool_lightbox_type' => array( 'name' => 'ghostpool_lightbox_type', 'title' => __('Lightbox Type', 'ghostpool'), 'desc' => 'Choose this option to open this image in a lightbox (applies to category, archives, portfolio pages etc.).', 'options' => array('None', 'Image', 'Video'), 'type' => 'select'),

		'ghostpool_custom_url' => array( 'name' => 'ghostpool_custom_url', 'title' => __('Custom URL', 'ghostpool'), 'desc' => 'A custom url which your image links to (used for your lightbox URL and overrides the default page URL).', 'type' => 'text'),

		array('type' => 'divider'),
		
		'ghostpool_skin' => array( 'name' => 'ghostpool_skin', 'title' => __('Page Skin', 'ghostpool'), 'desc' => 'Choose the skin of this page.', 'options' => array('Default', 'Obsidian', 'Obsidian Grunge', 'Chocolate', 'Arctic Fox', 'Tiger'), 'type' => 'select'),
		
		'ghostpool_columns_individual' => array( 'name' => 'ghostpool_columns_individual', 'title' => __('Columns', 'ghostpool'), 'desc' => 'Choose your column style.', 'options' => array('Default', 'Sidebar Right', 'Sidebar Left', 'Fullwidth'), 'type' => 'select'),	

		'ghostpool_frame_individual' => array( 'name' => 'ghostpool_frame_individual', 'title' => __('Frame', 'ghostpool'), 'desc' => 'Choose whether to display a frame around your content.', 'options' => array('Default', 'Enable', 'Disable'), 'type' => 'select'),

		array('type' => 'divider'),	
		
		'ghostpool_breadcrumbs_individual' => array( 'name' => 'ghostpool_breadcrumbs_individual', 'title' => __('Breadcrumbs', 'ghostpool'), 'desc' => 'Choose whether to display a breadcrumbs navigation at the top of this page.', 'options' => array('Default', 'Enable', 'Disable'), 'type' => 'select'),		
		
		'ghostpool_sidebar' => array( 'name' => 'ghostpool_sidebar', 'title' => __('Sidebar', 'ghostpool'), 'desc' => 'Choose which sidebar area to display on this page.', 'std' => 'Default Sidebar', 'type' => 'select_sidebar'),
		
		'ghostpool_page_title' => array( 'name' => 'ghostpool_page_title', 'title' => __('Hide Page Title', 'ghostpool'), 'desc' => 'Hide the page title.', 'type' => 'checkbox'),

		array('type' => 'divider'),
		
		'ghostpool_top_content' => array( 'name' => 'ghostpool_top_content', 'title' => __('Top Content', 'ghostpool'), 'desc' => 'Add any content, including shortcodes, that you want to insert above your main content and sidebar.', 'size' => 'large', 'type' => 'textarea'),
		
	array('type' => 'close'),
	
	array('type' => 'clear'),
	
	);

	return apply_filters( 'ghostpool_page_meta_boxes', $meta_boxes );
}


/*************************** Slide Options ***************************/
	 
function ghostpool_slide_meta_boxes() {

	$meta_boxes = array(
	
	'general_settings' => array('name' => 'general_settings', 'type' => 'open', 'title' => __('General Settings', 'ghostpool')),
		
		'ghostpool_slide_url' => array( 'name' => 'ghostpool_slide_url', 'title' => __('Slide URL', 'ghostpool'), 'desc' => 'Enter the URL you want your slide to link to (only applies to slides with an image or video/audio URL entered below).', 'type' => 'text'),

		'ghostpool_slide_link_type' => array( 'name' => 'ghostpool_slide_link_type', 'title' => __('Link Type', 'ghostpool'), 'desc' => 'Choose how your slide links to the URL you provided to the left  (only applies to slides with an image entered below).', 'options' => array('Page URL', 'Lightbox Image', 'Lightbox Video', 'No Link'), 'type' => 'select'),
		
		'ghostpool_slide_order' => array( 'name' => 'ghostpool_slide_order', 'title' => __('Slide Order Number', 'ghostpool'), 'std' => '0', 'desc' => 'To order your slides enter a number, with 0 being shown first.', 'type' => 'text_small'),

		array('type' => 'divider'),
		
		'ghostpool_slide_timeout' => array( 'name' => 'ghostpool_slide_timeout', 'title' => __('Slide Timeout', 'ghostpool'), 'std' => '', 'desc' => 'The number of seconds this slide remains in view for (Tip: match the length of your video to the timeout value).', 'type' => 'text_small'),
		
	array('type' => 'close'),
	
	'image_settings' => array('name' => 'image_settings', 'type' => 'open', 'title' => __('Image Settings', 'ghostpool')),
	
		'ghostpool_slide_image' => array( 'name' => 'ghostpool_slide_image', 'title' => __('Image URL', 'ghostpool'), 'desc' => 'The URL of your slider image (YouTube, FLV, MP4 and MP3 files will use this image).', 'extras' => 'getimage', 'type' => 'text'),

		'ghostpool_slide_zoom' => array( 'name' => 'ghostpool_slide_zoom', 'title' => __('Disable Image Zoom', 'ghostpool'), 'desc' => 'Choose this option to stop images being proportionately cropped to the slider dimensions.', 'type' => 'checkbox'),

		'ghostpool_slide_reflection' => array( 'name' => 'ghostpool_slide_reflection', 'title' => __('Image Reflection', 'ghostpool'), 'desc' => 'Add a reflection to your image.', 'type' => 'checkbox'),
		
	array('type' => 'close'),
	
	'video_settings' => array('name' => 'video_settings', 'type' => 'open', 'title' => __('Video Settings', 'ghostpool')),
	
		'ghostpool_slide_video' => array( 'name' => 'ghostpool_slide_video', 'title' => __('Video URL', 'ghostpool'), 'desc' => 'The URL of your video or audio file. YouTube, Vimeo, FLV, MP4 and MP3 formats accepted.', 'extras' => 'getvideo', 'type' => 'text'),

		'ghostpool_webm_mp4_slide_video' => array( 'name' => 'ghostpool_webm_mp4_slide_video', 'title' => __('HTML5 Video URL (Safari/Chrome)', 'ghostpool'), 'desc' => 'Enter your HTML5 video URL for Safari/Chrome (WEBM/MP4).', 'extras' => 'getvideo', 'type' => 'text'),

		'ghostpool_ogg_slide_video' => array( 'name' => 'ghostpool_ogg_slide_video', 'title' => __('HTML5 Video URL (FireFox/Opera)', 'ghostpool'), 'desc' => 'Enter your HTML5 video URL for FireFox/Opera (OGG/OGV).', 'extras' => 'getvideo', 'type' => 'text'),
		
		array('type' => 'divider'),
				
		'ghostpool_slide_autostart_video' => array( 'name' => 'ghostpool_slide_autostart_video', 'title' => __('Autostart Video', 'ghostpool'), 'desc' => 'Plays the video/audio automatically when the slide comes into view (does not work in Internet Explorer, unless video is displayed in first slide).', 'type' => 'checkbox'),

		'ghostpool_slide_video_priority' => array( 'name' => 'ghostpool_slide_video_priority', 'title' => __('Video Priority', 'ghostpool'), 'desc' => 'If you have provided both flash and HTML5 videos, select which one will take priority if the browser can play both.', 'options' => array('Flash', 'HTML 5'), 'type' => 'select'),
		
		'ghostpool_slide_video_controls' => array( 'name' => 'ghostpool_slide_video_controls', 'title' => __('Video Controls', 'ghostpool'), 'desc' => 'Choose how to display the video controls (does not apply to Vimeo videos).', 'options' => array('None', 'Bottom', 'Over'), 'type' => 'select'),

	array('type' => 'close'),
	
	'caption_settings' => array('name' => 'caption_settings', 'type' => 'open', 'title' => __('Caption Settings', 'ghostpool')),
		
		'ghostpool_slide_caption_type' => array( 'name' => 'ghostpool_slide_caption_type', 'title' => __('Caption Type', 'ghostpool'), 'desc' => 'The type of caption for your slide.', 'options' => array('None', 'Left Frame', 'Right Frame', 'Top Left Overlay', 'Top Right Overlay', 'Bottom Left Overlay', 'Bottom Right Overlay'), 'type' => 'select'),
		
		'ghostpool_slide_caption_style' => array( 'name' => 'ghostpool_slide_caption_style', 'title' => __('Caption Style', 'ghostpool'), 'desc' => 'The style of caption for your slide.', 'options' => array('Dark', 'Light'), 'type' => 'select'),

		'ghostpool_hide_slide_title' => array( 'name' => 'ghostpool_hide_slide_title', 'title' => __('Hide Slider Title', 'ghostpool'), 'desc' => 'Hide the page title from appearing in the caption.', 'type' => 'checkbox'),

	array('type' => 'close'),

	'custom_slide_settings' => array('name' => 'custom_slide_settings', 'type' => 'open', 'title' => __('Custom Slide Settings', 'ghostpool')),
		
		'ghostpool_slide_bg_color' => array( 'name' => 'ghostpool_slide_bg_color', 'title' => __('Background Color', 'ghostpool'), 'desc' => 'Background color for the slide (e.g. #ff0000).', 'type' => 'text'),

		'ghostpool_slide_bg_image' => array( 'name' => 'ghostpool_slide_bg_image', 'title' => __('Background Image', 'ghostpool'), 'desc' => 'Background image for the slide (e.g. http://example.com/images/bg.jpg).', 'extras' => 'getimage', 'type' => 'text'),

		'ghostpool_slide_bg_repeat' => array( 'name' => 'ghostpool_slide_bg_repeat', 'title' => __('Background Image Repeat', 'ghostpool'), 'desc' => 'Choose how to repeat your background image.', 'options' => array('None', 'Repeat', 'Repeat Horizontally', 'Repeat Vertically'), 'type' => 'select'),
		
	array('type' => 'close'),
	
	array('type' => 'clear'),
	
	);

	return apply_filters( 'ghostpool_slide_meta_boxes', $meta_boxes );
}

/*************************** Meta Fields ***************************/

function post_meta_boxes() {
	global $post;
	$meta_boxes = ghostpool_post_meta_boxes(); ?>

	<?php echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/admin/css/meta.css" type="text/css" media="screen" />'; ?>

	<?php foreach ( $meta_boxes as $meta ) :
		$value = get_post_meta( $post->ID, $meta['name'], true );
		if ( $meta['type'] == 'text' )
			get_meta_text( $meta, $value );
		if ( $meta['type'] == 'text_small' )
			get_meta_text_small( $meta, $value );			
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'select_sidebar' )
			get_meta_select_sidebar( $meta, $value );			
		elseif ( $meta['type'] == 'checkbox' )
			get_meta_checkbox( $meta, $value );			
		elseif ( $meta['type'] == 'open' )
			get_meta_open( $meta, $value );		
		elseif ( $meta['type'] == 'close' )
			get_meta_close( $meta, $value );
		elseif ( $meta['type'] == 'divider' )
			get_meta_divider( $meta, $value );			
		elseif ( $meta['type'] == 'clear' )
			get_meta_clear( $meta, $value );
	endforeach; ?>
	
<?php
}

function page_meta_boxes() {
	global $post;
	$meta_boxes = ghostpool_page_meta_boxes(); ?>

	<?php echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/admin/css/meta.css" type="text/css" media="screen" />'; ?>

	<?php foreach ( $meta_boxes as $meta ) :
		$value = get_post_meta( $post->ID, $meta['name'], true );
		if ( $meta['type'] == 'text' )
			get_meta_text( $meta, $value );
		if ( $meta['type'] == 'text_small' )
			get_meta_text_small( $meta, $value );			
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'select_sidebar' )
			get_meta_select_sidebar( $meta, $value );			
		elseif ( $meta['type'] == 'checkbox' )
			get_meta_checkbox( $meta, $value );			
		elseif ( $meta['type'] == 'open' )
			get_meta_open( $meta, $value );		
		elseif ( $meta['type'] == 'close' )
			get_meta_close( $meta, $value );
		elseif ( $meta['type'] == 'divider' )
			get_meta_divider( $meta, $value );			
		elseif ( $meta['type'] == 'clear' )
			get_meta_clear( $meta, $value );	
	endforeach; ?>

<?php
}

function slide_meta_boxes() {
	global $post;
	$meta_boxes = ghostpool_slide_meta_boxes(); ?>

	<?php echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/admin/css/meta.css" type="text/css" media="screen" />'; ?>

	<?php foreach ( $meta_boxes as $meta ) :
		$value = get_post_meta( $post->ID, $meta['name'], true );
		if ( $meta['type'] == 'text' )
			get_meta_text( $meta, $value );
		if ( $meta['type'] == 'text_small' )
			get_meta_text_small( $meta, $value );			
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'checkbox' )
			get_meta_checkbox( $meta, $value );			
		elseif ( $meta['type'] == 'open' )
			get_meta_open( $meta, $value );		
		elseif ( $meta['type'] == 'close' )
			get_meta_close( $meta, $value );
		elseif ( $meta['type'] == 'divider' )
			get_meta_divider( $meta, $value );			
		elseif ( $meta['type'] == 'clear' )
			get_meta_clear( $meta, $value );			
	endforeach; ?>

<?php } function get_meta_open( $args = array(), $value = false ) {
extract( $args ); ?>
	
	<div class="meta-group">
	
	<h3><?php echo $title; ?></h3>
	<div class="group-desc"><?php echo $desc; ?></div><div class="clear"></div>
	<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		
	
	
<?php } function get_meta_close( $args = array(), $value = false ) {
extract( $args ); ?>
	
	</div><div class="clear"></div>
	<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		
	
	
<?php } function get_meta_divider( $args = array(), $value = false ) {
extract( $args ); ?>

	<div class="divider"></div>
	<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		


<?php } function get_meta_clear( $args = array(), $value = false ) {
extract( $args ); ?>
	
	<div class="clear"></div>
	<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />		
	
	
<?php } function get_meta_text( $args = array(), $value = false ) {
extract( $args ); ?>

	<div class="meta-box">
		<strong><?php echo $title; ?></strong>
		<br/><input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo wp_specialchars( $value, 1 ); ?>" size="30" tabindex="30" <?php if($extras == "getimage" OR $extras == "getvideo") { ?>class="uploadbutton"<?php } ?> />
		<?php if($extras == "getimage") { ?><a href="media-upload.php?post_id=&amp;type=image&amp;TB_iframe=true&amp;width=640&amp;height=790" id="add_image" class="thickbox button" title='Add an Image' onclick="return false;">Get Image</a><?php } elseif($extras == "getvideo") { ?><a href="media-upload.php?post_id=&amp;type=video&amp;TB_iframe=true&amp;width=640&amp;height=790" id="add_video" class="thickbox button" title='Add a Video' onclick="return false;">Get Video</a><?php } ?>
		<div class="meta-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>


<?php } function get_meta_text_small( $args = array(), $value = false ) {
extract( $args ); ?>

	<div class="meta-box">
		<strong><?php echo $title; ?></strong>
		<br/><input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php if(wp_specialchars( $value, 1 )) { echo wp_specialchars( $value, 1 ); } else { echo wp_specialchars( $std, 1 ); } ?>" size="30" tabindex="30" class="small-textbox" />
		<div class="meta-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>
	
	
<?php } function get_meta_select( $args = array(), $value = false ) {
extract( $args ); ?>

	<div class="meta-box">
		<strong><?php echo $title; ?></strong>
		<br/><select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
		<?php foreach ( $options as $option ) : ?>
			<option <?php if(htmlentities($value, ENT_QUOTES) == $option) echo ' selected="selected"'; ?>>
				<?php echo $option; ?>
			</option>
		<?php endforeach; ?>
		</select>
		<div class="meta-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>


<?php } function get_meta_select_sidebar( $args = array(), $value = false ) {
extract( $args );
global $post, $theme_new_sidebars; ?>

	<div class="meta-box">
		<strong><?php echo $title; ?></strong><br/>
		<select name="<?php echo $name; ?>" id="<?php echo $name; ?>">
			<option value="Default Sidebar"<?php if($value == "Default Sidebar") { echo ' selected="selected"'; } ?>>Default Sidebar</option>
			<?php for ($s=1; $s<($theme_new_sidebars+1); $s++) { ?>
				<option value="Sidebar <?php echo $s ?>"<?php if($value == "Sidebar ".$s) { echo ' selected="selected"'; } ?>>Sidebar <?php echo $s ?></option>
			<?php }; ?>
		</select>
		<div class="meta-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>
	
	
<?php } function get_meta_textarea( $args = array(), $value = false ) {
extract( $args ); ?>

	<div class="meta-box <?php if($size == "large") { ?>meta-box-large<?php } ?>">	
		<strong><?php echo $title; ?></strong>
		<br/><textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30"><?php echo wp_specialchars( $value, 1 ); ?></textarea>
		<div class="meta-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
	</div>


<?php } function get_meta_checkbox( $args = array(), $value = false ) {
extract( $args ); ?>

	<div class="meta-box">
		<strong><?php echo $title; ?></strong>
		<?php if( wp_specialchars($value, 1 ) ){ $checked = "checked=\"checked\""; } else { if ( $std === "true" ){ $checked = "checked=\"checked\""; } else { $checked = ""; } } ?>
		<input type="checkbox" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="false" <?php echo $checked; ?> />
		<div class="meta-desc"><?php echo $desc; ?></div>
		<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" /></p>			
	</div>


<?php }

function ghostpool_save_meta_data( $post_id ) {
	global $post;

	if ( 'page' == $_POST['post_type'] )
		$meta_boxes = array_merge( ghostpool_page_meta_boxes() );
	elseif ( 'post' == $_POST['post_type'] )
		$meta_boxes = array_merge( ghostpool_post_meta_boxes() );
	else
		$meta_boxes = array_merge( ghostpool_slide_meta_boxes() );

	foreach ( $meta_boxes as $meta_box ) :

		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

		elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		elseif ( 'slide' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;
			
		$data = stripslashes( $_POST[$meta_box['name']] );

		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );

		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );

		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

	endforeach;
}
?>