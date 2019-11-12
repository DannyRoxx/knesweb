<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package SKT Filmmaker
 */
get_header(); 

$hideslide = get_theme_mod('hide_slides', 1);
$secwithcontent = get_theme_mod('hide_home_secwith_content', 1);
$hide_sectiontwo = get_theme_mod('hide_sectiontwo', 1);
$hide_home_third_content = get_theme_mod('hide_home_third_content', 1);
$hide_sectionfour = get_theme_mod('hide_sectionfour', 1);
$hide_home_five_content = get_theme_mod('hide_home_five_content', 1);

if (!is_home() && is_front_page()) { 
if( $hideslide == '') { ?>
<!-- Slider Section -->
<?php 
$slidepages = array();
for($sld=7; $sld<10; $sld++) { 
	$mod = absint( get_theme_mod('page-setting'.$sld));
    if ( 'page-none-selected' != $mod ) {
      $slidepages[] = $mod;
    }	
} 
if( !empty($slidepages) ) :
$args = array(
      'posts_per_page' => 3,
      'post_type' => 'page',
      'post__in' => $slidepages,
      'orderby' => 'post__in'
    );
    $query = new WP_Query( $args );
    if ( $query->have_posts() ) :	
	$sld = 7;
?>
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider">
		<?php
        $i = 0;
        while ( $query->have_posts() ) : $query->the_post();
          $i++;
          $skt_filmmaker_slideno[] = $i;
          $skt_filmmaker_slidetitle[] = get_the_title();
		  $skt_filmmaker_slidedesc[] = get_the_excerpt();
          $skt_filmmaker_slidelink[] = esc_url(get_permalink());
          ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" />
          <?php
        $sld++;
        endwhile;
          ?>
    </div>
        <?php
        $k = 0;
        foreach( $skt_filmmaker_slideno as $skt_filmmaker_sln ){ ?>
    <div id="slidecaption<?php echo esc_attr( $skt_filmmaker_sln ); ?>" class="nivo-html-caption">
      <div class="slide_info">
        <h2><?php echo esc_html($skt_filmmaker_slidetitle[$k] ); ?></h2>
        <p><?php echo esc_html($skt_filmmaker_slidedesc[$k] ); ?></p>
      </div>
    </div>
 	<?php $k++;
       wp_reset_postdata();
      } ?>
<?php endif; endif; ?>
  </div>
  <div class="clear"></div>
</section>
<?php } } 
	if(!is_home() && is_front_page()){ 
	if( $secwithcontent == '') {
?>
<section id="sectionone">
	<div class="center">
         <div class="home_section1_content">
			<?php 
                $section1_readmore = get_theme_mod('section1_readmore');
                if( get_theme_mod('sec-column-left1',false)) {
                $seconequery = new WP_query('page_id='.get_theme_mod('sec-column-left1',true)); 
                while( $seconequery->have_posts() ) : $seconequery->the_post(); 
            ?>  
         	<div class="columns-row">
            	<?php if( has_post_thumbnail() ) { ?> 
            	<div class="col-columns-2">
                <?php the_post_thumbnail('full');  ?>
                </div>
                <?php } ?>
                <div class="<?php if( has_post_thumbnail() ) { ?>col-columns-2<?php } else {?>col-columns-2 col-columns-2-full<?php } ?>">
                	<h3><?php the_title(); ?></h3>
                    <?php the_content(); ?>
                    <?php if(!empty($section1_readmore)){?>
                    <a class="aboutmore" href="<?php echo esc_url($section1_readmore);?>"><?php echo esc_html('Read More');?></a>
                    <?php } ?>
                </div>
                <div class="clear"></div>
            </div>
			<?php endwhile; wp_reset_postdata(); 
            }
            ?>          
         </div>
    </div>
</section>
<?php }}  
if (!is_home() && is_front_page()) { 
if( $hide_sectiontwo == '') { ?>
<section class="hometwo_section_area">
    	<div class="center">
		  <?php
            $section2_title = get_theme_mod('section2_title');
            if(!empty($section2_title)){?>
	          <h2><?php echo esc_html($section2_title);?></h2>
          <?php } ?>
          <div class="hmsection2-row">
			<?php 
                for($l=1; $l<4; $l++) { 
                if( get_theme_mod('page-column-left'.$l,false)) {
                $section2block = new WP_query('page_id='.get_theme_mod('page-column-left'.$l,true)); 
                while( $section2block->have_posts() ) : $section2block->the_post(); 
            ?> 
          	<div class="hmsection2-column">
            	<a href="<?php echo esc_url( get_permalink() ); ?>">
				<?php 
                    if( has_post_thumbnail() ) {
                ?>                
                <div class="service-thumb-box">
				<?php the_post_thumbnail('full');  ?>
                </div>
                <?php
				}
				?>
                <h3><?php the_title(); ?></h3>
                </a>
            </div>
        <?php endwhile; wp_reset_postdata(); 
           }} 
        ?>              
 
            <div class="clear"></div>                        
          </div>
        </div>
    </section>
<?php } } ?>
<?php if (!is_home() && is_front_page()) {
	  if( $hide_home_third_content == '' ){	
?>
<section class="home3_section_area">
  <div class="center">
  	<div class="home3-area">
	<?php 
    $section3_title = get_theme_mod('section3_title');
    if(!empty($section3_title)){?>
    <h2><?php echo esc_html($section3_title);?></h2>
    <?php } ?>
	<div class="home3-columns-row">
	<?php 
        for($U=1; $U<5; $U++) { 
        if( get_theme_mod('page-secthree-'.$U,false)) {
        $section3block = new WP_query('page_id='.get_theme_mod('page-secthree-'.$U,true)); 
        while( $section3block->have_posts() ) : $section3block->the_post(); 
    ?>     
    <div class="home3-fourcolumn">
        <a href="<?php echo esc_url( get_permalink() ); ?>">
			<?php 
                if( has_post_thumbnail() ) {
            ?>         
          <div class="home3production-thumb-box"><?php the_post_thumbnail('full');  ?></div>
          <?php } ?>
        <h3><?php the_title(); ?></h3>
          <?php the_excerpt(); ?>
      </a>
    </div>
	<?php endwhile; wp_reset_postdata(); 
       }} 
    ?>  
<div class="clear"></div>
    </div>
    </div>
  </div>
</section>
<?php } } ?>
<div class="clear"></div>
<div class="container">
     <div class="page_content">
      <?php 
	if ( 'posts' == get_option( 'show_on_front' ) ) {
    ?>
    <section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
                            get_template_part( 'content', get_post_format() );
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-filmmaker' ),
							'next_text' => esc_html__( 'Next', 'skt-filmmaker' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
    <?php
} else {
    ?>
	<section class="site-main">
      <div class="blog-post">
        <?php
                    if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                            /*
                             * Include the post format-specific template for the content. If you want to
                             * use this in a child theme, then include a file called called content-___.php
                             * (where ___ is the post format) and that will be used instead.
                             */
							 ?>
                             <header class="entry-header">           
            				<h1><?php the_title(); ?></h1>
                    		</header>
                             <?php
                            the_content();
                        endwhile;
                        // Previous/next post navigation.
						the_posts_pagination( array(
							'mid_size' => 2,
							'prev_text' => esc_html__( 'Back', 'skt-filmmaker' ),
							'next_text' => esc_html__( 'Next', 'skt-filmmaker' ),
						) );
                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );
                    endif;
                    ?>
      </div>
      <!-- blog-post --> 
    </section>
	<?php
}
	?>
    <?php get_sidebar();?>
    <div class="clear"></div>
  </div><!-- site-aligner -->
</div><!-- content -->
<?php get_footer(); ?>