<?php get_header(); ?>
    <div class="az-single-has-sidebar">
        <div class="row">
            <div class="col-lg-8 col-xl-9">
            <?php
                while ( have_posts() ) {
                    the_post();
                    get_template_part('template-parts/content');
                }
            ?>
            </div>
            <div class="col-lg-4 col-xl-3 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>
