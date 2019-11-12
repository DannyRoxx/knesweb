<?php 

get_header( );
?>

<div class="container mainarea mtpx">
<div class="row" id="content">
<main class="blog-content item-view <?php if(is_active_sidebar('stw_nosh_sidebar')): echo 'col-lg-8 col-md-12'; endif; ?>" id="main" role="main">
<div class="main section" id="page_body" name="Blog Posts"><div class="widget Blog">
<div class="blog-posts hfeed container">
<div class="row">
<article class="post-outer-container col">
<div class="post-outer" id="post-outer">
<div class="post-wrapper not-hero post-404 post-full no-image">
<div class="slide">
<div class="post">
<div class="post-body entry-content float-container" style="
    text-align: center;
    font-size: 40px;
">
<i class="far fa-frown-open"></i><br/>
<?php esc_html_e('404! Page not found.', 'nosh-stw'); ?>
</div>
</div>
</div>
</div>
</div>
</div>
</article>
</div>
</div>
</div>
</main>
  <?php get_sidebar(); ?>
</div>
</div>
<hr>
    <?php 
get_footer( );
?>