<?php 

get_header( );

while(have_posts(  )){
    the_post(  );?>

   
<div class="container mainarea mtpx">
<div class="row" id="content">
<main class="blog-content item-view <?php if(is_active_sidebar('stw_nosh_sidebar')): echo 'col-lg-8 col-md-12'; endif; ?>" id="main" role="main">
<div class="main section" id="page_body" name="Blog Posts">
  <div class="widget Blog">
    <div class="blog-posts hfeed container">
    <?php 
        $count = 1;
        $theAncestors = get_post_ancestors(get_the_ID());
        $ancestorArray = array();

        $theParent = wp_get_post_parent_id(get_the_ID());

        foreach ($theAncestors as $theAncestor){
            $ancestorArray[] = $theAncestor;	
        }

        krsort($ancestorArray);
        
        ?>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo  esc_url(get_permalink( get_option( 'page_for_posts' ) )); ?>"><?php echo get_the_title( get_option( 'page_for_posts' ) ); ?></a></li>
        <?php
          foreach ($ancestorArray as $ancestor){
          echo "<li class='breadcrumb-item'><a class='breadcrumb-link-". $count ."' href='". esc_url(get_permalink($ancestor)) ."'>". get_the_title($ancestor) ."</a></li>";
              $count++;
            
          }
          ?>
        <li class='breadcrumb-item active' aria-current='page'><?php the_title(); ?></li>
        </ol>
        </nav>

      <div class="row">
        <article class="post-outer-container col">
          <div class="post-outer" id="post-outer">
            <div class="post-wrapper not-hero post-<?php the_ID(); ?> post-full no-image">
              <?php 
              $post_thumbnail = esc_url(get_the_post_thumbnail_url());

              if($post_thumbnail){
                $image_data = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), "full" );

              ?>

              <style>
                        .qpost-thumb-<?php the_ID(); ?> {background:<?php echo $post_thumbnail?"url(".$post_thumbnail.")":stw_nosh_randomColor(); ?>;background-size: cover;
                background-repeat: no-repeat;background-position: center;}
              </style>
              <div class="snippet-thumbnail-container">
                <div class="snippet-thumbnail qpost-thumb-<?php the_ID();
                echo $post_thumbnail?'':' no-post-thumb' ?>">
                </div>
              </div>
                  <?php
                  
                }
                ?>
              <div class="slide">
                <div class="post">
                  <div class="post-title-container">
                    <h1 class="post-title entry-title">
                      <?php the_title(); ?>
                    </h1>
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
                  <div class="post-body entry-content float-container">
                    <?php the_content(); ?>
                    <?php
                    $defaults = array(
                      'before'           => '<p>' . esc_html__( 'Pages:', 'nosh-stw' ),
                      'after'            => '</p>',
                      'link_before'      => '',
                      'link_after'       => '',
                      'next_or_number'   => 'number',
                      'separator'        => ' ',
                      'nextpagelink'     => esc_html__( 'Next page', 'nosh-stw'),
                      'previouspagelink' => esc_html__( 'Previous page', 'nosh-stw' ),
                      'pagelink'         => '%',
                      'echo'             => 1
                    );
                    wp_link_pages($defaults); ?>
                    <?php

                    if ( get_the_modified_time( 'U' ) > get_the_time( 'U' ) ) {
                        echo '<p style="clear:both"><i>'. esc_html__('Last updated:', 'nosh-stw') .' '. get_the_modified_time('F j, Y') .'</i></p>';
                    }

                    ?>
                  </div>
                  <div class="post-bottom">
                    <div class="post-footer float-container">
                      
                      <div class="post-footer-line post-footer-line-1">
                        <?php the_tags(); ?>
                      </div>
                      <div class="post-footer-line post-footer-line-2">
                        <div class="post-nav">

                        <?php
                            if($nosh_prevlink = get_previous_post_link( 'Previous Post: %link')) {
                                echo '<div class="prev-post">'.$nosh_prevlink.'</div>';
                            }
                        ?>

                        <?php
                            if($nosh_nextlink = get_next_post_link('Next Post: %link')) {
                                echo '<div class="next-post">'.$nosh_nextlink.'</div>';
                            }
                        ?>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <section class="comments threaded a" data-embed="true" data-num-comments="0" id="respond">
                <h3 class="title">
                <?php esc_html_e('Comments', 'nosh-stw'); ?>
                </h3>
                <div class="comments-content">
                  <?php comments_template(); ?>
                </div>
              </section>
        </article>
      </div>
    </div>
  </div>
</div>
</main>

  <?php get_sidebar(); ?>

</div>
</div>
<hr>
    <?php 
}
get_footer( );
?>