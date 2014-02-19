<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Blog Elegant
 *
 * The blog page template displays the "blog-style" template on a sub-page. 
 *
 * @package WooFramework
 * @subpackage Template
 */

 get_header();
 global $woo_options;
 ?>      
    <!-- #content Starts -->
	<?php woo_content_before(); ?>
    <div id="content" class="col-full">
    
    	<div id="main-sidebar-container">    
		<style>
		.page-template-template-blog-elegant-php .entry { width:100% !important;}
		.page-template-template-blog-elegant-php .elegant-post-meta{ display:none !important;}
		.entry img, img.thumbnail, #portfolio .group.portfolio-img img {width: 120px !important; }
		.title a { color:#327E2E !important;}
		</style>
            <!-- #main Starts -->
            <?php woo_main_before(); ?>
            
         
            
            <div id="main" class="col-left">
            
  <?php 
				if (is_page('107')) { 
			//	echo do_shortcode('[custom_type_slider_sc post_type="directory_listing" version="1" orderby="name" order="desc" categories="feat" taxonomy="recipe_type" per_page="-1"]');
				query_posts('post_type=post&category_name=spotlight');
				$args = array('post_type' => 'post', 'category_name' => 'spotlight');
            echo "<section class='slider'> 
					<div class='fxslider '>
					<div class='sh-banner'></div> 
					<ul class='slides'>";          
           
                        $li_slider_query = new WP_Query( $args );
                        if ( $li_slider_query->have_posts() ) 
                        global $post;
                        while ( $li_slider_query->have_posts() ) : 
                        $li_slider_query->the_post();
						
				if(has_post_thumbnail($post->ID)) 
				{
						echo "<li>";?>


               <div id="post-<?php the_ID(); ?>">
	
			<?php 
			$terms = get_the_terms( $post->ID, 'cuisine' );
$output_cat_recipe = '';
if ( $terms && ! is_wp_error( $terms ) )  {
	$output_cat_recipe = get_the_term_list( $post->ID, 'cuisine', __('In ', 'woothemes'), ', ', '').' | '; 
}
					if(has_post_thumbnail($post->ID)) 
					{
						 
						?>
						<div class="content-full-sh-img wer1">
				 
            			<?php the_post_thumbnail('featured-thumb'); ?>

						 
						</div>
            <?php } ?>
            <div class="sh-slide">
            <div class="content-full-sh">
    				<p class="feat-rec"><?php _e('Featured Blogs', 'woothemes') ?></p>
					<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
												
						
						<div class="box-info-list">
						<div class="rating">
								<?php the_recipe_rating($post->ID); ?>
								 <span class="avgRating"><?php echo get_avg_rating($post->ID); ?> of 5</span>
								 <?php
										$cook_time = convert_to_hours(get_post_meta($post->ID, 'RECIPE_META_cook_time', true)); 												
										if(!empty($cook_time))
										{
												?>
													
													<span class="value"> <?php _e('Cook Time :','woothemes'); ?> <?php echo $cook_time; ?> </span>
												 
												<?php
										}
									?> 
						</div>
							
						</div>
						<p><?php echo word_trim(get_the_excerpt(),30,' ... '); ?><a href="<?php the_permalink(); ?>" ><?php _e('Read more', 'woothemes'); ?></a></p>

					 
						<div class="post-meta">	
						<span class="small" itemprop="datePublished"><?php _e( 'on ', 'post datetime',  'woothemes' ); ?></span> 
						<?php echo do_shortcode( '[post_date after=" |"]' ); ?>	
					 <?php echo $output_cat_recipe; ?>
						<span class="small"><?php _e( 'By', 'woothemes' ); ?> </span> <?php echo do_shortcode( '[post_author_posts_link after=" | "]' ).do_shortcode( '[post_comments]' ). do_shortcode( '[post_edit]' ); ?></div>
					 
            		 </div>
						</div>
				 
					</div>
				 </li>
		
         	<?php 
		}
      endwhile; 
      ?>
      		</ul>

        </div>  </section>
     <?php 
    wp_reset_query();

	}    ?>           
            
            
            

            
            
            
            
<div style="clear: both;float: right;margin: 0 0 20px;text-align: right;width: 100%;"><a title="Grid View" href="?style=grid"><img src="<?php bloginfo('template_url'); ?>/images/icon-grid-view.png"></a> 
<a title="List View" href="?style=list"><img width="16" height="16" src="<?php bloginfo('template_url'); ?>/images/list-view-24.gif"></a> 
</div>
<?php 
# =================================================
if($_REQUEST['style'] != 'list') { 
# =================================================
?>
           <?php
		$paged = 1;
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		$paged = intval( $paged );

		 $cpt_query_new = new WP_Query( array( 'post_type' => 'post' ,'paged' => $paged, 'posts_per_page' => '21', 'category_name' => 'spotlight', 'order' => 'ASC') );
		 // echo  $cpt_query_new->request.'======='.$cpt_query_new->found_posts;
					if ( $cpt_query_new->have_posts()) {
					$i=1;
					while ( $cpt_query_new->have_posts()) :
					$cpt_query_new->the_post(); 

					$thumb_html='';
					$link_title_to = get_permalink($post->ID);
					if ( function_exists('has_post_thumbnail') && has_post_thumbnail($post->ID) ) {
					
							 	$thumbnails = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'Grid Thumb' );
					
								if (!$thumbnails[0]){
					
									$thumb_html = '';
					
								}else{
					
									$alt = '' . attribute_escape($post->post_title) .'';
					
									$title = '' . attribute_escape($post->post_title) . '';							
					
									if(get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true)){
					
										$alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
					
										$title = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt', true);
					
									}
					
									if(get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_title', true)){
					
										$title = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_title', true);
					
										if($alt==''){
					
											$alt = get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_title', true);	
					
										}
					
									}
					
									$thumb_size_html = 'style=" ';
					
									if($thumb_height != 'false'){
					
										$thumb_size_html .= 'height:' . $thumb_height . 'px; ';
					
									}
					
									if($thumb_width != 'false'){
					
										$thumb_size_html .= 'width:' . $thumb_width . 'px; ';
					
									}
									$thumb_size_html .= ' "';
					 
					$thumb_html = '<img src="' . $thumbnails[0] . '" border="0" class="attachment-post-thumbnail wp-post-image" title="' . $title . '" alt="' . $alt . '" style="width: 170px; max-height:140px;" />';
					 
					 	
									if($thumb_link != 'false'){
									
										$link_thumb_to = '';
									
										switch($thumb_link){
									
											case 'true':
									
											if(!$link_title_to){
									
												$link_title_to = get_permalink($post->ID);
									
											}
									
											$link_thumb_to = $link_title_to;
									
											break;
									
											case 'post_index':
									
											$link_thumb_to = '#' . intval($count-1);
									
											break;
									
											case 'id':
									
											$link_thumb_to = get_post_thumbnail_id($post->ID);
									
											break;
									
											case 'src':
									
											$link_thumb_to = $thumbnails[0];
									
											break;
									
											default:
									
											$link_thumb_to = $thumb_link;
									
											break;
									
										}
									
										$thumb_html = '<a href="' . $link_title_to . '" class="cpt_item_thumb_link" style="display:block; text-align:center;">' . $thumb_html . '</a>';
									
									}
								}
								
							} else { 
							$thumb_html = '<img src="http://upcomingmedia.com/tc/wp-content/uploads/2014/01/no_image_available-190x130.gif" border="0" class="attachment-post-thumbnail wp-post-image" title="' . $title . '" alt="' . $alt . '" style="width: 145px; height:auto;" />';	
							}
 					echo '<div style="float:left;width:185px;height:201px;max-height:201px; margin: 5px;padding:5px; border: 3px solid #FFFFFF; box-shadow: 0 1px 5px 3px #CCCCCC"><a href="' . $link_title_to . '" class="cpt_item_title_link cpt_item_title_ht">'.$post->post_title.'</a><div style="width:100%;float:left;text-align:center">'.$thumb_html.'</div></div>';					
											// if($i%4 == 0)
											// {
											// }
											// else
											// {
											// echo '<div style="border-bottom: 1px solid #E1E1E1;clear: both;float: left;height: 25px;margin-bottom: 31px;width: 100%;">&nbsp;</div>';
											// break;
											// }
											// $i++;
					endwhile;					// }
					

if($query->max_num_pages > 1) {	


					
    echo '<div class="pagination woo-pagination 11">'.paginate_links( apply_filters( 'woocommerce_pagination_args', array(
      'base' 		=> str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
      'format'		=> '',
      'current'		=> max( 1, $paged ),
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
				
				echo '<div class="pagination woo-pagination asaa"><span class="page-numbers current">Page 1 of 1</span></div>';	
					
}	
	 
					
					
					} 
				?>
<?php
# =================================================			
} else {
		$paged = 1;
		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		if ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		$paged = intval( $paged );

		 $cpt_query_new = new WP_Query( array( 'post_type' => 'post' ,'paged' => $paged, 'posts_per_page' => '21', 'category_name' => 'spotlight', 'order' => 'ASC') );
// woo_get_template_part( 'loop', 'blog-elegant' ); 

while($cpt_query_new->have_posts()): $cpt_query_new->the_post(); ?>
<div class="loop post-8992 post type-post status-publish format-standard sticky hentry category-spotlight tag-moroccan-cuisine tag-moroccan-culture tag-moroccan-food-toronto instock">
<h3 class="title"><a title="<?php the_title(); ?>" rel="bookmark" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>	

<?php $addCll = ''; if(has_post_thumbnail()){ $addCll = 'n-full'; ?>
<div class="th-recipe-list bloglist">
<?php the_post_thumbnail('thumbnail'); ?>
</div>
<?php } ?>                                            
<div class="entry <?=$addCll;?>">
<?php echo wp_html_excerpt(get_the_content(),400,'[...]'); ?>
<div class="post-more">   
<span class="read-more"><a title="Read More" href="<?php the_permalink(); ?>">Read More</a> <span class="sep">→</span></span>
</div>

</div><!-- /.entry -->
</div>
<?php 
endwhile;



if($query->max_num_pages > 1) {	

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
				
				echo '<div class="pagination woo-pagination asaa"><span class="page-numbers current">Page 1 of 1</span></div>';	
					
}	
	  

}
# =================================================
?>
            
                    
            </div><!-- /#main -->
            <?php woo_main_after(); ?>
    
            <?php get_sidebar(); ?>
    
		</div><!-- /#main-sidebar-container -->         

		<?php get_sidebar( 'alt' ); ?>       

    </div><!-- /#content -->
	<?php woo_content_after(); ?>
		
<?php get_footer(); ?>