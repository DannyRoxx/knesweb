<?php
    global $post;
    $categories   = get_the_category($post->ID);
    $category_ids = array();
    
    if ( $categories ) {
        
    	foreach($categories as $individual_category) {
            $category_ids[] = $individual_category->term_id;
    	}
    
    	$args = array(
    		'category__in'        => $category_ids,
    		'post__not_in'        => array($post->ID),
    		'posts_per_page'      => 2,
    		'ignore_sticky_posts' => 1,
    		'orderby'             => 'rand'
    	);
    
    	$single_related_posts = new WP_Query( $args );
        if( $single_related_posts->have_posts() ) { ?>
        <div class="az-single-related-posts">
            <h4 class="post-related-title"><?php esc_html_e( 'You May Also Like', 'natalielite' ); ?></h4>
            <div class="row">
            <?php while( $single_related_posts->have_posts() ) { ?>
                <?php $single_related_posts->the_post(); ?>
                <article <?php post_class( 'col-md-6' ); ?>>
                    <?php if ( $image_url = wp_get_attachment_url( get_post_thumbnail_id() ) ) { ?>
                    <div class="post-format post-standard">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                        </a>
                    </div>
                    <?php } ?>
                    <!-- Begin : Post content -->
                    <div class="post-content">
                        <p class="post-cats"><?php the_category(', '); ?></p>
                        <?php the_title( '<h4 class="post-title"><a href="'. esc_url(get_the_permalink()) .'">', '</a></h4>' ); ?>
                    </div>
                    <!-- End : Post content -->                
                </article>
            <?php } ?>
    		</div> 
        </div>
        <?php
        }
    }
    wp_reset_postdata();
?>
