<?php get_header(); ?>
<div class="container">
    <div class="archive-box">
        <h4><span><?php esc_html_e( 'Search results for', 'natalielite' ); ?>:&nbsp;</span><?php echo get_search_query(); ?></h4>
	</div>
    <div class="row">
        <div class="col-lg-8 col-xl-9">
            <?php get_template_part('loop/blog', 'standard');  ?>
        </div>
        <div class="col-lg-4 col-xl-3 sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>