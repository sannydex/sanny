<div class="footer_panel">
	<div class="maincontaner footer">
    	<p class="alignleft">COPYRIGHT &copy; 2002-2013 Han Book Club. All Rights Reserved.<br/>

Design and Developed by <a href="http://dexusa.com/" title="Dexusa" target="_blank">DEXUSA</a>
 </p>
<?php if(has_nav_menu('Footer')):?>
			<?php wp_nav_menu( array(
'theme_location' => 'Footer',
'menu' => 'Footer Navigation',
'container' => false, 
'container_id' => false,
'menu_class' => 'floatright', 
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
<?php wp_footer(); ?>

<script>
jQuery(document).ready(function(){
jQuery('form.login').css('display', 'block');
});
</script>

</body>
</html>