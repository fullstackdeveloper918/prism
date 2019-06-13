<?php
/**
 * Comments Template
 */
if (post_password_required()) {
	return;
}

$amartha_comments_args = array(
    'style'        => 'div',
	'callback'     => 'amartha_comments_open',
	'end-callback' => 'amartha_comments_close'
);

$amartha_comment_form =  array(
    'logged_in_as' => null,
    'comment_notes_before' => null,
    'title_reply_before' => '<h6 id="reply-title" class="o-comments__title d-flex align-items-center">',
    'title_reply_after' => '</h6>',
    'title_reply' => 'Leave a Reply',
    'submit_button' => '<div class="o-comments__form__submit d-flex"><div class="ml-auto"><input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" /></div></div>',
    'comment_field' => "<div class='o-comments__form__textarea row'><div class='col-12'><textarea placeholder=". esc_attr__('Comment', 'amartha') ." type='text' name='comment' aria-required='true'/></textarea></div></div>",
    'fields' => apply_filters('comment_form_default_fields', array(
            'author' => "<div class='o-comments__form__inputs row'><div class='col-sm-4'><input placeholder=". esc_attr__('Name', 'amartha') ." name='author' type='text' aria-required='true'/></div>",
        	'email' => "<div class='col-sm-4'><input placeholder=". esc_attr__('Email', 'amartha') ." name='email' type='text' aria-required='true'/></div>",
        	'website' => "<div class='col-sm-4'><input placeholder=". esc_attr__('Website', 'amartha') ." name='website' type='text'/></div></div>",
        )
    ),
);

if (have_comments() || comments_open()) :
?>
    <div class="o-comments" id="comments">
        <div class="o-comments__area">
            <h3 class="o-comments__title"><?php comments_number(esc_attr__('No Comments', 'amartha'), esc_attr__('One Comment', 'amartha'), esc_attr__('% Comments', 'amartha')); ?></h3>
            <div class="row">
                <?php wp_list_comments($amartha_comments_args) ?>
            </div>
            <?php paginate_comments_links(); ?>
        </div>
        <?php if (comments_open()) : ?>
            <div class="o-comments__form">
                <?php comment_form($amartha_comment_form); ?>
            </div>
        <?php elseif (!comments_open() && get_theme_mod('comments_closed', '1') !== '2') : ?>
            <div class="o-comments__closed">
                <h6 class="o-comments__closed__title"><?php echo esc_html__('Comments are closed!', 'amartha') ?></h6>
            </div>
        <?php endif; ?>
    </div>
<?php 
endif;