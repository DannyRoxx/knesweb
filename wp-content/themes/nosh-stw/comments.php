<div class="comments-wrap comment-thread">
<?php if($comments) { ?>  
    
    <ol class="comment-list">
            <?php

            // Arguments for wp_list_comments() 
$args = [
    'style'       => 'ol',
    'short_ping'  => true,
    'format'      => 'html5',
    'avatar_size' => 64,
];

            // Use our custom walker if it's available
if( class_exists( 'Nosh_STW_Walker_Comment' ) )
{
    $args['walker'] = new Nosh_STW_Walker_Comment;
}

                wp_list_comments( $args );
            ?>
        </ol><!-- .comment-list -->
 
        <?php
            // Are there comments to navigate through?
            if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
        ?>
        <nav class="navigation comment-navigation level" role="navigation">
            <div class="nav-previous level-left"><div class="level-item"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'nosh-stw' ) ); ?></div></div>
            <div class="nav-next level-right"><div class="level-item"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'nosh-stw' ) ); ?></div></div>
        </nav><!-- .comment-navigation -->
        <?php endif; // Check for comment navigation ?>
        
 
<?php 
    } else {
        ?>
        <div class="emptyComments">
        <?php esc_html_e('No comments yet.', 'nosh-stw'); ?> 
        </div>
        <?php
    }


if(comments_open()){

    $commenter = wp_get_current_commenter();
$req = get_option( 'require_name_email' );
$aria_req = ( $req ? " aria-required='true'" : '' );

$consent = empty( $commenter['comment_author_email'] ) ? '' : ' checked="checked"';

    $fields =  array(

        'author' =>
          '<div class="form-group comment-form-author"><label for="author">' . esc_html__( 'Name', 'nosh-stw' ) .
          ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
          '<input id="author" class="form-control" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
          '" size="30"' . $aria_req . ' /></div>',
      
        'email' =>
          '<div class="form-group comment-form-email"><label for="email">' . esc_html__( 'Email', 'nosh-stw' ) .
          ( $req ? '<span class="required">*</span>' : '' ) . '</label>' .
          '<input id="email" name="email"  class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
          '" size="30"' . $aria_req . ' /></div>',
      
        'url' =>
          '<div class="form-group comment-form-url"><label for="url">' . esc_html__( 'Website', 'nosh-stw' ) . '</label>' .
          '<input id="url" name="url" type="text"  class="form-control" value="' . esc_attr( $commenter['comment_author_url'] ) .
          '" size="30" /></div>',
      );

      $args = array(
        'id_form'           => 'commentform',
        'class_form'      => 'comment-form',
        'id_submit'         => 'submit',
        'class_submit' => 'btn btn-nosh',
        'comment_field' =>  ' <div class="form-group comment-form-comment"><label for="comment">' . esc_html__( 'Comment', 'nosh-stw' ) .
    '</label><textarea id="comment" name="comment" class="form-control" cols="45" rows="8" aria-required="true">' .
    '</textarea></div>',
        'fields' => apply_filters( 'comment_form_default_fields', $fields ),

      );
      
    comment_form($args);
?>

<?php
} else {
    ?>
    <div class="closedComments">
    <?php
    esc_html_e('Comments are closed', 'nosh-stw');
    ?>
    </div>
    <?php

}
?>
</div>