<?php

add_filter('widget_text', 'do_shortcode');

//*************************** Text Box ***************************//

function ghostpool_text($atts, $content = null) {
	extract(shortcode_atts(array(
        'size' => '13',
        'width' => '100%',
        'height' => '',
        'line_height' => '19px',
        'top' => '0px',
        'bottom' => '0px',
        'right' => '0px',
        'left' => '0px',
        'color' => '',
        'font' => '',
        'text_align' => 'text-left',
        'other' => ''
    ), $atts));

	if($right == "auto" OR $left == "auto") {
	$centered_class = 'centered';
	} else {
	$centered = '';
	}

	$out = '
	
	<div class="text-box '.$text_align.' '.$centered_class.'" style="font-size: '.$size.'px; color: '.$color.'; font-family: '.$font.'; line-height: '.$line_height.'; margin: '.$top.' '.$right.' '.$bottom.' '.$left.'; width: '.$width.'; height: '.$height.'; '.$other.'">'.do_shortcode($content).'</div>';

   return $out;
}

add_shortcode('text', 'ghostpool_text');


//*************************** Image ***************************//

function ghostpool_image($atts, $content = null) {
	extract(shortcode_atts(array(
		'url' => '#',
		'width' => '',
		'height' => '',
		'link' => '#',
		'align' => 'none',
		'top' => '',
		'left' => '',
		'bottom' => '',
		'right' => '',
		'mtop' => '0',
		'mleft' => '0',
		'mbottom' => '0',
		'mright' => '0',
		'alt' => '',
		'lightbox' => 'none',
		'shadow' => 'none',
		'reflection' => 'none',
		'zoom' => '0',
		'preload' => 'false',
	),$atts));

	require(ghostpool_inc . 'options.php');

	// Image Positioning
	if(esc_attr(esc_attr($top) OR esc_attr($bottom) OR esc_attr($left) OR esc_attr($right)) != '') {
	$position = "position: absolute;";
	}
	if(esc_attr($top) != '') {
	$top_position = 'top:'.$top.'px;';
	}
	if(esc_attr($bottom) != '') {
	$bottom_position = 'bottom:'.$bottom.'px;';
	}
	if(esc_attr($left) != '') {
	$left_position = 'left:'.$left.'px;';
	}
	if(esc_attr($right) != '') {
	$right_position = 'right:'.$right.'px;';
	}

	// Shadow Position
	$shadow_position = ($height - 12);
	
	// Image Reflection
	if($theme_timthumb == "1" OR (esc_attr($reflection) == "none" && esc_attr($shadow) != "none")) {
	$image_padding = 'padding-bottom: 20px;';
	}
	
	// Lightbox
	if(esc_attr($lightbox) == "image") {
	$lightbox = '<span class="hover-image" style="width: '.$width.'px; height: '.$height.'px;"></span>';
	$rel = "prettyPhoto[gallery]";
	} elseif(esc_attr($lightbox) == "video") {
	$lightbox = '<span class="hover-video" style="width: '.$width.'px; height: '.$height.'px;"></span>';
	$rel = "prettyPhoto[gallery]";
	} else {
	$lightbox = '';
	$rel = '';
	}

	// Video Type
	$flv = strpos($link,".flv");
	$mp4 = strpos($link,".mp4");
	$mp3 = strpos($link,".mp3");
		
	// Image Link
	if(esc_attr($link) != '#') {
	if($flv == true OR $mp4 == true OR $mp3 == true) {
	$link1 = '<a href="file='.$link.'&image='.$url.'" rel="'.$rel.'[gallery]">';
	} else {
	$link1 = '<a href="'.$link.'" rel="'.$rel.'[gallery]">';
	}
	$link2 = '</a>';
	}
				
	// Image & TimThumb
	if($theme_timthumb == "0" && ($width != "" && $height != "")) {			
	$image = get_bloginfo("template_directory").'/lib/scripts/timthumb.php?src='.$url.'&amp;h='.$height.'&amp;w='.$width.'&amp;zc='.$zoom;
	} else {
	$image = $url;	
	}

	// Image Preloader
 	if($preload == "true") {
 	$preload = 'preload';
	} else {
	$preload = '';
	}
 
	return '
	
	<div class="sc-image '.$shadow.' '.$align.' '.$preload.'" style="background-position: center '.$shadow_position.'px; '.$position.' '.$top_position.' '.$bottom_position.' '.$left_position.' '.$right_position.' margin: '.$mtop.'px '.$mright.'px '.$mbottom.'px '.$mleft.'px; width: '.$width.'px; '.$image_padding.'">'.$link1.'
		
		'.$lightbox.'
		
		<img class="image '.$reflection.' '.$preload.'" src="'.$image.'" alt="'.$alt.'" style="width: '.$width.'px; height: '.$height.'px;" />'.$link2.'
		
	</div>
	
	';

}

add_shortcode("image", "ghostpool_image");


//*************************** Video ***************************//

function ghostpool_video($atts, $content = null) {
    extract(shortcode_atts(array(
		'name' => '#',
        'url' => '#',
        'image' => '',
        'width' => '470',
        'height' => '320',
        'controlbar' => 'bottom',
        'autostart' => 'false',
        'icons' => 'true',
        'stretching' => 'fill',
        'align' => 'none',
        'skin' => ''.get_bloginfo("template_directory").'/lib/scripts/mediaplayer/fs39/fs39.xml',
        'html5_1' => '',
        'html5_2' => '',
        'priority' => 'flash'
    ), $atts));
		
		// Remove spaces from video name
		$video_name = preg_replace('/[^a-zA-Z0-9]/', '', $name);
	
		// Video Type	
		$vimeo = strpos($url,"vimeo.com");
		
		// Hide HTML5 Video Icons
		if($icons == "false") { $html5_icons = "hide-icons"; }
						
		$out .= '<div class="sc-video '.$align.' '.$html5_icons.'">';
							
			if($vimeo == false) {

				$out .= '

				<video id="video-'.$video_name.'" width="'.$width.'" height="'.$height.'" poster="'.get_bloginfo('template_directory') .'/lib/scripts/timthumb.php?src='.$image.'&h='.$height.'&w='.$width.'&zc=1" controls="controls">
				
					<source src="'.$html5_1.'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />
					<source src="'.$html5_1.'" type="video/webm" type=\'video/webm; codecs="vp8, vorbis"\' />
					<source src="'.$html5_2.'" type="video/ogg" source src="'.$ogg.'" type=\'video/ogg; codecs="theora, vorbis"\' />
					
				</video>
				
				<script>
					jwplayer("video-'.$video_name.'").setup({
						file: "'.$url.'",	
						image: "'.get_bloginfo('template_directory') .'/lib/scripts/timthumb.php?src='.$image.'&h='.$height.'&w='.$width.'&zc=1",
						icons: "'.$icons.'",
						autostart: "'.$autostart.'",
						stretching: "'.$stretching.'",
						controlbar: "'.$controlbar.'",
						skin: "'.$skin.'",
						screencolor: "white",
						height: '.$height.',
						width: '.$width.',
						players: [';					
						if($priority == "html5") {
							$out .= '{type: "html5"}, {type: "flash", src: "'.get_bloginfo("template_directory").'/lib/scripts/mediaplayer/player.swf"}';
						} elseif($priority == "flash") {
							$out .= '{type: "flash", src: "'.get_bloginfo("template_directory").'/lib/scripts/mediaplayer/player.swf"}, { type: "html5" },';
						}
						$out .= ']
					});
				</script>';
			
			} else {
										
				if($autostart == "false") {
				$autostart = "0";
				} elseif($autostart == "true") {
				$autostart = "1";
				}
		
				$vimeoid = trim($url,'http://vimeo.com/');
		
				$out .= '<iframe src="http://player.vimeo.com/video/'.$vimeoid.'?byline=0&amp;portrait=0&amp;autoplay='.$autostart.'" width="'.$width.'" height="'.$height.'" frameborder="0"></iframe>';
			
		}

		$out .= '</div>';
		
	return $out;

}

add_shortcode('video', 'ghostpool_video');


//*************************** Buttons ***************************//

function ghostpool_button($atts, $content = null) {
    extract(shortcode_atts(array(
        'link' => '#',
        'color' => 'darkgrey'
    ), $atts));

	$out = '<div class="button-wrapper"><div class="button '.$color.'"><a href="'.$link.'">'.do_shortcode($content).'</a></div></div>';
    
    return $out;
}

add_shortcode('button', 'ghostpool_button');


//*************************** Toggle Box ***************************//

function ghostpool_toggle($atts, $content = null) {
	extract(shortcode_atts(array(
        'title'      => '',
    ), $atts));

	$out .= '<h3 class="toggle"><a href="#">' .$title. '</a></h3>';
	$out .= '<div class="toggle-box" style="display: none;"><p>';
	$out .= do_shortcode($content);
	$out .= '</p></div>';

   return $out;
}

add_shortcode('toggle', 'ghostpool_toggle');


//*************************** Accordion ***************************//

function ghostpool_accordion($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => '#'
	), $atts));
	
	if($code=="accordion") {
		return '<div class="accordion">'.do_shortcode($content).'</div>';
	} elseif($code=="panel") {
		return '<div class="panel"><h3 class="accordion-title"><a href="#">'.esc_attr($title).'</a></h3><div class="panel-content">'.do_shortcode($content).'</div></div>';
	}

}

add_shortcode("accordion", "ghostpool_accordion");
add_shortcode("panel", "ghostpool_accordion");


//*************************** Tabs ***************************//

function ghostpool_tabs($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'title' => '#'
	), $atts));

	if (!preg_match_all("/(.?)\[(tab)\b(.*?)(?:(\/))?\](?:(.+?)\[\/tab\])?(.?)/s", $content, $matches)) {
		return do_shortcode($content);
		
	} else {
	
		for($i = 0; $i < count($matches[0]); $i++) {
			$matches[3][$i] = shortcode_parse_atts($matches[3][$i]);
		}
		
		$output = '<ul>';
		
		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<li><h4 class="tabhead"><a href="#tab-'.preg_replace('/[^a-zA-Z0-9]/', '', $matches[3][$i]['title'] ).'">' . $matches[3][$i]['title'] . '</a></h4></li>';
		}
		
		$output .= '</ul><div class="clear"></div>';

		for($i = 0; $i < count($matches[0]); $i++) {
			$output .= '<div id="tab-'.preg_replace('/[^a-zA-Z0-9]/', '', $matches[3][$i]['title']).'">'.do_shortcode(trim($matches[5][$i])).'</div>';
		}
		
		return '<div class="sc-tabs">'.$output.'</div>';
	}
	
}

add_shortcode("tabs", "ghostpool_tabs");


//*************************** Login Form ***************************//

function ghostpool_login($atts, $content = null) {
	extract(shortcode_atts(array(
		'username' => gp_username,
		'password' => gp_password,
		'redirect' => site_url( $_SERVER['REQUEST_URI'] )
	), $atts));
	
	if($username == "") {
	$username = gp_username;
	}
	
	if($password == "") {
	$password = gp_password;
	}
	
	if($redirect == "") {
	$redirect = site_url( $_SERVER['REQUEST_URI'] );
	}

	$args = array(
	'redirect' => $redirect,
	'label_username' => __($username),
	'label_password' => __($password),
	'remember' => true
	);
	
	ob_start(); ?>
     
	<?php if (is_user_logged_in()) {} else {
	
		wp_login_form($args);
	
	}

	$output_string = ob_get_contents();
	ob_end_clean(); 
	
	return $output_string;
}

add_shortcode("login", "ghostpool_login");


//*************************** Register Form ***************************//

function ghostpool_register($atts, $content = null) {
	extract(shortcode_atts(array(
		'username' => gp_username,
		'email' => gp_email,
		'redirect' => 'wp-login.php?action=register'
	), $atts));

	global $user_ID, $user_identity, $user_level;
	
	if($username == "") {
	$username = gp_username;
	}
	
	if($email == "") {
	$email = gp_email;
	}
	
	if($redirect == "") {
	$redirect = site_url($redirect, 'login_post');
	}
	
	if (is_user_logged_in()) {} else {
	
	return
	
	'<form id="registerform" action="'.site_url($redirect, 'login_post').'" method="post">
		<p class="login-username"><input type="text" name="user_login" id="user_register" class="input" value="'.esc_attr(stripslashes($user_login)).'" size="22" /><label>'.gp_username.'</label></p>
		<p class="login-email"><input type="text" name="user_email" id="user_email" class="input" value="'.esc_attr(stripslashes($user_email)).'" size="22" /><label>'.gp_email.'</label></p>			
		'.do_action('register_form').'
		<p>'.gp_email_password.'</p>
		<p><input type="submit" name="wp-submit" id="wp-register" value="'.gp_register.'" tabindex="100" /></p>
	</form>';	
	
	}

}

add_shortcode("register", "ghostpool_register");


//*************************** Dividers ***************************//

function ghostpool_divider($atts, $content = null) {
	return '<div class="divider"></div>';
}
add_shortcode("divider", "ghostpool_divider");

function ghostpool_top($atts, $content = null) {
	return '<div class="divider top"><a href="#">'.gp_back_to_top.'</a></div>';
}
add_shortcode("top", "ghostpool_top");

function ghostpool_clear($atts, $content = null) {
	return '<div class="divider clear"></div>';
}
add_shortcode("clear", "ghostpool_clear");

function ghostpool_curved($atts, $content = null) {
	return '<div class="divider curved"></div>';
}
add_shortcode("curved", "ghostpool_curved");


//*************************** Blockquotes ***************************//

function ghostpool_bq_left($atts, $content = null) {
	return '<div class="blockquote-left">'.do_shortcode($content).'</div>';
}
add_shortcode("bq_left", "ghostpool_bq_left");


function ghostpool_bq_right($atts, $content = null) {
	return '<div class="blockquote-right">'.do_shortcode($content).'</div>';
}
add_shortcode("bq_right", "ghostpool_bq_right");


//*************************** Dropcaps ***************************//

function ghostpool_dropcap_1($atts, $content = null) {
	extract(shortcode_atts(array(
        'color'      => ''
    ), $atts));

	$out .= '<h3 class="dropcap1" style="color: '.$color.';">'.do_shortcode($content).'</h3>';

   return $out;
}
add_shortcode('dropcap_1', 'ghostpool_dropcap_1');

function ghostpool_dropcap_2($atts, $content = null) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));

	$out .= '<h3 class="dropcap2" style="color: '.$color.';">'.do_shortcode($content).'</h3>';

   return $out;
}
add_shortcode('dropcap_2', 'ghostpool_dropcap_2');

function ghostpool_dropcap_3($atts, $content = null) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));

	$out .= '<h3 class="dropcap3" style="color: '.$color.';">'.do_shortcode($content).'</h3>';

   return $out;
}
add_shortcode('dropcap_3', 'ghostpool_dropcap_3');

function ghostpool_dropcap_4($atts, $content = null) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));

	$out .= '<h3 class="dropcap4" style="color: '.$color.';">'.do_shortcode($content).'</h3>';

   return $out;
}
add_shortcode('dropcap_4', 'ghostpool_dropcap_4');

function ghostpool_dropcap_5($atts, $content = null) {
	extract(shortcode_atts(array(
        'color'      => '',
    ), $atts));

	$out .= '<h3 class="dropcap5" style="color: '.$color.';">'.do_shortcode($content).'</h3>';

   return $out;
}
add_shortcode('dropcap_5', 'ghostpool_dropcap_5');


//*************************** Author Info ***************************//

function ghostpool_author($atts, $content = null) {

	// If Author Has Website
	if(get_the_author_meta('user_url')) {
	$website ='<a href="'.get_the_author_meta('user_url').'">Visit My Website</a> / ';
	} else {
	$website ='';
	}
	
	$out .=
	
	'<div class="author-info">'.
	
		get_avatar(get_the_author_id(), 55).'
	
		<div class="author-meta">
		
			<div class="author-name">'.get_the_author().'</div>'.
			
			'<div class="author-links">'.$website.'<a href="'.get_bloginfo('url').'/author/'.get_the_author_meta('user_login').'">View My Other Posts</a></div>
			
			<div class="clear"></div>
			
			<div class="author-desc">'.get_the_author_meta('description').'</div>
		
		</div>
		
	</div>
	';
				
   return $out;
   
}
add_shortcode("author", "ghostpool_author");


//*************************** Sidebar ***************************//

function ghostpool_sidebar($atts, $content = null) {
	extract(shortcode_atts(array(
        'name' => 'Default Sidebar',
        'width' => '',
        'align' => 'none',
    ), $atts));
	
	ob_start(); ?>
	
	<div class="sc-sidebar <?php echo($align); ?>" style="width: <?php echo($width); ?>px"><?php dynamic_sidebar($name); ?></div>

<?php 

	$output_string = ob_get_contents();
	ob_end_clean(); 
	
	return $output_string;

}

add_shortcode("sidebar", "ghostpool_sidebar");


//*************************** Related Posts ***************************//

function ghostpool_related_posts($atts, $content = null) {
	extract(shortcode_atts(array(
        'limit' => '6',
        'id' => ''
    ), $atts));
	
	global $wp_query;
	$post->ID = $GLOBALS['post']->ID;

	if($id == '') {
	$id = $post->ID;
	} else {
	$id;
	}

	$tags = wp_get_post_tags($id);
	$tempQuery = $wp_query;
	
	if($tags) {
	$tag_ids = array();
	
	foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	
	$newQuery=array(
	'tag__in' => $tag_ids,
	'post__not_in' => array($id),
	'posts_per_page' => $limit,
	'orderby' => rand,
	'caller_get_posts' => 1);
	
	query_posts($newQuery);
	
	require(ghostpool_inc . 'options.php');
	
	ob_start(); ?>
	
		<div class="clear"></div>
		
		<div id="related-posts">
			
			<h3>Related Posts</h3>
			
			<?php while (have_posts()) : the_post(); $post->ID = $GLOBALS['post']->ID; ?>
			
				<div class="related-post">				
					
					<?php if((get_post_meta($post->ID, 'ghostpool_thumbnail', true) OR $attachments = get_children($args))) { ?>
					
						<div class="related-image"><a href="<?php the_permalink(); ?>">
							
							<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>
							
								<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php if($theme_timthumb == "0") { ?>&amp;h=55&amp;w=55&amp;zc=1<?php } ?>" alt="" />
					
							<?php } else { ?>
							
								<?php $args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => 1, 'orderby' => menu_order, 'order' => ASC); $attachments = get_children($args); if ($attachments) { foreach ($attachments as $attachment) { ?>
									
									<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo wp_get_attachment_url($attachment->ID); ?><?php if($theme_timthumb == "0") { ?>&amp;h=55&amp;w=55&amp;zc=1<?php } ?>" alt="" />
									
								<?php }} ?>	
							
							<?php } ?>
							
						</a></div>
					
					<?php } else { ?>
					
						<div class="related-image"></div>
						
					<?php } ?>
					
					<div class="related-text">
					
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					
					<div class="related-date"><?php echo gp_posted_on; ?> <?php the_time('d, F Y'); ?></div>
					
					</div>
					
					<div class="clear"></div>	
					<div class="divider"></div>
				
				</div>
				
			<?php endwhile; ?>
		
		</div>
		
		<div class="clear"></div>

<?php 

	$output_string = ob_get_contents();
	ob_end_clean(); 
	
	} wp_reset_query();
		
	return $output_string;

}

add_shortcode("related_posts", "ghostpool_related_posts");


//*************************** Lists ***************************//

function ghostpool_list($atts, $content = null, $code) {
    extract(shortcode_atts(array(
		'type' => '',
		'divider' => 'false',
		'color' => 'teal'
    ), $atts));
    
    // Divider
    if($divider == "false") {
    $divider = "no-divider";
    } else {
    $divider = "";
    }
    
    // Color
    if($color == "orange") {
    $color == "orange";
    } elseif($color == "brown") {
    $color == "brown";
    } elseif($color == "blue") {
    $color == "blue";
    } else {
    $color = "teal";
    }
    
    if($code=="list") {
		$out .= '<ul class="'.$type.' '.$divider.' '.$color.'">'.do_shortcode($content).'</ul>';
	} elseif($code=="li") {
		$out .= '<li>'.do_shortcode($content).'</li>';
	}
	
   return $out;
   
}
add_shortcode("list", "ghostpool_list");
add_shortcode("li", "ghostpool_list");


//*************************** Notification ***************************//

function ghostpool_notification($atts, $content = null, $code) {
    extract(shortcode_atts(array(
		'type' => '',
    ), $atts));
    
    // Divider
    if($type == "star") {
    $type = "notify-star";
    } elseif($type == "warning") {
    $type = "notify-warning";
    } elseif($type == "error") {
    $type = "notify-error";    
    } elseif($type == "help") {
    $type = "notify-help";
    } else {
    $type = "notify-success";
    }
    
   return '<div class="notify '.$type.'"><span class="icon"></span>'.do_shortcode($content).'</div>';
   
}
add_shortcode("notification", "ghostpool_notification");


//*************************** Slider ***************************//

function ghostpool_slider($atts, $content = null) {
    extract(shortcode_atts(array(
		'name' => '#',
        'cat' => '',
        'slides' => '-1',
        'timeout' => '6',
        'nav' => '1',
        'arrows' => 'true',
        'width' => '#',
        'height' => '#',
        'shadow' => 'none',
        'align' => 'none',
        'top' => '0',
        'left' => '0',
        'right' => '0',
        'bottom' => '0'
    ), $atts));

	require(ghostpool_inc . 'options.php');
		
	// Remove spaces from slider name
	$slider_name = preg_replace('/[^a-zA-Z0-9]/', '', $name);
			
	// Slider Query
	$slider_query = 'post_type=slide&slide_categories='.$cat.'&posts_per_page='.$slides.'&order=ASC&orderby=meta_value&meta_key=ghostpool_slide_order';

	if(get_post_meta($post->ID, 'ghostpool_slide_reflection', true) && get_post_meta($post->ID, 'ghostpool_slide_image', true)) {	
	$total_slider_height = ($height + 72);
	} else {	
	$total_slider_height = ($height);
	}

	// Begin Slider Wrapper
	$out .=	'<div class="slider-wrapper '.$align.'" style="margin: '.$top.'px '.$right.'px '.$bottom.'px '.$left.'px; width: '.$width.'px; height:'.total_slider_height.'px;">';
		
		query_posts($slider_query); if (have_posts()) :
		
			// Begin Slider Arrows
			if(($arrows) == "true") {
				$slider_arrow_position = ($height - 56)/2;				
				$out .=	'
				<div id="'.$slider_name.'-prev" class="slide-prev" style="top: '.$slider_arrow_position.'px;"></div>
				<div id="'.$slider_name.'-next" class="slide-next" style="top: '.$slider_arrow_position.'px;"></div>';
			} else {}
			// End Slider Arrows
								
			// Shadow Position
			if($nav == "1") {
			$shadow_position = ($height + 15);
			} elseif($nav != "1") {
			$shadow_position = ($height - 15);
			}
				
			// Begin Slider
			$out .=	'<div id="'.$slider_name.'" class="slider '.$shadow.'" style="background-position: center '.$shadow_position.'px;">';
			
			$slide_counter = 0;
			
			while (have_posts()) : the_post(); global $wp_query; $post->ID = $GLOBALS['post']->ID; $slide_counter++;
	
				// Image Zoom
				if(get_post_meta($post->ID, 'ghostpool_slide_zoom', true)) {
				$zoom = 0;
				} else {
				$zoom = 1;
				}
				
				// Image Cropping
				if(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Left Frame" OR get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Right Frame") {
				$width_twothirds = $width/1.5;
				$rounded_width_twothirds = round($width_twothirds);
				$slide_video_width = $rounded_width_twothirds;
				} else {
				$slide_video_width = $width;
				}
				
				// Slider Images & TimThumb
				if($theme_timthumb == "0") {			
					if(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Left Frame" OR get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Right Frame") {
					$slide_image = get_bloginfo("template_directory").'/lib/scripts/timthumb.php?src='.get_post_meta($post->ID, 'ghostpool_slide_image', true).'&amp;h='.$height.'&amp;w='.$rounded_width_twothirds.'&amp;zc='.$zoom;
					} else {
					$slide_image = get_bloginfo("template_directory").'/lib/scripts/timthumb.php?src='.get_post_meta($post->ID, 'ghostpool_slide_image', true).'&amp;h='.$height.'&amp;w='.$width.'&amp;zc='.$zoom;					
					}	
				} else {
					if(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Left Frame" OR get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Right Frame") {
						$slide_image = get_post_meta($post->ID, 'ghostpool_slide_image', true);
						$slider_image_dimensions = 'width: '.$rounded_width_twothirds.'px; height: '.$height.'px;';
					} else {
						$slide_image = get_post_meta($post->ID, 'ghostpool_slide_image', true);
						$slider_image_dimensions = 'width: '.$width.'px; height: '.$height.'px;';					
					}
				}
				
				// Frame
				$frame_width = $width - $rounded_width_twothirds - 40;
				$frame_height = $height - 40;
				
				// Caption Type
				if(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Left Frame") {
				$caption_type = "left-frame";
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Right Frame") {
				$caption_type = "right-frame";
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Top Left Overlay") {
				$caption_type = "topleft-overlay caption-overlay";
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Top Right Overlay") {
				$caption_type = "topright-overlay caption-overlay";
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Bottom Left Overlay") {
				$caption_type = "bottomleft-overlay caption-overlay";
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Bottom Right Overlay") {
				$caption_type = "bottomright-overlay caption-overlay";
				}
				
				// Caption Style
				if(get_post_meta($post->ID, 'ghostpool_slide_caption_style', true) == "Light") {
				$caption_style = "caption-light";
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_style', true) == "Dark") {
				$caption_style = "caption-dark";
				}
				
				// Caption Title
				if(!get_post_meta($post->ID, 'ghostpool_hide_slide_title', true)) {
				$caption_title = '<h2>'.get_the_title().'</h2>';
				} else {
				$caption_title = '';
				}
				
				// Reflection
				if(get_post_meta($post->ID, 'ghostpool_slide_reflection', true) && get_post_meta($post->ID, 'ghostpool_slide_image', true)) {
				$reflection = 'reflection-m';
				$slide_padding = '';
				} else {
				$reflection = '';
				$slide_padding = 'slide-padding';
				}
	
				// Custom URL
				if(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Page URL") {
					$slide_url_1 = '<a href="'.get_post_meta($post->ID, 'ghostpool_slide_url', true).'" style="height: '.$height.'px;">';
					$slide_url_2 = '</a>';
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Lightbox Image") {
					$slide_url_1 = '<a href="'.get_post_meta($post->ID, 'ghostpool_slide_url', true).'" rel="prettyPhoto['.$slider_name.'-slider]" style="height: '.$height.'px;">';
					$slide_url_2 = '</a>';
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "Lightbox Video") {
					$slide_url_1 = '<a href="file='.get_post_meta($post->ID, 'ghostpool_slide_url', true).'&image='.get_post_meta($post->ID, 'ghostpool_slide_image', true).'" rel="prettyPhoto['.$slider_name.'-slider]" style="height: '.$height.'px;">';
					$slide_url_2 = '</a>';				
				} elseif(get_post_meta($post->ID, 'ghostpool_slide_link_type', true) == "No Link") {
					$slide_url_1 = '';
					$slide_url_2 = '';
				}
		
				// Nav Type
				if($nav == "1") {
				$nav_class = "nav-type-1";
				} elseif($nav == "2") {
				$nav_class = "nav-type-2";
				} else {}
				
				// Begin Slide
				$out .=	'<div class="slide '.$slide_padding.'" style="width: '.$width.'px;">';
				
					$out .= '<div class="caption-wrapper" style="height: '.$height.'px; width: '.$width.'px;">';
					
					// Custom Content
					if(!get_post_meta($post->ID, 'ghostpool_slide_image', true) && !get_post_meta($post->ID, 'ghostpool_slide_video', true)) {
					
						if(get_post_meta($post->ID, 'ghostpool_slide_bg_color', true)) {
						$slide_bg_color = 'background-color: '.get_post_meta($post->ID, 'ghostpool_slide_bg_color', true).';';
						}
						if(get_post_meta($post->ID, 'ghostpool_slide_bg_image', true)) {
						$slide_bg_image = 'background-image: url('.get_post_meta($post->ID, 'ghostpool_slide_bg_image', true).');';
						}
						if(get_post_meta($post->ID, 'ghostpool_slide_bg_repeat', true) == "None") {
						$slide_bg_repeat = 'background-repeat: no-repeat';
						} elseif(get_post_meta($post->ID, 'ghostpool_slide_bg_repeat', true) == "Repeat Horizontally") {
						$slide_bg_repeat = 'background-repeat: repeat-x';
						} elseif(get_post_meta($post->ID, 'ghostpool_slide_bg_repeat', true) == "Repeat Vertically") {
						$slide_bg_repeat = 'background-repeat: repeat-y';
						} else {
						$slide_bg_repeat = '';
						}
						
						$out .= '<div class="custom-slide" style="height: '.$height.'px; width: '.$width.'px; '.$slide_bg_color.' '.$slide_bg_image.' '.$slide_bg_repeat.'">'.do_shortcode(get_the_content()).'</div>';
					
					} else {
					
						// Frame
						if(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Left Frame" OR get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Right Frame") {
						
							$out .= '<div class="slide-frame-wrapper '.$caption_type.' '.$caption_style.'">';
							$out .= '<div class="slide-frame '.$caption_style.'" style="width: '.$frame_width.'px; height: '.$frame_height.'px;">'.$caption_title.''.do_shortcode(get_the_content()).'</div>';
							
						// Caption Overlay
						} elseif(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) != "None") {
						
							$out .=	'<div class="'.$caption_type.' '.$caption_style.'">'.$caption_title.''.do_shortcode(get_the_content()).'</div>';
							
						}
						
						// Video File
						if(get_post_meta($post->ID, 'ghostpool_slide_video', true)) {
						
							// Video Controls
							if(get_post_meta($post->ID, 'ghostpool_slide_video_controls', true) == "Over") {
							$slide_video_controls = "over";
							} elseif(get_post_meta($post->ID, 'ghostpool_slide_video_controls', true) == "Bottom") {
							$slide_video_controls = "bottom";
							} else {
							$slide_video_controls = "none";
							}
							
							//Video Autostart
							$MSIE = (strpos($_SERVER['HTTP_USER_AGENT'],'MSIE') !== FALSE);
							
							if($MSIE && $slide_counter != "1") {
								$slide_autostart_video = "false";
								$slide_autostart_vimeo = "0";
							} else {
								if(get_post_meta($post->ID, 'ghostpool_slide_autostart_video', true)) {
								$slide_autostart_video = "true";
								$slide_autostart_vimeo = "1";
								} else {
								$slide_autostart_video = "false";
								$slide_autostart_vimeo = "0";
								}
							}
							
							$out .= '<div class="slide-video" style="width: '.$slide_video_width.'px; height: '.$height.'px;">';
							
							// Video Type
							$vimeo = strpos(get_post_meta($post->ID, 'ghostpool_slide_video', true),"vimeo.com");
							
							
							// Vimeo
							if($vimeo == true) {
							
								$vimeoid = trim(get_post_meta($post->ID, 'ghostpool_slide_video', true),'http://vimeo.com/');

								$out .= '<iframe src="http://player.vimeo.com/video/'.$vimeoid.'?byline=0&amp;portrait=0&amp;autoplay='.$slide_autostart_vimeo.'" width="'.$slide_video_width.'" height="'.$height.'" frameborder="0"></iframe>';
							
							// JW Player
							} else {
							
								$out .= '

								<video id="video-'.get_the_ID().'" width="'.$slide_video_width.'" height="'.$height.'" poster="'.$slide_image.'" controls="controls" preload>
								
									<source src="'.get_post_meta($post->ID, 'ghostpool_webm_mp4_slide_video', true).'" type="video/mp4" />
									<source src="'.get_post_meta($post->ID, 'ghostpool_webm_mp4_slide_video', true).'" type="video/webm" />
									<source src="'.get_post_meta($post->ID, 'ghostpool_ogg_slide_video', true).'" type="video/ogg" />
									
								</video>
								
								<script>
									jwplayer("video-'.get_the_ID().'").setup({
										file: "'.get_post_meta($post->ID, 'ghostpool_slide_video', true).'",
										image: "'.get_bloginfo('template_directory') .'/lib/scripts/timthumb.php?src='.get_post_meta($post->ID, 'ghostpool_slide_image', true).'&h=400&w=980&zc=1",
										icons: "true",
										autostart: "'.$slide_autostart_video.'",
										stretching: "fill",
										controlbar: "'.$slide_video_controls.'",
										screencolor: "black",	
										height: '.$height.',
										width: '.$slide_video_width.',
										skin: "'.get_bloginfo("template_directory").'/lib/scripts/mediaplayer/fs39/fs39.xml",
										players: [';					
										if(get_post_meta($post->ID, 'ghostpool_slide_video_priority', true) == "HTML 5") {
											$out .= '{type: "html5"}, {type: "flash", src: "'.get_bloginfo("template_directory").'/lib/scripts/mediaplayer/player.swf"}';
										} else {
											$out .= '{type: "flash", src: "'.get_bloginfo("template_directory").'/lib/scripts/mediaplayer/player.swf"}, { type: "html5" },';
										}
										$out .= ']										
									});
								</script>';
							
							}

							$out .= '</div>';
							
						// Image File
						} else {
						
							$out .=	$slide_url_1.'<img src="'.$slide_image.'" class="'.$reflection.'" alt="" style="'.$slider_image_dimensions.'" />'.$slide_url_2;	
						
						}
						
						// Frame
						if(get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Left Frame" OR get_post_meta($post->ID, 'ghostpool_slide_caption_type', true) == "Right Frame") {
						$out .= '</div>';
						}
						
					}				

				$out .= '</div>';					

				$out .=	'</div>';
				// End Slide
			
			$meta_timeout = get_post_meta($post->ID, 'ghostpool_slide_timeout', true);
			if($meta_timeout) {
			$timeout_array = $timeout_array . $meta_timeout .","; 
			} else {
			$timeout_array = $timeout_array . $timeout.",";
			}          

			endwhile;
		
			$out .=	'</div>';
			// End Slider
	
			else :
			
			$out .= "<div class=\"columns one last separate\"><div>Opps, you haven't set your slider up correctly. Make sure you have created some slides from Slides > Add New and slide categories from Slides > Slide Categories. When using the slider shortcode make sure you either specify ONE category or leave it blank e.g. <strong>[slider cat=\"homepage-slider\"]</strong>. You must add the slug name of the category e.g. homepage-slider and NOT the category ID.</div></div>";
			
		endif; wp_reset_query();
	
		// Begin Slider Nav
		if($nav != "0") {
			
			query_posts($slider_query); if (have_posts()) :
			
				$out .=	'<div id="'.$slider_name.'-slider-nav" class="slider-nav-wrapper '.$nav_class.'" style="top: '.$height.'px;"><span class="slider-nav">';
				
				while (have_posts()) : the_post();	global $wp_query; $post->ID = $GLOBALS['post']->ID; 
				
				$out .=	'<span class="slider-button"></span>';
				
				endwhile;
								
				$out .=	'</span></div>';
			
			endif; wp_reset_query();
		
		}
		// End Slider Nav
	
	$out .=	'</div>';
	// End Slider Wrapper

	// Timeout	
	if($timeout == "0") {
	$timeout_value = "timeout: $timeout,";
	} else {
	$timeout_value = "timeoutFn: slideTimeout,";
	}
			
	$out .=
	'<script>
	jQuery(document).ready(function(){
		
		jQuery("#'.$slider_name.'") 
		.cycle({ 
			fx: "fade",
			'.$timeout_value.'
			speed: 1000,
			pause: 1,
			cleartype: true,
			cleartypeNoBg: true,			
			prev: "#'.$slider_name.'-prev", 
			next: "#'.$slider_name.'-next",
			pager: "#'.$slider_name.'-slider-nav .slider-nav",
			pagerAnchorBuilder: function(idx, slide) {return "#'.$slider_name.'-slider-nav .slider-nav span:eq(" + idx + ")";}  
		});
		
		jQuery("#'.$slider_name.'-slider-nav .slider-button").click(function() { 
			jQuery("#'.$slider_name.'").cycle("pause"); 
		});
		
	});
	
	// timeouts per slide (in seconds) 
	var posttimeouts = ['.$timeout_array.']; 
	function slideTimeout(currElement, nextElement, opts, isForward) { 
	var index = opts.currSlide; 
	return posttimeouts[index] * 1000; 
	} 
	
	</script>';
			
	return $out;

}

add_shortcode('slider', 'ghostpool_slider');


//*************************** Portfolio ***************************//

function ghostpool_portfolio($atts, $content = null) {
	extract(shortcode_atts(array(
		'type' => 'small-1',
		'cats' => '',
		'height' => '',
		'per_page' => '9',
		'orderby' => 'date',
		'order' => 'desc',
		'excerpt_length' => '50',
		'title' => 'true',
		'shadow' => 'none',
		'reflection' => 'none',
		'pagination' => 'true',
		'preload' => 'false'
	),$atts));

	require(ghostpool_inc . 'options.php');

	// Portfolio Type
	if(esc_attr($type) == 'small-1') { 
	$type_class = 'portfolio-small';
	} elseif(esc_attr($type) == 'small-2') { 
	$type_class = 'portfolio-small';
	} elseif(esc_attr($type) == 'large') { 
	$type_class = 'portfolio-large';
	} elseif(esc_attr($type) == 'grid') { 
	$type_class = 'portfolio-grid';
	}

	// Image Reflection
	if(esc_attr($reflection) == "none") {
	$image_padding = 'padding-bottom: 20px;';
	}
	
	// Columns
	$style_classes_1 = array('image-first','image-middle','image-last');
	$style_classes_2 = array('image-first','image-last');
	$style_classes_grid = array('first','middle','last');
	$style_index = 0;
	$counter = 0;
	
	// Order By
	if(esc_attr($orderby) == 'random') { 
	$orderby = "rand";
	} elseif(esc_attr($orderby) == 'title') { 
	$orderby = "title";
	} else {
	$orderby = "date";
	}
	
	// Order
	if(esc_attr($order) == 'asc') { 
	$order = "asc";
	} else {
	$order = "desc";
	}

	// Pagination	
	if (get_query_var('paged')) {
	$paged = get_query_var('paged');
	} elseif (get_query_var('page')) {
	$paged = get_query_var('page');
	} else {
	$paged = 1;
	}

	// Image Preloader
 	if($preload == "true") {
 	$preload = 'preload';
	} else {
	$preload = '';
	}
	
	// Post Query	
	$args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'cat' => esc_attr($cats),
	'paged' => $paged,
	'caller_get_posts'=> 1,
	'orderby' => $orderby,
	'order' => $order,
	'posts_per_page' => $per_page
	);

	$featured_query = new wp_query($args); 
	
	ob_start(); ?>
	
	<!--Begin Portfolio Container-->
	<div class="portfolio <?php echo $type_class; ?>">
		
		<?php while ($featured_query->have_posts()) : $featured_query->the_post(); global $wp_query, $paged, $post; $counter = $counter + 1;

		// Video Type
		$flv = strpos(get_post_meta($post->ID, 'ghostpool_custom_url', true),".flv");
		$mp4 = strpos(get_post_meta($post->ID, 'ghostpool_custom_url', true),".mp4");
		$mp3 = strpos(get_post_meta($post->ID, 'ghostpool_custom_url', true),".mp3");
		
		?>

		<!--Begin Portfolio Small 1-->
		<?php if(esc_attr($type) == 'small-1') { ?>

			<div class="portfolio-item <?php $k = $style_index%3; echo "$style_classes_1[$k]"; $style_index++; ?> <?php echo $preload; ?>" style="height: <?php echo $height; ?>px;">
		
				<!--Begin Image-->
				<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true) OR $attachments = get_children($args)) { ?>
				
					<div class="portfolio-thumbnail <?php echo $shadow; ?>">
					
						<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image" OR get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?>
							<a href="<?php if($flv == true OR $mp4 == true OR $mp3 == true) { ?>file=<?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?>&amp;image=<?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php } else { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } ?>" rel="prettyPhoto[gallery]">
						<?php } else { ?>
							<a href="<?php if(get_post_meta($post->ID, 'ghostpool_custom_url', true)) { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>">
						<?php } ?>

						<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image") { ?><span class="hover-image"></span><?php } elseif(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?><span class="hover-video"></span><?php } ?>
						
						<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>
						
							<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php if($theme_timthumb == "0") { ?>&amp;h=180&amp;w=280&amp;zc=1<?php } ?>" alt="" class="image <?php echo $reflection; ?>" style="<?php echo $image_padding; ?>" />
										
						<?php } else { ?>
						
							<?php $args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => 1, 'orderby' => menu_order, 'order' => ASC); $attachments = get_children($args); if ($attachments) { foreach ($attachments as $attachment) { ?>
								
								<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo wp_get_attachment_url($attachment->ID); ?><?php if($theme_timthumb == "0") { ?>&amp;h=180&amp;w=280&amp;zc=1<?php } ?>" alt=""  class="image <?php echo $reflection; ?>" style="<?php echo $image_padding; ?>" />
								
							<?php }} ?>	
						
						<?php } ?>
						
						</a>
				
					</div>
					
					<div class="clear"></div>
				
				<?php } ?>
				<!--End Image-->
			
				<?php if(esc_attr($title) == 'true') { ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php } ?>
				
				<?php if(esc_attr($excerpt_length) == '0') {} elseif(esc_attr($excerpt_length) != '0') { ?>
					<div class="portfolio-text">
						<p><?php echo excerpt($excerpt_length); ?><a href="<?php the_permalink(); ?>"><?php echo gp_read_more; ?></a></p>
					</div>
				<?php } ?>
			
			</div>
				
			<?php if($counter %3 == 0) { ?>
				<div class="clear"></div>
			<?php } ?>
			
		<?php } ?>
		<!--End Portfolio Small 1-->


		<!--Begin Portfolio Small 2-->
		<?php if(esc_attr($type) == 'small-2') { ?>

			<div class="portfolio-item <?php $k = $style_index%2; echo "$style_classes_2[$k]"; $style_index++; ?> <?php echo $preload; ?>" style="height: <?php echo $height; ?>px;">
		
				<!--Begin Image-->
				<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true) OR $attachments = get_children($args)) { ?>
				
					<div class="portfolio-thumbnail <?php echo $shadow; ?>">
					
						<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image" OR get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?>
							<a href="<?php if($flv == true OR $mp4 == true OR $mp3 == true) { ?>file=<?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?>&amp;image=<?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php } else { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } ?>" rel="prettyPhoto[gallery]">
						<?php } else { ?>
							<a href="<?php if(get_post_meta($post->ID, 'ghostpool_custom_url', true)) { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>">
						<?php } ?>
								
						<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image") { ?><span class="hover-image"></span><?php } elseif(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?><span class="hover-video"></span><?php } ?>
						
						<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>
						
							<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php if($theme_timthumb == "0") { ?>&amp;h=180&amp;w=280&amp;zc=1<?php } ?>" alt="" class="image <?php echo $reflection; ?>" style="<?php echo $image_padding; ?>" />
										
						<?php } else { ?>
						
							<?php $args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => 1, 'orderby' => menu_order, 'order' => ASC); $attachments = get_children($args); if ($attachments) { foreach ($attachments as $attachment) { ?>
								
								<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo wp_get_attachment_url($attachment->ID); ?><?php if($theme_timthumb == "0") { ?>&amp;h=180&amp;w=280&amp;zc=1<?php } ?>" alt=""  class="image <?php echo $reflection; ?>" style="<?php echo $image_padding; ?>" />
								
							<?php }} ?>	
						
						<?php } ?>
						
						</a>
				
					</div>
					
					<div class="clear"></div>
				
				<?php } ?>
				<!--End Image-->
			
				<?php if(esc_attr($title) == 'true') { ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php } ?>
				
				<?php if(esc_attr($excerpt_length) == '0') {} elseif(esc_attr($excerpt_length) != '0') { ?>
					<div class="portfolio-text">
						<p><?php echo excerpt($excerpt_length); ?><a href="<?php the_permalink(); ?>"><?php echo gp_read_more; ?></a></p>
					</div>
				<?php } ?>
			
			</div>
				
			<?php if($counter %2 == 0) { ?>
				<div class="clear"></div>
			<?php } ?>

		<?php } ?>
		
		
		<!--Begin Portfolio Large-->
		<?php if(esc_attr($type) == 'large') { ?>
				
			<div class="portfolio-item <?php echo $preload; ?>" style="height: <?php echo $height; ?>px;">
		
				<!--Begin Image-->
				<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true) OR $attachments = get_children($args)) { ?>
				
					<div class="portfolio-thumbnail <?php echo $shadow; ?>">
					
						<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image" OR get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?>
							<a href="<?php if($flv == true OR $mp4 == true OR $mp3 == true) { ?>file=<?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?>&amp;image=<?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php } else { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } ?>" rel="prettyPhoto[gallery]">
						<?php } else { ?>
							<a href="<?php if(get_post_meta($post->ID, 'ghostpool_custom_url', true)) { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>">
						<?php } ?>
								
						<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image") { ?><span class="hover-image"></span><?php } elseif(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?><span class="hover-video"></span><?php } ?>
						
						<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>
						
							<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php if($theme_timthumb == "0") { ?>&amp;h=300&amp;w=460&amp;zc=1<?php } ?>" alt="" class="image <?php echo $reflection; ?>" style="<?php echo $image_padding; ?>" />
										
						<?php } else { ?>
						
							<?php $args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => 1, 'orderby' => menu_order, 'order' => ASC); $attachments = get_children($args); if ($attachments) { foreach ($attachments as $attachment) { ?>
								
								<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo wp_get_attachment_url($attachment->ID); ?><?php if($theme_timthumb == "0") { ?>&amp;h=300&amp;w=460&amp;zc=1<?php } ?>" alt=""  class="image <?php echo $reflection; ?>" style="<?php echo $image_padding; ?>" />
								
							<?php }} ?>	
						
						<?php } ?>
						
						</a>
				
					</div>
				
				<?php } ?>
				<!--End Image-->
		
				<div class="portfolio-text">
				
					<?php if(esc_attr($title) == 'true') { ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php } ?>
					
					<?php if(esc_attr($excerpt_length) == '0') {} elseif(esc_attr($excerpt_length) != '0') { ?>
						<p><?php echo excerpt($excerpt_length); ?><a href="<?php the_permalink(); ?>"><?php echo gp_read_more; ?></a></p>
					<?php } ?>
				
				</div>
				
			</div><div class="divider curved"></div>
			
		<?php } ?>
		<!--End Portfolio Large-->


		<!--Begin Portfolio Grid-->
		<?php if(esc_attr($type) == 'grid') { ?>

			<div class="portfolio-item columns three joint <?php if($counter > 3) { ?>level_class<?php } ?>  <?php $k = $style_index%3; echo "$style_classes_grid[$k]"; $style_index++; ?> <?php echo $preload; ?>">
				
				<div class="left" style="height: <?php echo $height; ?>px;">
		
					<!--Begin Image-->
					<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true) OR $attachments = get_children($args)) { ?>
					
						<div class="portfolio-thumbnail <?php echo $shadow; ?>">
						
							<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image" OR get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?>
								<a href="<?php if($flv == true OR $mp4 == true OR $mp3 == true) { ?>file=<?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?>&amp;image=<?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php } else { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } ?>" rel="prettyPhoto[gallery]">
							<?php } else { ?>
								<a href="<?php if(get_post_meta($post->ID, 'ghostpool_custom_url', true)) { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>">
							<?php } ?>
									
							<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image") { ?><span class="hover-image"></span><?php } elseif(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?><span class="hover-video"></span><?php } ?>
							
							<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>
							
								<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php if($theme_timthumb == "0") { ?>&amp;h=180&amp;w=286&amp;zc=1<?php } ?>" alt="" class="image <?php echo $reflection; ?>" style="<?php echo $image_padding; ?>" />
											
							<?php } else { ?>
							
								<?php $args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => 1, 'orderby' => menu_order, 'order' => ASC); $attachments = get_children($args); if ($attachments) { foreach ($attachments as $attachment) { ?>
									
									<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo wp_get_attachment_url($attachment->ID); ?><?php if($theme_timthumb == "0") { ?>&amp;h=180&amp;w=286&amp;zc=1<?php } ?>" alt="" class="image <?php echo $reflection; ?>" style="<?php echo $image_padding; ?>" />
									
								<?php }} ?>	
							
							<?php } ?>
							
							</a>
					
						</div>
						
						<div class="clear"></div>
					
					<?php } ?>
					<!--End Image-->

				<?php if(esc_attr($title) == 'true') { ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php } ?>
				
				<?php if(esc_attr($excerpt_length) == '0') {} elseif(esc_attr($excerpt_length) != '0') { ?>
					<div class="portfolio-text">
						<p><?php echo excerpt($excerpt_length); ?><a href="<?php the_permalink(); ?>"><?php echo gp_read_more; ?></a></p>
					</div>
				<?php } ?>
			
				</div>
				
			</div>
				
			<?php if($counter %3 == 0) { ?>
				<div class="clear"></div>
			<?php } ?>
			
		<?php } ?>
		<!--End Portfolio Grid-->
		
	<?php endwhile; ?>
	
	</div>
	<!--End Portfolio Container-->

<?php

wp_reset_query();

$baseURL = get_permalink();

if($pagination == "true") { pagination($featured_query,$baseURL); }



$output_string = ob_get_contents();
ob_end_clean(); 

return $output_string;

}
add_shortcode("portfolio", "ghostpool_portfolio");


//*************************** Blog ***************************//

function ghostpool_blog($atts, $content = null) {
	extract(shortcode_atts(array(
		'images' => 'true',
		'cats' => '',
		'width' => '640',
		'height' => '250',
		'per_page' => '9',
		'orderby' => 'date',
		'order' => 'desc',
		'offset' => '0',
		'excerpt_length' => '50',
		'full_content' => 'false',
		'title' => 'true',
		'shadow' => 'none',
		'reflection' => 'none',
		'divider' => 'curved',
		'meta' => 'true',
		'pagination' => 'true',
		'preload' => 'false',
		'wrap' => 'false'
	),$atts));

	require(ghostpool_inc . 'options.php');
	
	$shadow_position = ($height - 16);
	
	// Image Padding
	if(($theme_timthumb == "1" OR esc_attr($shadow) != "none") && esc_attr($reflection) == "none") {
	$image_padding = 'padding-bottom: 40px;';
	} else {
	$image_padding = 'padding-bottom: 20px;';	
	}
	
	// Order By
	if(esc_attr($orderby) == 'random') { 
	$orderby = "rand";
	} elseif(esc_attr($orderby) == 'title') { 
	$orderby = "title";
	} else {
	$orderby = "date";
	}
	
	// Order
	if(esc_attr($order) == 'asc') { 
	$order = "asc";
	} else {
	$order = "desc";
	}

	// Pagination	
	if (get_query_var('paged')) {
	$paged = get_query_var('paged');
	} elseif (get_query_var('page')) {
	$paged = get_query_var('page');
	} else {
	$paged = 1;
	}

	// Image Preloader
 	if($preload == "true") {
 	$preload = 'preload';
	} else {
	$preload = '';
	}
	
	// Post Query	
	$args=array(
	'post_type' => 'post',
	'post_status' => 'publish',
	'cat' => esc_attr($cats),
	'paged' => $paged,
	'caller_get_posts'=> 1,
	'orderby' => $orderby,
	'order' => $order,
	'posts_per_page' => esc_attr($per_page),
	'offset' => $offset
	);

	$featured_query = new wp_query($args); 
	
	ob_start(); ?>
	
	<!--Begin Blog Container-->
	<div class="blog">

	<?php while ($featured_query->have_posts()) : $featured_query->the_post(); global $wp_query, $paged, $post; $counter = $counter + 1; 
	
	// Video Type
	$flv = strpos(get_post_meta($post->ID, 'ghostpool_custom_url', true),".flv");
	$mp4 = strpos(get_post_meta($post->ID, 'ghostpool_custom_url', true),".mp4");
	$mp3 = strpos(get_post_meta($post->ID, 'ghostpool_custom_url', true),".mp3");
		
		?>
	
		<!--Begin Post-->
		<div class="post <?php echo $preload; ?>">
		
			<!--Begin Image-->
			<?php if((get_post_meta($post->ID, 'ghostpool_thumbnail', true) OR $attachments = get_children($args)) && $images == "true") { ?>
			
				<div class="post-thumbnail <?php echo $shadow; ?> <?php if($wrap == "true") { ?>wrap<?php } ?>" style="background-position: center <?php echo $shadow_position; ?>px; <?php echo $image_padding; ?> width: <?php echo $width; ?>px;">

					<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image" OR get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?>
						<a href="<?php if($flv == true OR $mp4 == true OR $mp3 == true) { ?>file=<?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?>&amp;image=<?php echo get_post_meta($post->ID, 'ghostpool_thumbnail', true); ?><?php } else { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } ?>" rel="prettyPhoto[gallery]">
					<?php } else { ?>
						<a href="<?php if(get_post_meta($post->ID, 'ghostpool_custom_url', true)) { ?><?php echo get_post_meta($post->ID, 'ghostpool_custom_url', true); ?><?php } else { ?><?php the_permalink(); ?><?php } ?>">
					<?php } ?>
	
					<?php if(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Image") { ?><span class="hover-image" style="width: <?php echo $width; ?>px; height: <?php echo height; ?>px;"></span><?php } elseif(get_post_meta($post->ID, 'ghostpool_lightbox_type', true) == "Video") { ?><span class="hover-video" style="width: <?php echo $width; ?>px; height: <?php echo height; ?>px;"></span><?php } ?>
					
					<?php if(get_post_meta($post->ID, 'ghostpool_thumbnail', true)) { ?>
					
						<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo gp_imagepath(get_post_meta($post->ID, 'ghostpool_thumbnail', true)); ?><?php if($theme_timthumb == "0") { ?>&amp;h=<?php echo $height; ?>&amp;w=<?php echo $width; ?>&amp;zc=1<?php } ?>" alt="" class="image <?php echo $reflection; ?>" style="width: <?php echo $width; ?>px; height: <?php echo $height; ?>px;" />
									
					<?php } else { ?>
					
						<?php $args = array('post_type' => 'attachment', 'post_parent' => $post->ID, 'numberposts' => 1, 'orderby' => menu_order, 'order' => ASC); $attachments = get_children($args); if ($attachments) { foreach ($attachments as $attachment) { ?>
							
							<img src="<?php if($theme_timthumb == "0") { ?><?php bloginfo('template_directory'); ?>/lib/scripts/timthumb.php?src=<?php } ?><?php echo wp_get_attachment_url($attachment->ID); ?><?php if($theme_timthumb == "0") { ?>&amp;h=<?php echo $height; ?>&amp;w=<?php echo $width; ?>&amp;zc=1<?php } ?>" alt="" class="image <?php echo $reflection; ?>" style="width: <?php echo $width; ?>px; height: <?php echo $height; ?>px;" />
							
						<?php }} ?>	
					
					<?php } ?>
					
					</a>
			
				</div>
				
				<?php if($wrap == "false") { ?><div class="clear"></div><?php } ?>
			
			<?php } ?>
			<!--End Image-->
			
			<div class="post-text">
			
				<?php if(esc_attr($title) == 'true') { ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php } ?>
				
				<?php if(esc_attr($meta) == "true") { ?>
				
					<div class="post-cats"><?php the_category(' / '); ?></div>

					<div class="post-meta"><?php echo gp_posted_by; ?> <?php the_author(); ?> <?php echo gp_on; ?> <?php the_time('d, F Y'); ?> <?php if('open' == $post->comment_status) { ?><?php echo gp_with_comments; ?> <?php comments_popup_link(gp_no_comments, gp_one_comment, gp_more_comments, 'comments-link', ''); ?><?php } ?></div>
										
				<?php } ?>
				
				<?php if($full_content == 'false') { ?>
				
					<?php if(esc_attr($excerpt_length) == '0') {} elseif(esc_attr($excerpt_length) != '0') { ?><p><?php echo excerpt($excerpt_length); ?><a href="<?php the_permalink(); ?>"><?php echo gp_read_more; ?></a></p><?php } ?>
				
				<?php } else { global $more; $more = 0; ?>
				
					<?php the_content(); ?>
				
				<?php } ?>
									
			</div>
		
		</div>
		
		<?php if($divider == "curved") {?><div class="divider curved"></div><?php } elseif($divider == "line") { ?><div class="divider"></div><?php } elseif($divider == "top") { ?><div class="divider top"></div><?php } elseif($divider == "clear") { ?><div class="divider clear"></div><?php } ?>
		<!--End Post-->
	
	<?php endwhile; ?>
	
	</div>
	<!--End Blog Container-->

<?php

wp_reset_query();

$baseURL = get_permalink();

if($pagination == "true") { pagination($featured_query,$baseURL); }

$output_string = ob_get_contents();
ob_end_clean(); 

return $output_string;

}

add_shortcode("blog", "ghostpool_blog");


//*************************** Contact Form ***************************//

function ghostpool_contact($atts, $content = null) {
	extract(shortcode_atts(array(
		'email' => '#'
	),$atts));
	
	// Form Submitted
	if(isset($_POST['submittedContact'])) {
		require(ghostpool_inc . "/contact.php");
	}
	
	if(isset($emailSent) && $emailSent == true) {
		
		$out .= '<a id="contact_"></a>';
		$out .= '<p class="success">'.gp_thanks.' '.$name.'. '.gp_email_success.'</p>';
		
	} else {
		
		if(isset($captchaError)) {
			$out .= '<a id="contact_"></a>';
			$out .= '<p class="error">'.gp_email_error.'<p>';
		}
		
		$out .= '<a id="contact_"></a>';
		$out .= '<form action="' .get_permalink(). '#contact_" id="contact-form" method="post">';
		$out .= '<p><input type="text" name="contactName" id="contactName" value="';
		
		if(isset($_POST['contactName'])) {
			$out .= $_POST['contactName'];
		}
		$out .= '"';
		$out .= ' class="requiredFieldContact textfield';
		
		if($nameError != '') {
			$out .= ' input-error';
		}
		$out .= '"';
		$out .= ' size="22" tabindex="1" /><label class="textfield_label" for="contactName">'.gp_name.'  <span class="required">*</span></label></p>';
		
		$out .= '<p><input type="text" name="email" id="email" value="';
		
		if(isset($_POST['email'])) {
			$out .= $_POST['email'];
		}
		$out .= '"';
		$out .= ' class="requiredFieldContact email textfield';
		
		if($emailError != '') {
			$out .= ' input-error';
		}
		$out .= '"';
		$out .= ' size="22" tabindex="2" /><label class="textfield_label" for="email">'.gp_email.' <span class="required">*</span></label></p>';
		
		$out .= '<p><textarea name="comments" id="commentsText" rows="5" cols="40" tabindex="3" class="requiredFieldContact textarea';
		
		if($commentError != '') {
			$out .= ' input-error';
		}
		$out .= '">';
		
		if(isset($_POST['comments'])) { 
			if(function_exists('stripslashes')) { 
				$out .= stripslashes($_POST['comments']); 
				} else { 
					$out .= $_POST['comments']; 
				} 
			}
		$out .= '</textarea></p>';
		
		$out .= '<div class="contact-verify"><label for="verify" accesskey=V>3 + 1 = </label><input name="verify" type="text" id="verify" value="';
		
		if(isset($_POST['verify'])) {
			$out .= $_POST['verify'];
		}
		$out .= '"';
		$out .= ' class="requiredFieldContact verify';
		
		if($verifyError != '') {
			$out .= ' input-error';
		}
		$out .= '"';
		$out .= ' size="2" tabindex="4" /></div>';
		
		$out .= '<input name="submittedContact" id="submittedContact" class="contact-submit"  tabindex="4" value="'.gp_submit.'" type="submit" />';
		$out .= '<p class="loader"></p>';

		$out .= '<input id="submitUrl" type="hidden" name="submitUrl" value="'. ghostpool_inc . 'contact.php" />';
		$out .= '<input id="emailAddress" type="hidden" name="emailAddress" value="' .$email. '" />';
	
		$out .= '</form>';

	}
	return $out;
}

add_shortcode("contact", "ghostpool_contact");


//*************************** Columns ***************************//

function ghostpool_columns($atts, $content = null, $code) {
	extract(shortcode_atts(array(
		'type' => 'blank',
		'height' => ''
	), $atts));
	
	if($code=="one") {
	$class = "one last";	
	} elseif($code=="two") {
	$class = "two first";	
	} elseif($code=="two_last") {
	$class = "two last";	
	} elseif($code=="three") {
	$class = "three first";	
	} elseif($code=="three_middle") {
	$class = "three middle";
	} elseif($code=="three_last") {
	$class = "three last";	
	} elseif($code=="four") {
	$class = "four first";	
	} elseif($code=="four_middle") {
	$class = "four middle";	
	} elseif($code=="four_last") {
	$class = "four last";	
	} elseif($code=="onethird") {
	$class = "onethird first";
	} elseif($code=="onethird_last") {
	$class = "onethird last";	
	} elseif($code=="twothirds") {
	$class = "twothirds first";	
	} elseif($code=="twothirds_last") {
	$class = "twothirds last";
	} elseif($code=="onefourth") {
	$class = "onefourth first";	
	} elseif($code=="onefourth_last") {
	$class = "onefourth last";
	} elseif($code=="threefourths") {
	$class = "threefourths";		
	} elseif($code=="threefourths_last") {
	$class = "threefourths last";		
	}
	
    if(esc_attr($type) == "blank") {
	$col_type = "blank";
	} elseif(esc_attr($type) == "joint") {
	$col_type = "joint";
	} elseif(esc_attr($type) == "separate") {
	$col_type = "separate";
	}
	
	if(esc_attr($height) !='') {
	$height = 'style="height:'.esc_attr($height).'px"';
	}
	
	$clear = strpos($class,"last");

	if($clear === false) {
		return '<div class="columns '.$class.' '.$col_type.'"><div '.$height.'>'.do_shortcode($content).'</div></div>';
	} else {
		return '<div class="columns '.$class.' '.$col_type.'"><div '.$height.'>'.do_shortcode($content).'</div></div><div class="clear"></div>';
	}
}

add_shortcode("one", "ghostpool_columns");
add_shortcode("two", "ghostpool_columns");
add_shortcode("two_last", "ghostpool_columns");
add_shortcode("three", "ghostpool_columns");
add_shortcode("three_middle", "ghostpool_columns");
add_shortcode("three_last", "ghostpool_columns");
add_shortcode("four", "ghostpool_columns");
add_shortcode("four_middle", "ghostpool_columns");
add_shortcode("four_last", "ghostpool_columns");
add_shortcode("onethird", "ghostpool_columns");
add_shortcode("onethird_last", "ghostpool_columns");
add_shortcode("twothirds", "ghostpool_columns");
add_shortcode("twothirds_last", "ghostpool_columns");
add_shortcode("onefourth", "ghostpool_columns");
add_shortcode("onefourth_last", "ghostpool_columns");
add_shortcode("threefourths", "ghostpool_columns");
add_shortcode("threefourths_last", "ghostpool_columns");

?>