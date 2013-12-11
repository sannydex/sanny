<?php

require(ghostpool_inc . 'options.php');

/*************************** Default Sidebars ***************************/
	
register_sidebar(array('name'=>'Default Sidebar', 'id'=>'default',
	'before_widget' => '<div id="%1$s" class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'));
   
register_sidebar(array('name'=>'Footer 1', 'id'=>'footer-1',
	'before_widget' => '<div id="%1$s" class="footer-widget-inner">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'));        

register_sidebar(array('name'=>'Footer 2', 'id'=>'footer-2',
	'before_widget' => '<div id="%1$s" class="footer-widget-inner">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'));   
	
register_sidebar(array('name'=>'Footer 3', 'id'=>'footer-3',
	'before_widget' => '<div id="%1$s" class="footer-widget-inner">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'));   
	
register_sidebar(array('name'=>'Footer 4', 'id'=>'footer-4',
	'before_widget' => '<div id="%1$s" class="footer-widget-inner">',
	'after_widget' => '</div>',
	'before_title' => '<h3>',
	'after_title' => '</h3>'));  


/*************************** Create Sidebars ***************************/

global $wpdb,$num_sidebars;

$querystr = "
    SELECT wposts.*
    FROM $wpdb->posts wposts, $wpdb->postmeta wpostmeta
    WHERE wposts.ID = wpostmeta.post_id
    AND wpostmeta.meta_key = 'pgopts'
 ";

$pageposts = $wpdb->get_results($querystr, OBJECT);

if ($pageposts):
	foreach ($pageposts as $post):
		$data = get_post_meta( $post->ID, 'pgopts', true );
	endforeach;
endif;

if($theme_new_sidebars) {
	$theme_new_sidebars;
} else {
	$theme_new_sidebars = "1";
}

$i=1; 

while($i<=$theme_new_sidebars)
{

	register_sidebar(array('name'=>'Sidebar '.$i, 'id'=>'sidebar-'.$i,
	'before_widget' => '<div id="%1$s" class="widget">',
	'after_widget' => '</div>',	
	'before_title' => '<h3>',
	'after_title' => '</h3>'));

$i++;
}
	
?>