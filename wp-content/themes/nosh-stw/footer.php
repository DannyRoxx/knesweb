   
 <footer class="footer">
<div class="container-fluid">
<div class="mx-5 row">
<div class="col-lg-4 section" id="footer" name="Footer 1">
<div class="widget">
<?php 

if ( has_nav_menu( 'footerMenu1' ) ) {

wp_nav_menu(array(
   'theme_location' => 'footerMenu1',
));

}

?>
</div></div>
<div class="col-lg-4 section" id="footer2" name="Footer 2">
<div class="widget" >
<?php 
if ( has_nav_menu( 'footerMenu2' ) ) {

wp_nav_menu(array(
   'theme_location' => 'footerMenu2',
));

}
?>
</div></div>
<div class="col-lg-4 no-items section" id="footer3" name="Footer 3">
<?php 
if ( has_nav_menu( 'footerMenu3' ) ) {

wp_nav_menu(array(
   'theme_location' => 'footerMenu3',
));

}
?>
</div>
</div>
</div>
<div class="credits p-5">
<div class="copyright">
<span> <?php echo esc_html( '&copy;' ) ." ". get_bloginfo(); ?> </span> 
<span id="cpyear"><?php echo date_i18n( esc_html__( 'Y', 'nosh-stw' )); ?></span>
</div>
<div class="designby">
<?php esc_html_e( 'WordPress Theme by', 'nosh-stw' ); ?> <a href="<?php echo esc_url( '//scratchtheweb.com' ); ?>" target="_blank"> <img src="data:image/png;base64,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"/> </a>
</div>
</footer>
   <?php wp_footer(  ); ?>
   </body>
</html>