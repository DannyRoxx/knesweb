<?php if ( !get_theme_mod('natalielite_post_hide_date_time') ) { ?>
<div class="post-meta">
    <a href="<?php the_permalink(); ?>"><?php echo get_the_date(); ?></a>
</div>
<?php } ?>