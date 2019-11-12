<?php

function stw_nosh_admin_menus(){

    $stw_theme_info = add_theme_page('NOSH Theme Info','Theme Info','edit_theme_options','nosh_theme_info',
    'stw_nosh_theme_opts_page');

    add_action( 'load-' . $stw_theme_info, 'stw_theme_info_hook' );
}


function stw_nosh_theme_opts_page(){
    ?>
    <!-- Create a header in the default WordPress 'wrap' container -->
    <div class="wrap stw-theme-info-wrapper">

    <?php
   
        $active_tab = isset( $_GET[ 'tab' ] ) ? $_GET[ 'tab' ] : 'getting_started';
    
    ?>

    <h1 class="stw-theme-info-title"><?php echo sprintf( __( 'Welcome to Nosh STW v%s', 'nosh-stw' ), esc_html( wp_get_theme()->version ) ); ?></h1>
    <p class="stw-theme-info-welcome-desc"><?php esc_html_e( 'Nosh STW is now active in your WordPress site. Check out related links and other helpful resources for this theme.', 'nosh-stw' ); ?>
    
     <h2 class="nav-tab-wrapper">
         <a href="?page=nosh_theme_info&tab=getting_started" class="nav-tab <?php echo $active_tab == 'getting_started' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Getting Started', 'nosh-stw' ); ?></a>
         <a href="?page=nosh_theme_info&tab=pro_version" class="nav-tab <?php echo $active_tab == 'pro_version' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'PRO Version', 'nosh-stw' ); ?></a>
         <a href="?page=nosh_theme_info&tab=support" class="nav-tab <?php echo $active_tab == 'support' ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( 'Support', 'nosh-stw' ); ?></a>
     </h2>

     <div class="nav-tab-content">

     <?php
     if($active_tab == 'getting_started'){
         ?>
        <div class="stw-theme-info-tab">
            <span class="dashicons dashicons-book-alt dashicons-large"></span>
            <h3><?php esc_html_e( 'Documentation', 'nosh-stw' ); ?></h3>
            <p><?php esc_html_e( 'Check out our documentation to get the theme setup and running in no time.', 'nosh-stw' ); ?></p>
            <p><a class="button button-primary button-large" href="https://scratchtheweb.com/community/theme-documentations/nosh-wordpress-theme-documentation/" target="_blank"><?php esc_html_e( 'Documentation', 'nosh-stw' ); ?></a></p>
            <hr>
            <span class="dashicons dashicons-admin-customizer dashicons-large"></span>
            <h3><?php esc_html_e( 'Customize', 'nosh-stw' ); ?></h3>
            <p><?php esc_html_e( 'Use the Customizer to make changes on your own.', 'nosh-stw' ); ?></p>
            <p><a class="button button-primary button-large" href="<?php echo admin_url( 'customize.php' ); ?>"><?php esc_html_e( 'Go to Customizer', 'nosh-stw' ); ?></a></p>
        </div>

        <?php
     }

     if($active_tab == 'pro_version'){
     ?>
        <div class="stw-theme-info-tab">
				<table class="widefat fixed featuresList"> 
				   <thead> 
					<tr> 
					 <td><strong><h3><?php esc_html_e( 'Feature', 'nosh-stw' ); ?></h3></strong></td>
					 <td style="width:20%;text-align:center;"><strong><h3><?php esc_html_e( 'Nosh STW Free', 'nosh-stw' ); ?></h3></strong></td>
					 <td style="width:20%;text-align:center;"><strong><h3><?php esc_html_e( 'Nosh STW Pro', 'nosh-stw' ); ?></h3></strong></td>
					</tr> 
				   </thead> 
				   <tbody>
                   <tr> 
					 <td><?php esc_html_e( 'Responsive', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
                    </tr> 
                    <tr> 
					 <td><?php esc_html_e( 'Translation ready', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Social Media Icons', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
                    </tr> 
                    <tr> 
					 <td><?php esc_html_e( 'Customize Colors', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
                    </tr> 
                    <tr> 
					 <td><?php esc_html_e( 'Featured Posts Slider', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-no dash-red"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Colorful Social Media Icons', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-no dash-red"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
                    </tr> 
                    <tr> 
					 <td><?php esc_html_e( 'Advanced Color Options', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
                    </tr> 
                    <tr> 
					 <td><?php esc_html_e( 'Background Image', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-no dash-red"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Footer Widgets', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-no dash-red"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Edit Footer Credits', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
					<tr> 
					 <td><?php esc_html_e( 'Priority support', 'nosh-stw' ); ?></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					 <td class="stw-theme-feature-stats"><span class="dashicons dashicons-yes dash-green"></span></td>
					</tr> 
				   </tbody> 
				  </table>
				  <p style="text-align: center;"><a class="button button-primary button-large" href="https://scratchtheweb.com/product/responsive-free-wordpress-theme-nosh/"><?php esc_html_e('Buy Nosh STW Pro (Coming Soon)', 'nosh-stw'); ?></a></p>
				</div>	

<?php
     }

     if($active_tab == 'support'){
     ?>

    <div class="stw-theme-info-tab stw-theme-info-support">
        <span class="dashicons dashicons-sos dashicons-large"></span>
        <h3><?php esc_html_e( 'Visit our forums', 'nosh-stw' ); ?></h3>
        <p><?php esc_html_e( 'Need help? Go ahead and visit our support forums and we\'ll be happy to assist you with any theme related questions you might have', 'nosh-stw' ); ?></p>
        <a class="button button-primary button-large"  href="https://scratchtheweb.com/community/" target="_blank"><?php esc_html_e( 'Visit the forums', 'nosh-stw' ); ?></a>
        <hr>
        <span class="dashicons dashicons-book-alt dashicons-large"></span>
        <h3><?php esc_html_e( 'Documentation', 'nosh-stw' ); ?></h3>
        <p><?php esc_html_e( 'Our documentation can help you learn how to setup the theme and also answers FAQs.', 'nosh-stw' ); ?></p>
        <a class="button button-primary button-large" href="https://scratchtheweb.com/community/theme-documentations/nosh-wordpress-theme-documentation/" target="_blank"><?php esc_html_e( 'Read the Documentation', 'nosh-stw' ); ?></a>
        
        <hr>
        <span class="dashicons dashicons-clipboard dashicons-large"></span>
        <h3><?php esc_html_e( 'Feature Request', 'nosh-stw' ); ?></h3>
        <p><?php esc_html_e( 'Got any ideas that you would like us to implement in future version? Feel free to let us know.', 'nosh-stw' ); ?></p>
        <a class="button button-primary button-large" href="https://scratchtheweb.com/community/wordpress-help-forum/" target="_blank"><?php esc_html_e( 'Post your idea', 'nosh-stw' ); ?></a>
 
        
    </div>


        <?php
     }
     ?>
    </div>
      
    
      
 </div><!-- /.wrap -->
    <?php }
    
function stw_theme_info_hook(){
    add_action( 'admin_enqueue_scripts', 'stw_theme_info_page_styles_scripts' );
}

function stw_theme_info_page_styles_scripts(){
    wp_enqueue_style( 'stw-theme-info-style', get_template_directory_uri() . '/assets/css/theme-info.css', array(), true );
}
    
?>