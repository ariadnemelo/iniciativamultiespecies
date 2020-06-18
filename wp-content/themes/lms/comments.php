<div class="commententries">
<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'lms'); ?></p>
<?php  return;
	endif;?>
    
    <h3 class="border-title"> <?php comments_number(esc_html__('No Comments', 'lms'), esc_html__('Comment ( 1 )', 'lms'), esc_html__('Comments ( % )', 'lms') );?><span> </span></h3>    
    <?php if ( have_comments() ) : ?>
    
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                    <div class="navigation">
                        <div class="nav-previous"><?php previous_comments_link( esc_html__( 'Older Comments', 'lms'  ) ); ?></div>
                        <div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments', 'lms') ); ?></div>
                    </div> <!-- .navigation -->
        <?php endif; // check for comment navigation ?>
        
        <ul class="commentlist">
     		<?php wp_list_comments( array( 'callback' => 'dttheme_custom_comments' ) ); ?>
        </ul>
    
    <?php else: ?>
		<?php if ( ! comments_open() ) : ?>
            <p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'lms'); ?></p>
        <?php endif;?>    
    <?php endif; ?>
	
    <!-- Comment Form -->
    <?php if ('open' == $post->comment_status) : 
            
            if(is_user_logged_in()) {
                $comment = "<div class='column dt-sc-one-column first'><textarea id='comment' name='comment' cols='5' rows='3' placeholder='".esc_attr__("Comment",'lms')."' ></textarea></div>";
            } else {
                $comment = "<div class='column dt-sc-one-half first'><textarea id='comment' name='comment' cols='5' rows='3' placeholder='".esc_attr__("Your Comment",'lms')."' ></textarea></div>";
            }
            
            $fields = array(
                "author" => "<div class='column dt-sc-one-half '><p><input id='author' name='author' type='text' placeholder='".esc_attr__("Your Name", 'lms')."' required /></p></div>",
                "email" => "<div class='column dt-sc-one-half'> <p> <input id='email' name='email' type='text' placeholder='".esc_attr__("Your Email", 'lms')."' required /> </p></div>",
            );
            
            $privacy_cmdfrm = dttheme_option('privacy','enable-commentfrm-msg');
            if( isset( $privacy_cmdfrm ) ) {
            
                $content = do_shortcode( dttheme_option('privacy', 'commentfrm-msg') );
            
                $fields['comment-form-dt-privatepolicy'] = '<p class="comment-form-dt-privatepolicy">
                    <input id="comment-form-dt-privatepolicy" name="comment-form-dt-privatepolicy" type="checkbox" value="yes">
                    <label for="comment-form-dt-privatepolicy">'.$content.'</label> </p>';
            }

            $comments_args = array(
                'title_reply' 			=> 	esc_html__( 'Give a comment','lms' ),
                'fields'				=> 	$fields,
                'comment_field'			=> 	$comment,
                'comment_notes_before'	=>	'',
                'comment_notes_after'	=>	'',
                'label_submit'			=>	esc_html__('Comment','lms'));
            comment_form($comments_args);  ?>
	<?php endif; ?>
</div>