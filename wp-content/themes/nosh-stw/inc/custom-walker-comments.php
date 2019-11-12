<?php

/**
 * Custom comment walker
 *
 * @users Walker_Comment
 */
class Nosh_STW_Walker_Comment extends Walker_Comment
{
    public function html5_comment( $comment, $depth, $args )
    {
        $tag = ( 'div' === $args['style'] ) ? 'div' : 'li';
        ?>
                <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?>>
                    <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media">
                   <?php 
                   if ( 0 != $args['avatar_size'] ) 
                    $avatar = get_avatar( $comment, $args['avatar_size'] );
                    if( $avatar !== false ) {

                   ?>
                    
                        <div class="avatar-image-container">
                            <?php  echo $avatar; ?>
                                
                    </div><!-- .comment-author-avatar -->
                      
                        <?php 
                    }
                    ?>
                        <div class="comment-content-wrapper">
                            <div class="comment-metadata comment-header">
                            <?php printf( esc_html( '%s' , 'nosh-stw'), sprintf( '<b class="fn">%s</b>', get_comment_author( $comment ) )  ); ?>
						
							<time class="comment-timestamp datetime secondary-text" datetime="<?php comment_time( 'c' ); ?>">
								<?php
									/* translators: 1: comment date, 2: comment time */
									printf( esc_html( '%1$s','nosh-stw' ), get_comment_date( '', $comment ));
								?>
							</time>
						
						
					</div><!-- .comment-metadata -->

					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.','nosh-stw' ); ?></p>
					<?php endif; ?>
				<!-- .comment-meta -->

                <div class="comment-content">
                <div class="content">
					<?php comment_text(); ?>
                    

				<span class="comment-actions secondary-text"> 
                <?php
				comment_reply_link( array_merge( $args, array(
					'add_below' => 'div-comment',
					'depth'     => $depth,
					'max_depth' => $args['max_depth'],
			
				) ) );
				?>
                
                <?php if (comments_open()){
                    
                    edit_comment_link( esc_html__( 'Edit','nosh-stw' ) );
                }  ?>
                </span>
                </div>
                </div><!-- .comment-content -->
				</div>
			</article><!-- .comment-body -->

            <?php
	}
        
}