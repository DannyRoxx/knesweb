        </div>
    </div>
    <section id="footer">        
        <?php if ( is_active_sidebar('footer-sidebar') ) : ?>
        <div class="instagram-footer">
            <?php dynamic_sidebar('footer-sidebar'); ?>
        </div>
        <?php endif; ?>
        <div class="container">
            <div class="social-footer">
                <?php if(get_theme_mod('natalielite_facebook')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_facebook') ); ?>" target="_blank"><i class="fab fa-facebook"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Facebook', 'natalielite'); ?></span></a><?php endif; ?>
                <?php if(get_theme_mod('natalielite_twitter')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_twitter') ); ?>" target="_blank"><i class="fab fa-twitter"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Twitter', 'natalielite'); ?></span></a><?php endif; ?>
    			<?php if(get_theme_mod('natalielite_instagram')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_instagram') ); ?>" target="_blank"><i class="fab fa-instagram"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Instagram', 'natalielite'); ?></span></a><?php endif; ?>
    			<?php if(get_theme_mod('natalielite_pinterest')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_pinterest') ); ?>" target="_blank"><i class="fab fa-pinterest"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Pinterest', 'natalielite'); ?></span></a><?php endif; ?>
    			<?php if(get_theme_mod('natalielite_bloglovin')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_bloglovin') ); ?>" target="_blank"><i class="fas fa-heart"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Bloglovin', 'natalielite'); ?></span></a><?php endif; ?>
    			<?php if(get_theme_mod('natalielite_tumblr')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_tumblr') ); ?>" target="_blank"><i class="fab fa-tumblr"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Tumblr', 'natalielite'); ?></span></a><?php endif; ?>
    			<?php if(get_theme_mod('natalielite_youtube')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_youtube') ); ?>" target="_blank"><i class="fab fa-youtube"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Youtube', 'natalielite'); ?></span></a><?php endif; ?>
    			<?php if(get_theme_mod('natalielite_dribbble')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_dribbble') ); ?>" target="_blank"><i class="fab fa-dribbble"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Dribbble', 'natalielite'); ?></span></a><?php endif; ?>
    			<?php if(get_theme_mod('natalielite_soundcloud')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_soundcloud') ); ?>" target="_blank"><i class="fab fa-soundcloud"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Soundcloud', 'natalielite'); ?></span></a><?php endif; ?>
    			<?php if(get_theme_mod('natalielite_vimeo')) : ?><a class="social-icon" href="<?php echo esc_url( get_theme_mod('natalielite_vimeo') ); ?>" target="_blank"><i class="fab fa-vimeo-square"></i><span class="text">&nbsp;&nbsp;<?php esc_html_e('Vimeo', 'natalielite'); ?></span></a><?php endif; ?>
                <?php if(get_theme_mod('natalielite_linkedin')) : ?><a href="<?php echo esc_url( get_theme_mod('natalielite_linkedin') ); ?>" target="_blank"><i class="fab fa-linkedin"></i><span>&nbsp;&nbsp;<?php esc_html_e('LinkedIn', 'natalielite'); ?></span></a><?php endif; ?>
            </div>
        </div>        
        <div class="copyright"><?php echo esc_html( get_theme_mod('natalielite_footer_copyright') ); ?></div>
    </section>
    <?php wp_footer(); ?>
</div>
</body>
</html>