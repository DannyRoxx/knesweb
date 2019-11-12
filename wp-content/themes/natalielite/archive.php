<?php get_header(); ?>
<div id="main">
    <?php if ( get_theme_mod('natalielite_archive_title', 'on') == 'on' ) { ?>
    <div class="archive-box">
        <?php if ( is_category() ) : ?>            
    	    <h4><span><?php esc_html_e('Browsing Category', 'natalielite'); ?>: </span><?php echo single_cat_title(); ?></h4>
        <?php elseif ( is_tag() ) : ?>            
    		<h4><span><?php esc_html_e('Browsing Tag', 'natalielite'); ?>: </span><?php echo single_tag_title(); ?></h4>
        <?php elseif ( is_author() ) : ?>
            <span><?php esc_html_e('All Posts By', 'natalielite'); ?>: </span>
    		<h4><?php the_post(); echo get_the_author(); ?></h4>
        <?php else : ?>
    		<?php if ( is_day() ) : ?>    		
            <h4><span><?php esc_html_e('Daily Archives', 'natalielite'); ?>: </span><?php echo get_the_date(); ?></h4>            
            <?php elseif ( is_month() ) : ?>            
            <h4><span><?php esc_html_e('Monthly Archives', 'natalielite'); ?>: </span><?php echo get_the_date( _x( 'F Y', 'monthly archives date format', 'natalielite' ) ); ?></h4>            
            <?php elseif ( is_year() ) : ?>            
    		<h4><span><?php esc_html_e('Yearly Archives', 'natalielite'); ?>: </span><?php echo get_the_date( _x( 'Y', 'yearly archives date format', 'natalielite' ) ); ?></h4>			
            <?php else : ?>
                <h4><?php esc_html_e('Archives', 'natalielite'); ?>: </h4>
    		<?php endif; ?>
        <?php endif; ?>
    </div>
    <?php } ?>
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
