<?php
// File Security Check
if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && basename( __FILE__ ) == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
    die ( 'You do not have sufficient permissions to access this page!' );
}
?>
<?php
/**
 * Template Name: Homepage
 *
 * The home page template displays the "home-style" template on a sub-page. 
 *
 * @package WooFramework
 * @subpackage Template
 */

 get_header();
 global $woo_options;
 global $paged;
if(isset($_GET['style']) && $_GET['style']=='grid')
{
?>
<?php woo_content_before(); ?>
 		<div id="content" class="col-full XX 31tt">
    	
    	<div id="main-sidebar-container">   
		 
     <!-- #main Starts -->
            <?php woo_main_before(); ?>
            <div id="main" class="col-left home-tempTs">
			
			<?php 
				if (is_page('19410') || is_page('19336')) { 
			//	echo do_shortcode('[custom_type_slider_sc post_type="directory_listing" version="1" orderby="name" order="desc" categories="feat" taxonomy="recipe_type" per_page="-1"]');
$thispage = $post->ID; 
if($thispage == 19336) {  			
				query_posts('post_type=directory_listing&listing_category=2513');
				$args = array (
				'post_type'=>'directory_listing',
				'tax_query' => array(
							array(
								'taxonomy' => 'listing_category',
								'field' => 'id',
								'terms' => 2513
							)
				));
} else {
				query_posts('post_type=directory_listing&listing_category=-2513');
				$args = array (
				'post_type'=>'directory_listing',
				'tax_query' => array(
							array(
								'taxonomy' => 'listing_category',
								'field' => 'id',
								'terms' => 2513,
								'operator' => 'NOT IN'
							)
				));
}

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
<?PHP if($thispage == 19336) { ?>           
    				<p class="feat-rec 11"><?php _e('Featured Classes', 'woothemes') ?></p>
<?php } else { ?>                    
					<p class="feat-rec 12"><?php _e('Featured Stores', 'woothemes') ?></p>                    
<?php } ?>                    
                    
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

	} elseif(is_page(array(18488, 24365, 22978))) {
				//echo do_shortcode('[custom_type_slider_sc post_type="incsub_event" version="1" orderby="name" order="desc" categories="feat" taxonomy="recipe_type" per_page="-1"]');	
				query_posts('post_type=incsub_event&eab_events_category=fundraiser-2');
				$args = array('post_type' => 'incsub_event');
            echo " <section class='slider'> 
       <div class='fxslider '>
<div class='sh-banner'></div> 
          <ul class='slides'>
           "; 

	   
           
                        $li_slider_query = new WP_Query( $args );
// echo '=============='.$li_slider_query->request;						
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
    				<p class="feat-rec 21">Featured Events</p>
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
     <?php wp_reset_query();
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	  } elseif(is_page(array(19439, 19430))) { 
	 
$thispage = $post->ID;	 
	 if($thispage == 19439) {  			
				query_posts('post_type=tools_tips&tip_type=2513');
				$args = array (
				'post_type'=>'tools_tips',
				'tax_query' => array(
							array(
								'taxonomy' => 'tip_type',
								'field' => 'id',
								'terms' => 2530
							)
				));
} else {
				query_posts('post_type=tools_tips&tip_type=2513');
				$args = array (
				'post_type'=>'tools_tips',
				'tax_query' => array(
							array(
								'taxonomy' => 'tip_type',
								'field' => 'id',
								'terms' => 2529
							)
				));
}

echo "<section class='slider'> 
<div class='fxslider'>
<div class='sh-banner'></div> 
<ul class='slides'>";          

$li_slider_query = new WP_Query( $args );
if ( $li_slider_query->have_posts() ) 
global $post;
while ( $li_slider_query->have_posts() ) : 
$li_slider_query->the_post();

if(has_post_thumbnail($post->ID)) 
				{
				
echo "<li>"; ?>
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
<?PHP if($thispage == 19439) { ?>            
    				<p class="feat-rec 13 <?=$post->ID;?>"><?php _e('Featured Cooking Tips', 'woothemes') ?></p>
<?php } else { ?>                    
					<p class="feat-rec 14 <?=$post->ID;?>"><?php _e('Featured Cooking Tools', 'woothemes') ?></p>                    
<?php } ?> 
<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="box-info-list">
<div class="rating">
<?php the_recipe_rating($post->ID); ?>
<span class="avgRating"><?php echo get_avg_rating($post->ID); ?> of 5</span>
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
<?php } endwhile; ?>
</ul>
</div>
</section>
<?php wp_reset_query(); } 























elseif(is_page(19428)) {
				//echo do_shortcode('[custom_type_slider_sc post_type="incsub_event" version="1" orderby="name" order="desc" categories="feat" taxonomy="recipe_type" per_page="-1"]');	
				query_posts('post_type=culinary_travel&eab_events_category=fundraiser-2');
				$args = array('post_type' => 'culinary_travel');
            echo " <section class='slider'> 
       <div class='fxslider '>
<div class='sh-banner'></div> 
          <ul class='slides'>
           "; 

	   
           
                        $li_slider_query = new WP_Query( $args );
// echo '=============='.$li_slider_query->request;						
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
    				<p class="feat-rec 21">Featured Travels</p>
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
     <?php wp_reset_query();

	  } 
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
?>
			
<?php woo_loop_before();?>
              
            		<?php wp_reset_query(); ?>
			    <div class="orderby tesr">
	            	<form class="recipe-ordering"  method="post" id="order">
					    <button type="submit" name="asc"  title="Ascending"><i class="icon-double-angle-up"></i> </button>
					  <button type="submit" name="desc" value="desc" title="Descending"><i class="icon-double-angle-down" ></i> </button>
					 
					  <select name="select">
					    <option value="Select Option">Sort by</option>
					 <option value="_sr_post_rating">Rating</option>
					   
					    <option value="name">Name</option>
					    <option value="comment_count">Popular</option>

					  </select>
					
					</form>
				</div>
				<div class="recipe-title">
					<h1 class="title"><?php the_title(); ?> </h1> 
            	</div>
            		<?php
					 if (have_posts()) : $count = 0; ?>
					
            <?php    while (have_posts())  { the_post(); $count++;  
                       the_content(); 
						 
					 
						 
						 echo do_shortcode('[post_edit]'); ?>               
                                                   
		<?php } ?>
						
</table> 

		           <?php  else: ?>
		<div <?php post_class(); ?>>

                	<p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>

                         </div><!-- /.post -->
            <?php endif; ?>  
				
			 

	<div class="fix"></div></div>
            <?php woo_main_after(); ?>
    
           
            <?php  get_sidebar();  ?>
    
		<!-- /#main-sidebar-container -->         
</div>
		<?php get_sidebar( 'alt' );  ?> 

 		</div><!-- /#content -->
	<?php
	 woo_content_after(); ?>
<?php
}
else
{
?> 

<!-- #content Starts -->
	<?php woo_content_before(); ?>
 		<div id="content" class="col-full XY">
 			
<div id="main-sidebar-container">    

     <!-- #main Starts -->
            <?php woo_main_before(); ?>
            <div id="main" class="sabbts">

			<?php 
				if (is_page('19410') || is_page('19336')) { 

$thispage = $post->ID; 
if($thispage == 19336) {  			
				query_posts('post_type=directory_listing&listing_category=2513');
				$args = array (
				'post_type'=>'directory_listing',
				'tax_query' => array(
							array(
								'taxonomy' => 'listing_category',
								'field' => 'id',
								'terms' => 2513
							)
				));
} else {
				query_posts('post_type=directory_listing&listing_category=-2513');
				$args = array (
				'post_type'=>'directory_listing',
				'tax_query' => array(
							array(
								'taxonomy' => 'listing_category',
								'field' => 'id',
								'terms' => 2513,
								'operator' => 'NOT IN'
							)
				));
}

echo "<section class='slider'> 
<div class='fxslider'>
<div class='sh-banner'></div> 
<ul class='slides'>";          

$li_slider_query = new WP_Query( $args );
if ( $li_slider_query->have_posts() ) 
global $post;
while ( $li_slider_query->have_posts() ) : 
$li_slider_query->the_post();

if(has_post_thumbnail($post->ID)) 
				{
				
echo "<li>"; ?>
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
<?PHP if($thispage == 19336) { ?>            
    				<p class="feat-rec 13 <?=$post->ID;?>"><?php _e('Featured Classes', 'woothemes') ?></p>
<?php } else { ?>                    
					<p class="feat-rec 14 <?=$post->ID;?>"><?php _e('Featured Stores', 'woothemes') ?></p>                    
<?php } ?> 
<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="box-info-list">
<div class="rating">
<?php the_recipe_rating($post->ID); ?>
<span class="avgRating"><?php echo get_avg_rating($post->ID); ?> of 5</span>
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
endwhile; ?>
</ul>
</div>
</section>
<?php 
wp_reset_query();
				
} elseif(is_page(array(18488, 24365, 22978)))  {
//echo do_shortcode('[custom_type_slider_sc post_type="incsub_event" version="1" orderby="name" order="desc" categories="feat" taxonomy="recipe_type" per_page="-1"]');	
$args = array('post_type' => 'incsub_event'); 
query_posts('post_type=incsub_event');

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
				
echo "<li>"; ?>
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
<p class="feat-rec 22">Featured Events</p>
<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


<div class="box-info-list">
<div class="rating">
<?php the_recipe_rating($post->ID); ?>
<span class="avgRating"><?php echo get_avg_rating($post->ID); ?> of 5</span>
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
endwhile; ?>
</ul>
</div>
</section>
<?php 
wp_reset_query(); } 

elseif(is_page(array(19439, 19430))) { 

$thispage = $post->ID;	 
	 
	 if($thispage == 19439) {  			
				query_posts('post_type=tools_tips&tip_type=2513');
				$args = array (
				'post_type'=>'tools_tips',
				'tax_query' => array(
							array(
								'taxonomy' => 'tip_type',
								'field' => 'id',
								'terms' => 2530
							)
				));
} else {
				query_posts('post_type=tools_tips&tip_type=2513');
				$args = array (
				'post_type'=>'tools_tips',
				'tax_query' => array(
							array(
								'taxonomy' => 'tip_type',
								'field' => 'id',
								'terms' => 2529
							)
				));
}

echo "<section class='slider'> 
<div class='fxslider'>
<div class='sh-banner'></div> 
<ul class='slides'>";          

$li_slider_query = new WP_Query( $args );
if ( $li_slider_query->have_posts() ) 
global $post;
while ( $li_slider_query->have_posts() ) : 
$li_slider_query->the_post();

if(has_post_thumbnail($post->ID)) 
				{
				
echo "<li>"; ?>
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
<?PHP if($thispage == 19439) { ?>            
    				<p class="feat-rec 13 <?=$post->ID;?>"><?php _e('Featured Cooking Tips', 'woothemes') ?></p>
<?php } else { ?>                    
					<p class="feat-rec 14 <?=$post->ID;?>"><?php _e('Featured Cooking Tools', 'woothemes') ?></p>                    
<?php } ?> 
<h2 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="box-info-list">
<div class="rating">
<?php the_recipe_rating($post->ID); ?>
<span class="avgRating"><?php echo get_avg_rating($post->ID); ?> of 5</span>
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
<?php } endwhile; ?>
</ul>
</div>
</section>
<?php wp_reset_query(); }













elseif(is_page(19428)) {
				//echo do_shortcode('[custom_type_slider_sc post_type="incsub_event" version="1" orderby="name" order="desc" categories="feat" taxonomy="recipe_type" per_page="-1"]');	
				query_posts('post_type=culinary_travel&eab_events_category=fundraiser-2');
				$args = array('post_type' => 'culinary_travel');
            echo " <section class='slider'> 
       <div class='fxslider '>
<div class='sh-banner'></div> 
          <ul class='slides'>
           "; 

	   
           
                        $li_slider_query = new WP_Query( $args );
// echo '=============='.$li_slider_query->request;						
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
    				<p class="feat-rec 21">Featured Travels</p>
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
     <?php wp_reset_query();

	  } 
	   ?>
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>    
         	<?php the_content(); ?>
            <?php echo do_shortcode('[post_edit]'); ?>                                                               
		<?php endwhile; wp_reset_postdata(); else: ?>
		<div <?php post_class(); ?>>
        <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
        </div><!-- /.post -->
            <?php endif; ?>
    
            </div><!-- /#main -->
            <?php woo_main_after(); ?>
            <?php get_sidebar();  ?>
    
		</div><!-- /#main-sidebar-container -->         

		<?php get_sidebar( 'alt' );  ?> 

 		</div><!-- /#content -->
	<?php woo_content_after(); ?>
<?php
}
?>
<?php get_footer(); ?>