<?php // Themes Options Menu

$themename = "SuperMassive";
$dirname = "supermassive";
$themeurl = "http://themeforest.net/item/supermassive-a-next-generation-wordpress-theme/132454?ref=GhostPool";
$shortname = "theme";
$page_handle = $shortname . '-options';
$options = array (

array(	"name" => "General Settings",
      	"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_general_settings"),
		
		array(
		"name" => "Custom Logo",
        "desc" => "Enter your own logo here (e.g. http://www.example.com/images/imagename.jpg)",
        "id" => $shortname."_custom_logo",
        "std" => "",
        "extras" => "uploadbutton",
        "type" => "text"),

		array(
		"name" => "Custom Header Background",
        "desc" => "Enter your own header background here (e.g. http://www.example.com/images/imagename.jpg). This background will appear across the top of your page behind the logo and navigaiton.",
        "id" => $shortname."_custom_header",
        "std" => "",
        "extras" => "uploadbutton",
        "type" => "text"),

 		array(  
		"name" => "Header Repeat",
        "desc" => "Choose how to repeat your header background.",
        "id" => $shortname."_header_repeat",
        "std" => "Repeat",
		"options" => array('Repeat', 'Repeat Horizontally', 'Repeat Vertically', 'No Repeat'),
        "type" => "select"),

 		array(  
		"name" => "Header Position",
        "desc" => "Choose how to position your background.",
        "id" => $shortname."_header_position",
        "std" => "Centered",
		"options" => array('Centered', 'Left', 'Right'),
        "type" => "select"),
        
		array("type" => "divider"), 

		array(
		"name" => "Search Form",
        "desc" => "Choose whether to display the search form in the navigation panel.",
        "id" => $shortname."_search_form",
        "std" => "Enable",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),

		array("type" => "divider"), 

		array(
		"name" => "New Sidebars",
        "desc" => "Enter the number of new sidebar areas you want to create. You can add widgets to these sidebars from Appearances > Widgets and then assign these sidebars to any post/page.",
        "id" => $shortname."_new_sidebars",
        "std" => "1",
        "type" => "text_small"),
        
		array("type" => "divider"),

		array(
		"name" => "Preload Image Effect",
        "desc" => "Choose whether to use the preload effect on content in category, archive, tag pages etc. <em>Note: For images, blogs and portfolios this can be specified from the shortcodes themselves using <code>preload=\"true\"</code>.</em>",
        "id" => $shortname."_preload",
        "std" => "Disable",
		"options" => array('Disable', 'Enable'),
        "type" => "radio"),
		
		array("type" => "divider"),

		array(
		"name" => "TimThumb Image Resizer",
        "desc" => "If your images are not working on your website try disabling this option. <em>Note: This will mean your images will no longer be automatically cropped proportionally and reflections will not work.</em>",
        "id" => $shortname."_timthumb",
        "std" => "Enable",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),
		
		array("type" => "divider"),
		
		array(
		"name" => "Contact Info",
        "desc" => "Enter your contact info to display at the top of the page.",
        "id" => $shortname."_contact_info",
        "std" => "",
        "type" => "textarea"),

		array("type" => "divider"),  

		array(
		"name" => "Social Icons",
        "desc" => "Choose where to display your social icons.",
        "id" => $shortname."_social_icons",
        "std" => "Header",
		"options" => array('Header', 'Footer', 'Both'),
        "type" => "select"),
		
		array(  
		"name" => "RSS Feed Button",
        "desc" => "Display the RSS feed button with the default RSS feed or enter a custom feed below.",
        "id" => $shortname."_rss_button",
        "std" => "Enable",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),
        
		array(
		"name" => "RSS URL",
        "id" => $shortname."_rss",
        "std" => "",
        "type" => "text"),
        
        array(
		"name" => "Twitter URL",
        "id" => $shortname."_twitter",
        "std" => "",
        "type" => "text"),
        
        array(
		"name" => "Facebook URL",
        "id" => $shortname."_facebook",
        "std" => "",
        "type" => "text"),
        
        array(
		"name" => "Myspace URL",
        "id" => $shortname."_myspace",
        "std" => "",
        "type" => "text"),
        
        array(
		"name" => "Digg URL",
        "id" => $shortname."_digg",
        "std" => "",
        "type" => "text"),    
                
        array(
		"name" => "Flickr URL",
        "id" => $shortname."_flickr",
        "std" => "",
        "type" => "text"),

        array(
		"name" => "Delicious URL",
        "id" => $shortname."_delicious",
        "std" => "",
        "type" => "text"),

        array(
		"name" => "YouTube URL",
        "id" => $shortname."_youtube",
        "std" => "",
        "type" => "text"),
        
		array("type" => "divider"), 
		
        array(
		"name" => "Favicon URL (.ico)",
        "desc" => "Type the URL of your favicon image (.ico, 16x16 or 32x32)",
        "id" => $shortname."_favicon_ico",
        "std" => "",
        "extras" => "uploadbutton",
        "type" => "text"),

        array(
		"name" => "Favicon URL (.png)",
        "desc" => "Type the URL of your favicon image (.png, 16x16 or 32x32)",
        "id" => $shortname."_favicon_png",
        "extras" => "uploadbutton",
        "std" => "",
        "type" => "text"),
        
         array(
		"name" => "Apple Icon URL (.png)",
        "desc" => "Type the URL of your apple icon image (.png, 57x57), used for display on the Apple iPhone",
        "id" => $shortname."_apple_icon",
        "std" => "",
        "extras" => "uploadbutton",
        "type" => "text"),
        
		array("type" => "divider"),
		
        array(
		"name" => "SEO Meta Keywords",
		"desc" => "Enter keywords to describe your website, separating each with a comma. This is used for SEO purposes.",
        "id" => $shortname."_keywords",
        "std" => "",
        "type" => "text"), 
		
		array("type" => "divider"), 
		
		array(
		"name" => "Footer Content",
        "desc" => "Enter the content you want to display in your footer.",
        "id" => $shortname."_footer_content",
        "std" => "",
        "type" => "textarea"),

		array("type" => "divider"), 
		
		array(
		"name" => "Scripts",
        "desc" => "Enter any scripts that need to be embedded into your theme (e.g. Google Analytics)",
        "id" => $shortname."_scripts",
        "std" => "",
        "type" => "textarea"),
        
		array("type" => "close"),	
		
array(	"name" => "Page Settings",
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_page_settings"),

 		array(  
		"name" => "Theme Skin",
        "desc" => "Choose from one of the available theme skins (can be overridden on individual posts/pages).",
        "id" => $shortname."_skin",
        "std" => "Obsidian",
		"options" => array('Obsidian', 'Obsidian Grunge', 'Chocolate', 'Arctic Fox', 'Tiger'),
        "type" => "select"),

		array("type" => "divider"),

		array(  
		"name" => "Post/Page Columns",
        "desc" => "Choose your column style (can be overridden on individual posts/pages).",
        "id" => $shortname."_columns",
        "std" => "Sidebar Right",
		"options" => array('Sidebar Right', 'Sidebar Left', 'Fullwidth'),
        "type" => "select"),
        
        array(  
		"name" => "Other Columns",
        "desc" => "Choose your column style for category, archive, tag pages etc.",
        "id" => $shortname."_columns_other",
        "std" => "Sidebar Right",
		"options" => array('Sidebar Right', 'Sidebar Left', 'Fullwidth'),
        "type" => "select"),
        
        array("type" => "divider"), 
        		
		array(  
		"name" => "Post/Page Frame",
        "desc" => "Choose whether to display a frame around your content (can be overridden on individual posts/pages).",
        "id" => $shortname."_frame",
        "std" => "Enable",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),

		array(  
		"name" => "Other Frame",
        "desc" => "Choose whether to display a frame around your content for category, archive, tag pages etc.",
        "id" => $shortname."_frame_other",
        "std" => "Enable",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),

		array("type" => "divider"), 
		
		array(  
		"name" => "Post/Page Breadcrumbs",
        "desc" => "Choose whether to display breadcrumb navigation (can be overridden on individual posts/pages).",
        "id" => $shortname."_breadcrumbs",
        "std" => "Enable",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),

		array(  
		"name" => "Other Breadcrumbs",
        "desc" => "Choose whether to display breadcrumb navigation on for category, archive, tag pages etc.",
        "id" => $shortname."_breadcrumbs_other",
        "std" => "Enable",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),

		array("type" => "divider"),

         array(
		"name" => "Excerpt Length",
        "desc" => "The number of characters in excerpts on category, archive, search, tag pages etc.",
        "id" => $shortname."_excerpt_length",
        "std" => "30",
        "type" => "text_small"),

		array("type" => "divider"),

         array(
		"name" => "Author Info Panel",
        "desc" => "Choose whether to display the author info section on posts. <em>Note: Can also be inserted in individual posts and pages using the shortcode tag <code>[author]</code>.</em>",
        "id" => $shortname."_author_info",
       "std" => "Posts",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),

		array("type" => "divider"),
		
		array(  
		"name" => "Related Posts",
        "desc" => "Choose whether to display a related posts section on posts. <em>Note: Can also be inserted in individual posts and pages using the shortcode tag <code>[related_posts]</code>.</em>",
        "id" => $shortname."_related_posts",
        "std" => "Enable",
		"options" => array('Enable', 'Disable'),
        "type" => "radio"),

         array(
		"name" => "Number Of Related Posts",
        "desc" => "The number of related posts.",
        "id" => $shortname."_related_limit",
        "std" => "6",
        "type" => "text_small"),
        
		array("type" => "close"),

array(	"name" => "Color Settings",
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_color_settings"),

 		array(  
		"name" => "Body Text Color",
        "desc" => "",
        "id" => $shortname."_body_text_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => "Link Color",
        "desc" => "",
        "id" => $shortname."_link_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Link Hover Color",
        "desc" => "",
        "id" => $shortname."_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
		
 		array(  
		"name" => "Heading Text Color",
        "desc" => "",
        "id" => $shortname."_heading_text_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Heading Link Color",
        "desc" => "",
        "id" => $shortname."_heading_link_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Heading Link Hover Color",
        "desc" => "",
        "id" => $shortname."_heading_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
        
 		array(  
		"name" => "Sidebar Heading Text Color",
        "desc" => "",
        "id" => $shortname."_sidebar_heading_text_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Sidebar Text Color",
        "desc" => "",
        "id" => $shortname."_sidebar_text_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Sidebar Link Color",
        "desc" => "",
        "id" => $shortname."_sidebar_link_color",
        "std" => "",
        "type" => "colorpicker"),
 
 		array(  
		"name" => "Sidebar Link Hover Color",
        "desc" => "",
        "id" => $shortname."_sidebar_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),
        
		array("type" => "divider"),
		
 		array(  
		"name" => "Footer Text Color",
        "desc" => "",
        "id" => $shortname."_footer_text_color",
        "std" => "",
        "type" => "colorpicker"),
 
 		array(  
		"name" => "Footer Link Color",
        "desc" => "",
        "id" => $shortname."_footer_link_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Footer Link Hover Color",
        "desc" => "",
        "id" => $shortname."_footer_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => "Footer Copyright Text Color",
        "desc" => "",
        "id" => $shortname."_footer_copyright_text_color",
        "std" => "",
        "type" => "colorpicker"),
        
		array("type" => "divider"),
		
 		array(  
		"name" => "Navigation Link Color",
        "desc" => "",
        "id" => $shortname."_nav_link_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => "Navigation Link Hover Color",
        "desc" => "",
        "id" => $shortname."_nav_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
		
 		array(  
		"name" => "Contact Info Text Color",
        "desc" => "",
        "id" => $shortname."_contact_info_text_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
		
 		array(  
		"name" => "Breadcrumbs Text Color",
        "desc" => "",
        "id" => $shortname."_breadcrumbs_text_color",
        "std" => "",
        "type" => "colorpicker"),
        
		array("type" => "divider"),

 		array(  
		"name" => "Meta Text Color",
        "desc" => "",
        "id" => $shortname."_meta_text_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Meta Link Color",
        "desc" => "",
        "id" => $shortname."_meta_link_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Meta Link Hover Color",
        "desc" => "",
        "id" => $shortname."_meta_link_hover_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "divider"),
		
 		array(  
		"name" => "Divider Color",
        "desc" => "",
        "id" => $shortname."_divider_color",
        "std" => "",
        "type" => "colorpicker"),
        
		array("type" => "divider"),
		
 		array(  
		"name" => "Gradient 1 Top Background Color",
        "desc" => "",
        "id" => $shortname."_grad_1_bg_top_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => "Gradient 1 Bottom Background Color",
        "desc" => "",
        "id" => $shortname."_grad_1_bg_bottom_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Gradient 1 Border Color",
        "desc" => "",
        "id" => $shortname."_grad_1_border_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Gradient 1 Text Color",
        "desc" => "",
        "id" => $shortname."_grad_1_text_color",
        "std" => "",
        "type" => "colorpicker"),        

		array("type" => "divider"),
		
 		array(  
		"name" => "Gradient 2 Top Background Color",
        "desc" => "",
        "id" => $shortname."_grad_2_bg_top_color",
        "std" => "",
        "type" => "colorpicker"),
        
 		array(  
		"name" => "Gradient 2 Bottom Background Color",
        "desc" => "",
        "id" => $shortname."_grad_2_bg_bottom_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Gradient 2 Border Color",
        "desc" => "",
        "id" => $shortname."_grad_2_border_color",
        "std" => "",
        "type" => "colorpicker"),

 		array(  
		"name" => "Gradient 2 Text Color",
        "desc" => "",
        "id" => $shortname."_grad_2_text_color",
        "std" => "",
        "type" => "colorpicker"), 
 
 		array("type" => "divider"),
 		
  		array(  
		"name" => "Input Boxes Top Background Color",
        "desc" => "",
        "id" => $shortname."_input_bg_top_color",
        "std" => "",
        "type" => "colorpicker"),        

  		array(  
		"name" => "Input Boxes Bottom Background Color",
        "desc" => "",
        "id" => $shortname."_input_bg_bottom_color",
        "std" => "",
        "type" => "colorpicker"),        

  		array(  
		"name" => "Input Text Background Colour",
        "desc" => "",
        "id" => $shortname."_input_text_color",
        "std" => "",
        "type" => "colorpicker"),  
        
  		array(  
		"name" => "Input Boxes Border Colour",
        "desc" => "",
        "id" => $shortname."_input_border_color",
        "std" => "",
        "type" => "colorpicker"),

		array("type" => "close"),
		
array(	"name" => "Font Settings",
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_font_settings"),

		array(  
		"name" => "Cufon Fonts",
        "desc" => "Check fonts to enable.",
        "id" => $shortname."_cufon_fonts",
        "type" => "header"),
        
		array(  
		"name" => "",
        "desc" => "<span class=\"chunkfive\">Chunk Five</span>",
        "id" => $shortname."_chunkfive",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
        "desc" => "<span class=\"journal\">Journal</span>",
        "id" => $shortname."_journal",
        "extras" => "multi",
        "type" => "checkbox"),
        
		array(
        "desc" => "<span class=\"leaguegothic\">League Gothic</span>",
        "id" => $shortname."_leaguegothic",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
        "desc" => "<span class=\"quicksand\">Quicksand</span>",
        "id" => $shortname."_quicksand",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
        "desc" => "<span class=\"sansation\">Sansation</span>",
        "id" => $shortname."_sansation",
        "extras" => "multi",
        "type" => "checkbox"),

		array(
        "desc" => "<span class=\"vegur\">Vegur</span>",
        "id" => $shortname."_vegur",
        "extras" => "multi",
        "type" => "checkbox"),
 
 		array("type" => "divider"),
 		
		array(
		"name" => "Cufon Replacement Code",
        "desc" => "If you want to add cufon to other text or use more than one cufon font e.g. <code>Cufon.replace(\"h1,h2,h3,h4,h5,h6\", {fontFamlily: \"Vegur\"});</code><br/><code>Cufon.replace(\"#logo-text\", {fontFamlily: \"Sansation\"});</code>",
        "id" => $shortname."_cufon_code",
        "std" => "",
        "type" => "textarea"),

		array("type" => "divider"),
		
  		array(  
		"name" => "Body Text Size",
        "desc" => "",
        "id" => $shortname."_body_text_size",
        "std" => "13",
        "type" => "dimension"),

		array("type" => "divider"),

  		array(  
		"name" => "H1 Text Size",
        "desc" => "",
        "id" => $shortname."_h1_text_size",
        "std" => "30",
        "type" => "dimension"),
        
  		array(  
		"name" => "H2 Text Size",
        "desc" => "",
        "id" => $shortname."_h2_text_size",
        "std" => "25",
        "type" => "dimension"),
        
        array(  
		"name" => "H3 Text Size",
        "desc" => "",
        "id" => $shortname."_h3_text_size",
        "std" => "20",
        "type" => "dimension"),
        
        array(  
		"name" => "H4 Text Size",
        "desc" => "",
        "id" => $shortname."_h4_text_size",
        "std" => "18",
        "type" => "dimension"),
        
        array(  
		"name" => "H5 Text Size",
        "desc" => "",
        "id" => $shortname."_h5_text_size",
        "std" => "15",
        "type" => "dimension"),
        
        array(  
		"name" => "H6 Text Size",
        "desc" => "",
        "id" => $shortname."_h6_text_size",
        "std" => "14",
        "type" => "dimension"),

		array("type" => "divider"),
		
  		array(  
		"name" => "Sidebar Heading Text Size",
        "desc" => "",
        "id" => $shortname."_sidebar_heading_text_size",
        "std" => "18",
        "type" => "dimension"),
        
  		array(  
		"name" => "Sidebar Text Size",
        "desc" => "",
        "id" => $shortname."_sidebar_text_size",
        "std" => "13",
        "type" => "dimension"),

		array("type" => "divider"),
		
  		array(  
		"name" => "Footer Heading Text Size",
        "desc" => "",
        "id" => $shortname."_footer_heading_text_size",
        "std" => "20",
        "type" => "dimension"),
        
  		array(  
		"name" => "Footer Text Size",
        "desc" => "",
        "id" => $shortname."_footer_text_size",
        "std" => "13",
        "type" => "dimension"),

  		array(  
		"name" => "Footer Copyright Text Size",
        "desc" => "",
        "id" => $shortname."_footer_copyright_text_size",
        "std" => "11",
        "type" => "dimension"),
        
		array("type" => "divider"),
		
 		array(  
		"name" => "Top Level Navigation Text Size",
        "desc" => "",
        "id" => $shortname."_nav_text_size",
        "std" => "14",
        "type" => "dimension"),
 
  		array(  
		"name" => "Dropdown Navigation Text Size",
        "desc" => "",
        "id" => $shortname."_dropdown_text_size",
        "std" => "12",
        "type" => "dimension"),

		array("type" => "divider"),
		
  		array(  
		"name" => "Contact Info Text Size",
        "desc" => "",
        "id" => $shortname."_contact_info_text_size",
        "std" => "13",
        "type" => "dimension"),

		array("type" => "divider"),
		
  		array(  
		"name" => "Breadcrumbs Text Size",
        "desc" => "",
        "id" => $shortname."_breadcrumbs_text_size",
        "std" => "11",
        "type" => "dimension"),

		array("type" => "divider"),

  		array(  
		"name" => "Meta Text Size",
        "desc" => "",
        "id" => $shortname."_meta_text_size",
        "std" => "11",
        "type" => "dimension"),
        
		array("type" => "close"),
		
array(	"name" => "Style Settings",
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_style_settings"),
		
		array(
		"name" => "Custom CSS",
        "desc" => "If you want to modify the theme style in some way add your own code here instead of editing the style sheets. <em>Note: You may have to add !important to your tags in some cases so it overwrites the default settings e.g. body {background: #000000 !important;}.</em>",
        "id" => $shortname."_custom_css",
        "std" => "",
        "height" => "yes",
        "type" => "textarea"),

		array("type" => "close"),
		
array(	"name" => "Import/Export Settings",
		"type" => "title"),

		array(	"type" => "open",
      	"id" => $shortname."_import_settings"),
      	
		array(  
		"name" => "Export",
        "id" => $shortname."_import_export",
        "type" => "import_export"),
        
		array("type" => "close"),
	
);

function mytheme_add_admin() {

    global $themename, $dirname, $themeurl, $shortname, $options;

			
    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }

                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); } }

                header("Location: themes.php?page=theme-options.php&saved=true");
                die;

        } else if( 'reset' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                delete_option( $value['id'] ); }

            header("Location: themes.php?page=theme-options.php&reset=true");
            die;

        }

		else if( 'export' == $_REQUEST['action'] ) export_settings();
		else if( 'import' == $_REQUEST['action'] ) import_settings();

    }

    add_theme_page($themename." Options", "".$themename." Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $dirname, $themeurl, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated"><p><strong>Options Saved</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated"><p><strong>Options Reset</strong></p></div>';

?>

		
<?php
echo '<link rel="stylesheet" href="'.get_bloginfo('template_url').'/lib/admin/css/admin.css" type="text/css" media="screen" />
<script type="text/javascript" src="'.get_bloginfo('template_url').'/lib/admin/js/jquery.tabs.js"></script>
<script type="text/javascript" src="'.get_bloginfo('template_url').'/lib/admin/js/jquery.color.picker.js"></script>
<script type="text/javascript" src="'.get_bloginfo('stylesheet_directory').'/js/cufon-yui.js"></script>
<script src="'.get_bloginfo('stylesheet_directory').'/js/fonts/League_Gothic_400.font.js"></script>
<script type="text/javascript" src="'.get_bloginfo('stylesheet_directory').'/js/fonts/Quicksand_Book_400-Quicksand_Bold_700-Quicksand_Book_Oblique_oblique_400-Quicksand_Bold_Oblique_oblique_700.font.js"></script>
<script type="text/javascript" src="'.get_bloginfo('stylesheet_directory').'/js/fonts/Journal_400.font.js"></script>
<script type="text/javascript" src="'.get_bloginfo('stylesheet_directory').'/js/fonts/Vegur_400-Vegur_700.font.js"></script>
<script type="text/javascript" src="'.get_bloginfo('stylesheet_directory').'/js/fonts/ChunkFive_400.font.js"></script>	
<script type="text/javascript" src="'.get_bloginfo('stylesheet_directory').'/js/fonts/Sansation_400-Sansation_700.font.js"></script>
<script type="text/javascript">
Cufon.replace(".chunkfive", {fontFamily: "ChunkFive"});
Cufon.replace(".journal", {fontFamily: "Journal"});
Cufon.replace(".leaguegothic", {fontFamily: "League Gothic"});
Cufon.replace(".quicksand", {fontFamily: "Quicksand Book"});
Cufon.replace(".sansation", {fontFamily: "Sansation"});
Cufon.replace(".vegur", {fontFamily: "Vegur"});
</script>
';
?>

<div id="theme-options-container" class="wrap">
	
<?php screen_icon('options-general'); ?>
<h2><?php echo $themename; ?> Options</h2>

<ul id="theme-option-links">
	<li><a href="<?php echo $themeurl; ?>" target="_blank">Theme Updates</a></li>
	<li><a href="http://www.ghostpool.com/help/<?php echo $dirname; ?>/help.html" target="_blank">Documentation</a></li>
	<li><a href="http://www.themeforest.net/user/GhostPool/portfolio?ref=GhostPool" target="_blank">More Themes</a></li>
</ul>

<form method="post">
	
<div class="theme-buttons-top submit">	
	<input name="save" type="submit" value="Save changes" />
	<input type="hidden" name="action" value="save" />
</div>

<div class="clear"></div>

<div id="panels">

<?php foreach ($options as $value) {
switch ( $value['type'] ) {
case "open":
?>

<?php break;
case "close":
?>

</div>

<?php break;
case "title":
?>

	<div class="panel option-tab" title="<?php echo $value['name']; ?>">

<?php break;
case "header":
?>

	<div class="option option-header">
		<h3><?php echo $value['name']; ?></h3>
		<div class="option-desc"><?php echo $value['desc']; ?></div>
	</div>

<?php break;
case "divider":
?>

<div class="divider"></div>

<?php break;
case 'text':
?>
	
	<div class="option">
		<h3><?php echo $value['name']; ?></h3>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" class="theme-input" />
		<?php if($value['extras'] == "uploadbutton") { ?><a href="media-upload.php?post_id=&amp;type=image&amp;TB_iframe=true&amp;width=640&amp;height=500" id="add_image" class="thickbox button" title='Add an Image' onclick="return false;">Get Image</a><?php } ?>
		<div class="option-desc"><?php echo $value['desc']; ?></div>
	</div>

<?php break;
case 'text_small':
?>

	<div class="option">
		<h3><?php echo $value['name']; ?></h3>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" class="theme-input text-small" />
		<div class="option-desc"><?php echo $value['desc']; ?></div>
	</div>

<?php break;
case 'dimension':
?>
	
	<div class="option dimensions">
		<h3><?php echo $value['name']; ?></h3>
		<input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="text" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" class="theme-input" /><span>px</span>
		<div class="option-desc"><?php echo $value['desc']; ?></div>
	</div>

<?php
break;

case 'textarea':
?>

	<div class="option">
		<h3><?php echo $value['name']; ?></h3>
		<textarea name="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" cols="" rows="" class="theme-textarea<?php if($value['height'] == "yes") { ?> large-textarea<?php } ?>"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes(get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea>
		<div class="option-desc"><?php echo $value['desc']; ?></div>
	</div>

<?php
break;
case 'select':
?>
	
	<div class="option">
		<h3><?php echo $value['name']; ?></h3>
		<select class="theme-select" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>"><?php foreach ($value['options'] as $option) { ?><option value="<?php echo $option; ?>" <?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option><?php } ?></select>
		<div class="option-desc"><?php echo $value['desc']; ?></div>
	</div>

<?php
break;
case "checkbox":
?>
   
<div class="option <?php if($value['extras'] == "multi") { ?>multi-checkbox<?php } ?>">
	<h3><?php echo $value['name']; ?></h3>
	<? if(get_settings($value['id'])){ $checked = "checked=\"checked\""; }else{ $checked = ""; } ?><input class="theme-checkbox" type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
	<div class="theme-checkbox-desc"><?php echo $value['desc']; ?></div>
</div>

<?php        
break;
case "radio":
?>

	<div class="option">
		<h3><?php echo $value['name']; ?></h3>	
		<?php foreach ($value['options'] as $key=>$option) {
		$radio_setting = get_option($value['id']);
		if($radio_setting != ''){
			if ($key == get_option($value['id']) ) {
				$checked = "checked=\"checked\"";
				} else {
					$checked = "";
				}
		}else{
			if($key == $value['std']){
				$checked = "checked=\"checked\"";
			}else{
				$checked = "";
			}
		}?>
			<div class="theme-radio-wrapper">
			<input type="radio" name="<?php echo $value['id']; ?>" id="<?php echo $value['id'] . $key; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><label for="<?php echo $value['id'] . $key; ?>"><?php echo $option; ?></label>
			</div>	
		<?php } ?>
		<div class="option-desc"><?php echo $value['desc']; ?></div>
	</div>

<?php        
break;
case "colorpicker":
?>

  <div class="option option-colorpicker">
    <h3><?php echo $value['name']; ?></h3>
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
      <div class="option-desc">Click the text box for color picker.</div>
    </div>
  </div>


<?php        
break;
case "import_export":
?>

	</form>

	<div class="option submit">
	
		<h3>Import Theme Settings</h3>
		<div class="option-desc">If you have a back up of your theme settings you can import them below.</div>
		
		<form method="post" enctype="multipart/form-data">
		<p><input type="file" name="file" id="file" />
		<input type="submit" name="import" value="Upload" /></p>
		<input type="hidden" name="action" value="import" />
		</form>
	
	</div>
	
	<div class="divider"></div>
	
	<div class="option submit">
	
		<h3>Export Theme Settings</h3>
		<div class="option-desc">If you want to create a back up of all your theme settings click the Export button below. <em>Note: This option only backs up your theme settings and not your post/page data.</em></div>
		
		<form method="post">
		<p><input name="export" type="submit" value="Export Theme Settings" /></p>
		<input type="hidden" name="action" value="export" />
		</form>	
	
	</div>

<?php        
break;
}}
?>

</div>

<div class="clear"></div>

<div class="theme-buttons-bottom submit">
	
	<form method="post" onSubmit="if(confirm('Are you sure you want to reset all the theme settings?')) return true; else return false;">
	<input name="reset" type="submit" value="Reset" />
	<input type="hidden" name="action" value="reset" />
	</form>

</div>

<div class="clear"></div>

<?php } 

if (function_exists('wp_enqueue_style')) {
	wp_enqueue_script('jquery-ui-core');
	wp_enqueue_script('jquery-ui-sortable');		
	wp_enqueue_script('thickbox');
	wp_enqueue_style('thickbox');
}

add_action('admin_menu', 'mytheme_add_admin'); 

// Export Theme Settings
function export_settings() {
	global $options;
	header("Cache-Control: public, must-revalidate");
	header("Pragma: hack");
	header("Content-Type: text/plain");
	header('Content-Disposition: attachment; filename="theme-options-'.date("dMy").'.dat"');
	foreach ($options as $value) $theme_settings[$value['id']] = get_settings( $value['id'] );	
	echo serialize($theme_settings);
}

// Import Theme Settings
function import_settings() {
	global $options;
	if ($_FILES["file"]["error"] > 0) {
		echo "Error: " . $_FILES["file"]["error"] . "<br />";
	} else {
		$rawdata = file_get_contents($_FILES["file"]["tmp_name"]);		
		$theme_settings = unserialize($rawdata);		
		foreach ($options as $value) {
			if ($theme_settings[$value['id']]) {
				update_option( $value['id'], $theme_settings[$value['id']] );
				$$value['id'] = $theme_settings[$value['id']];
			} else {
				if ($value['type'] == 'checkbox_multiple') $$value['id'] = array();
				else $$value['id'] = $value['std'];
			}
		}
		
	}
	if (in_array('cacheStyles', get_option('theme_misc'))) cache_settings();
	wp_redirect($_SERVER['PHP_SELF'].'?page=theme-options.php');
}

?>