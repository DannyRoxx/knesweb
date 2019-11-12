<?php 

get_header( ); ?>


<div class="container mainarea mtpx">
<div class="row" id="content">
<main class="blog-content feed-view search-view <?php if(is_active_sidebar('stw_nosh_sidebar')): echo 'col-lg-8 col-md-12'; endif; ?>" id="main" role="main" tabindex="-1">
<div class="main section" id="page_body" name="Blog Posts"><div class="widget Blog">
<div class="blog-posts hfeed container">
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
  <?php     
        echo "<li class='breadcrumb-item'><a href=". esc_url(get_permalink( get_option( 'page_for_posts' ) )) .">".  get_the_title( get_option( 'page_for_posts' ) ) . "</a></li><li class='breadcrumb-item active' aria-current='page'>". get_the_archive_title() ."</li>";
    ?>

    
     </ol>
</nav>
<div class="row">
  <?php 

  while(have_posts()){
    the_post(); ?>

<article class="post-outer-container col-lg-6 col-sm-6 col-xs-12">
<div class="post-outer" id="post-outer">
<div class="post-wrapper not-hero post-<?php the_ID(); ?>">
<?php 
$post_thumbnail = esc_url(get_the_post_thumbnail_url());

?>
<style>
            .qpost-thumb-<?php the_ID(); ?> {background:<?php echo $post_thumbnail?"url(".$post_thumbnail.")":stw_nosh_randomColor(); ?>;background-size: cover;
    background-repeat: no-repeat;background-position: center;}
          </style>
<div class="snippet-thumbnail-container">
<div class="snippet-thumbnail qpost-thumb-<?php the_ID();
echo $post_thumbnail?'':' no-post-thumb' ?>">
<?php
if(!$post_thumbnail){
  
  ?>
<span><?php the_title(); ?></span>
  <?php
}
else{
  $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );
}
?></div>
</div>
<div class="slide">
<div class="post">
<div class="post-title-container">
<h2 class="post-title entry-title">
<a href="<?php the_permalink(); ?>">
<?php the_title(); ?>
</a>
</h2>
</div>
<div class="post-header">
<div class="post-header-line-1">
<span class="byline post-author vcard">
<span class="post-author-label">
<?php esc_html_e('Posted by', 'nosh-stw'); ?>
</span>
<span class="fn">
<span><?php the_author_posts_link(); ?></span>
</span>
</span>
<span class="byline post-timestamp"> <?php esc_html_e('on', 'nosh-stw'); ?>
<a class="timestamp-link" href="<?php the_permalink(); ?>">
<time class="published" datetime="<?php echo get_post_time('c', true); ?>">
<?php echo get_the_date( )  ?>
</time>
</a>
</span>
<span class="post-category"> <?php esc_html_e('in', 'nosh-stw'); ?>
  <?php echo get_the_category_list(', '); ?>
</span>
</div>
</div>
<div class=" post-body entry-content" id="post-snippet-<?php the_ID(); ?>">
<div class="post-snippet snippet-container r-snippet-container">
<div class="snippet-item r-snippetized"><?php the_excerpt(); ?></div>
</div>
</div>
<div style="clear: both;"></div>
<div class="post-bottom post-snippet-bottom">
<div class="post-footer float-container">
<span class="byline post-comment-link">
<a class="comment-link" href=""<?php comments_link(); ?>>
<i class="fas fa-comment-alt"></i>
<span class="num_comments">
<?php comments_number( __('Post Comment', 'nosh-stw'), __('1 Comment', 'nosh-stw'),  __('% Comments', 'nosh-stw') ); ?>
</span>
</a>
</span>
<span class="jump-link">
<a class="btn btn-nosh" href="<?php the_permalink(); ?>">
<?php esc_html_e('Read more', 'nosh-stw'); ?>
</a>
</span>
</div>
</div>
</div>
</div>
</div>
</div>
</article>

    <?php 
  }

  ?>
</div>
</div>
<div class="blog-pager row" id="blog-pager">

<div class="prev col">

<?php echo get_previous_posts_link( ); ?>
</div>
<div class="next col">
<?php echo get_next_posts_link( ); ?>
</div>
</div>
</div></div>
</main>

  <?php get_sidebar(); ?>

</div>
</div>
<hr>

    <?php 

get_footer( );
?>