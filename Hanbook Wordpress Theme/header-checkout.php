<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<link href="<?php bloginfo('stylesheet_directory'); ?>/style/slider.css" rel="stylesheet" type="text/css" />

</head>
<?php echo $GLOBALS['wp_query']->request.'==============================='; ?>

<body  <?php body_class(); ?>>
<div class="top_panel">
	<div class="maincontaner">
     <?php if (!( is_user_logged_in()) ) {?>
    	<?php if(has_nav_menu('topmenu')):?>
			<?php wp_nav_menu( array(
'theme_location' => 'topmenu',
'menu' => 'Top Navigation',
'container' => false, 
'container_id' => false,
'menu_class' => '', 
 'echo' => true,
 'before' => '',
 'after' => '',
 'link_before' => '',
 'link_after' => '',
 'depth' => 0,
 )
 );
 ?>
 
			<?php endif;?>
            <?php }else{?>
            
            <?php $tmenu1 = get_option('revchurch_tmenu1'); ?>
            <?php $tmenu2 = get_option('revchurch_tmenu2'); ?>
            <?php $tmenu3 = get_option('revchurch_tmenu3'); ?>
            
            <ul id="menu-topmenu" class=""><li id="menu-item-56" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-56"><a href="<?php echo get_settings('home'); ?>"><?php echo stripslashes($tmenu1); ?></a></li>
<li id="menu-item-125" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-125"><a href="<?php echo wp_logout_url( get_permalink() ); ?>"><?php echo stripslashes($tmenu2); ?></a></li>
<li id="menu-item-61" class="cart menu-item menu-item-type-post_type menu-item-object-page menu-item-61"><a href="<?php echo get_settings('home'); ?>/cart/"><?php echo stripslashes($tmenu3); ?></a></li>
</ul> 
            
            
            <?php }?>
    </div>
</div>


<div class="maincontaner logopanel">
<?php $logo = get_option('revchurch_logo'); ?>
  <? if($logo!=""){?>
  <a href="<?php echo get_settings('home'); ?>" class="logo"><img src="<?php echo stripslashes($logo); ?>" width="293" height="66" alt="Logo" /></a>
  <? }else {?>
 <a href="<?php echo get_settings('home'); ?>" class="logo"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/logo.png" width="293" height="66" alt="Logo" /></a>
  <? }?>
 <?php $stxt = get_option('revchurch_stxt'); ?>

    <form id="searchform" method="get" action="<?php bloginfo('home'); ?>">
     <input name="s" id="s" type="text" class="textbox" value="<?php echo stripslashes($stxt); ?>" onfocus="if(this.value=='<?php echo stripslashes($stxt); ?>')this.value='';" onblur="if(this.value=='')this.value='<?php echo stripslashes($stxt); ?>';" />
    	
        <input type="submit" class="search" />
    </form>
</div>


<div class="navigation_panel">
	<div class="maincontaner navigation">
    	<?php if(has_nav_menu('main')):?>
			<?php wp_nav_menu( array(
'theme_location' => 'main',
'menu' => 'Main Navigation',
'container' => false, 
'container_id' => false,
'menu_class' => '', 
 'echo' => true,
 'before' => '',
 'after' => '',
 'link_before' => '',
 'link_after' => '',
 'depth' => 0,
 )
 );
 ?>
 
			<?php endif;?>
    </div>
</div>

