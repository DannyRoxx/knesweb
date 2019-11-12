<?php
    get_header();
?>
    <div class="row">
        <div class="col-lg-8 col-xl-9">
            <?php get_template_part('loop/blog', 'standard');  ?>
        </div>
        <div class="col-lg-4 col-xl-3 sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
<?php get_footer(); ?>
