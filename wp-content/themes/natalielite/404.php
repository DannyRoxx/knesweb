<?php get_header(); ?>
    <div class="container">
        <div id="main">
            <div class="error-page">
				<h1><?php echo esc_html__( '404', 'natalielite' ); ?></h1>
				<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'natalielite' ); ?></p>
				<?php get_search_form(); ?>
			</div>
        </div>
    </div>
<?php get_footer(); ?>