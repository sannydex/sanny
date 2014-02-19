<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Loop - Blog Elegant
 *
 * This is the loop file used on the "Blog" page template.
 *
 * @package WooFramework
 * @subpackage Template
 */
global $more; $more = 0; 

woo_loop_before();

// Fix for the WordPress 3.0 "paged" bug.
$paged = 1;
if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
$paged = intval( $paged );

$query_args = array(
					'post_type' => 'post',
					'paged' => $paged,'posts_per_page' => '21'
				);


$query_args = apply_filters( 'woo_blog_template_query_args', $query_args ); // Do not remove. Used to exclude categories from displaying here.

remove_filter( 'pre_get_posts', 'woo_exclude_categories_homepage', 10 );
global $wp_query;
$temp = $wp_query;
$wp_query = new WP_Query($query_args);

//query_posts( $query_args );

		
if ( have_posts() ) { $count = 0;
?>

<div class="fix 1122"></div>

<?php
	while ($wp_query->have_posts() ) { $wp_query->the_post(); $count++;

  	woo_get_template_part( 'content', 'elegant-post' );	

	} // End WHILE Loop
		

if($wp_query->max_num_pages > 1) {	
					
    echo '<div class="pagination woo-pagination">'.paginate_links( apply_filters( 'woocommerce_pagination_args', array(
      'base' 		=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
      'format'		=> '',
      'current'		=> max( 1, get_query_var('paged') ),
      'total'		=> $cpt_query_new->max_num_pages,
     'prev_next' => true,
			'prev_text' => __( '&larr; Previous', 'woothemes' ), // Translate in WordPress. This is the default.
			'next_text' => __( 'Next &rarr;', 'woothemes' ), // Translate in WordPress. This is the default.
			'show_all' => false,
			'end_size' => 1,
			'mid_size' => 1,
			'add_fragment' => '',
			'type' => 'plain',
			'before' => '<div class="pagination woo-pagination">', // Begin woo_pagination() arguments.
			'after' => '</div>',
			'echo' => true, 
			'use_search_permastruct' => true
    ) ) ).'</div>';
	
	
	} else {
				
				echo '<div class="pagination woo-pagination asaa lbe"><span class="page-numbers current">Page 1 of 1</span></div>';	
					
}	
	

} else {
	get_template_part( 'content', 'noposts' );
} // End IF Statement

wp_reset_query();

woo_loop_after();

?>
