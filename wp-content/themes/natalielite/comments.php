<?php
if ( post_password_required() ) {
	return;
}
$fields =  array(
    'author' => '<div class="row"><div class="col-sm-6"><input type="text" name="author" id="name" class="input-form" placeholder="'. esc_attr__( 'Name*', 'natalielite' ) .'" /></div>',
    'email'  => '<div class="col-sm-6"><input type="text" name="email" id="email" class="input-form" placeholder="'. esc_attr__( 'Email*', 'natalielite' ) .'"/></div>',
    'website'=>'<div class="col-sm-12"><input type="text" name="url" id="url" class="input-form" placeholder="'. esc_attr__( 'Website URL', 'natalielite' ) .'"/></div></div>'

);
$custom_comment_form = array( 
    'fields'                => $fields,
    'comment_field'         => '
    <textarea name="comment" id="message" class="textarea-form" placeholder="'. esc_html__( 'Comment', 'natalielite' ) .'"  rows="5"></textarea>',
    'logged_in_as'          => '<p class="logged-in-as">' . esc_html__( 'Logged in as', 'natalielite' ) . ' <a href="'. esc_url( admin_url( 'profile.php' ) ) .'">' . $user_identity . '</a> <a href="' . wp_logout_url( get_permalink() ) . '">' . esc_html__( 'Log out?', 'natalielite' ) . '</a></p>',
    'cancel_reply_link'     => esc_html__( 'Cancel' , 'natalielite' ),
    'comment_notes_before'  => '',
    'comment_notes_after'   => '',
    'title_reply'           => esc_html__( 'Leave a Reply' , 'natalielite' ),
    'label_submit'          => esc_html__( 'Submit' , 'natalielite' ),
    'id_submit'             => 'comment_submit',
);

?>
<?php if ( have_comments() ) : ?>
<div id="comments" class="comments-area">    
        <?php if ( comments_open() ) : ?>
            <h4 class="comments-title"><?php comments_number( null, esc_html__('1 Comment', 'natalielite'), '% ' . esc_html__('Comments', 'natalielite') ); ?></h4>
       	<?php endif; ?>
    	<ol class="comment-list">
		<?php
			wp_list_comments( array(
				'style'       => 'ol',
				'short_ping'  => true,
				'avatar_size' => 95,
                'callback'	  => 'natalielite_custom_comment'
			) );
		?>
    	</ol><!-- .comment-list -->    
    	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    	<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
    		<h1 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'natalielite' ); ?></h1>
    		<div class="nav-previous">&larr;<?php previous_comments_link( esc_html__( 'Older Comments', 'natalielite' ) ); ?></div>
    		<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'natalielite' ) ); ?>&rarr;</div>
    	</nav><!-- #comment-nav-below -->
    	<?php endif; ?>    
    	<?php if ( ! comments_open() ) : ?>
    	<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'natalielite' ); ?></p>
    	<?php endif; ?>
</div>
<?php endif; ?>
<!-- Leave reply -->
<?php comment_form($custom_comment_form); ?>
<!-- Leave reply -->
