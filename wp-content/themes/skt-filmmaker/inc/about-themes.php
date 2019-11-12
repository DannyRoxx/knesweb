<?php
//about theme info
add_action( 'admin_menu', 'skt_filmmaker_abouttheme' );
function skt_filmmaker_abouttheme() {    	
	add_theme_page( esc_html__('About Theme', 'skt-filmmaker'), esc_html__('About Theme', 'skt-filmmaker'), 'edit_theme_options', 'skt_filmmaker_guide', 'skt_filmmaker_mostrar_guide');   
} 
//guidline for about theme
function skt_filmmaker_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
?>
<div class="wrapper-info">
	<div class="col-left">
   		   <div class="col-left-area">
			  <?php esc_attr_e('Theme Information', 'skt-filmmaker'); ?>
		   </div>
          <p><?php esc_attr_e('Filmmaker is a videographer, wedding shoots, modelling portfolio, outdoor media, movie, TV, fashion show, online video store, cinema reviews, photographer to showcase their work. Simple, flexible, customizable. WooCommerce, contact form compatible.','skt-filmmaker'); ?></p>
		  <a href="<?php echo esc_url(SKT_FILMMAKER_SKTTHEMES_PRO_THEME_URL); ?>"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/free-vs-pro.png" alt="" /></a>
	</div><!-- .col-left -->
	<div class="col-right">			
			<div class="centerbold">
				<hr />
				<a href="<?php echo esc_url(SKT_FILMMAKER_SKTTHEMES_LIVE_DEMO); ?>" target="_blank"><?php esc_attr_e('Live Demo', 'skt-filmmaker'); ?></a> | 
				<a href="<?php echo esc_url(SKT_FILMMAKER_SKTTHEMES_PRO_THEME_URL); ?>"><?php esc_attr_e('Buy Pro', 'skt-filmmaker'); ?></a> | 
				<a href="<?php echo esc_url(SKT_FILMMAKER_SKTTHEMES_THEME_DOC); ?>" target="_blank"><?php esc_attr_e('Documentation', 'skt-filmmaker'); ?></a>
                <div class="space5"></div>
				<hr />                
                <a href="<?php echo esc_url(SKT_FILMMAKER_SKTTHEMES_THEMES); ?>" target="_blank"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/sktskill.jpg" alt="" /></a>
			</div>		
	</div><!-- .col-right -->
</div><!-- .wrapper-info -->
<?php } ?>