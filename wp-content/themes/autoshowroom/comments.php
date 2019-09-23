<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package Templaza
 * @subpackage Lifemag
 * @since Lifemag 1.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
    return;
}
?>

<div id="comments" class="comments-area">

    <?php if ( have_comments() ) : ?>
        <div class="tzCommentContent">
            <h3 class="comments-title">
                <?php  esc_html_e('Comments','autoshowroom');?>
                <?php echo balanceTags('('.get_comments_number().')');?>
            </h3>

            <?php tz_autoshowroom_comment_nav(); ?>

            <ol class="comment-list">
                <?php
                wp_list_comments( array(
                    'callback'    => 'tz_autoshowroom_comment',
                    'style'       => 'ol',
                ) );
                ?>
            </ol><!-- .comment-list -->

            <?php tz_autoshowroom_comment_nav(); ?>
        </div>

    <?php endif; // have_comments() ?>

    <div class="tzCommentForm">
        <?php
        // If comments are closed and there are comments, let's leave a little note, shall we?
        if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
            ?>
            <p class="no-comments"><?php  esc_html_e( 'Comments are closed.', 'autoshowroom'); ?></p>
        <?php endif; ?>
        <?php

        $aria_req = ( $req ? " aria-required='true'" : '' );
        $args = array(
            'comment_notes_after' => '',
            'title_reply'       => balanceTags( '<span>Leave your comment</span>','autoshowroom'),
            'fields' => apply_filters( 'comment_form_default_fields',
                array(
                    'author' => '<div class="row tzCommentForm_Top"><p class="comment-form-author col-lg-6 col-md-6 col-sm-12 col-xs-12">' . '<label for="author">' .  esc_html__( 'Name','autoshowroom') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                        '<input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' placeholder="'.( $req ? 'Name' : '' ).'" /></p>',
                    'email'  => '<p class="comment-form-email col-lg-6 col-md-6 col-sm-12 col-xs-12"><label for="email">' .  esc_html__( 'Email','autoshowroom') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
                        '<input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30" aria-describedby="email-notes"' . $aria_req . ' placeholder="'.( $req ? 'Email' : '' ).'" /></p></div>',
                )
            ),
            'comment_field'        => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment','noun','autoshowroom') . '</label> <textarea id="comment" name="comment" cols="45" rows="8" required="required" placeholder="Your Comment"></textarea></p>',
            'label_submit'      =>  esc_html__( 'Post Comment','autoshowroom'),
        );
        ?>
        <?php comment_form( $args ); ?>
    </div>

</div><!-- .comments-area -->
