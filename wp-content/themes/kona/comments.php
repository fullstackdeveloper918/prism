<?php

if ( post_password_required() ) { ?>
	<p class="password_required"><?php esc_html_e('The comments is password protected. Enter your password.', 'kona'); ?></p>
<?php
	return;
}
?>

			<?php $comments_amount = get_comment_count($post->ID); ?>
               
                <div class="column-section spaced-big clearfix">
                	<div id="post-comments" class="comments column three-fifth">	
						<h4><strong><?php esc_html_e('Comments', 'kona'); ?></strong></h4>

                	<?php if ( have_comments() && $comments_amount['approved'] > 0) { ?>
						<ul class="comment-list">
							<?php wp_list_comments('callback=kona_comment&short_ping=true'); ?>
						</ul>
                   
                   		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) { ?>
						<div id="comment-pagination" role="navigation">
							<h4 class="screen-reader-text"><?php esc_html_e( 'Comment pagination', 'kona' ); ?></h4>
							<ul class="pagination">

								<li class="prev"><?php previous_comments_link( esc_html__( 'Older Comments', 'kona' ) ); ?></li>
								<li class="next"><?php next_comments_link( esc_html__( 'Newer Comments', 'kona' ) ); ?></li>

							</ul>
						</div>
						<?php } // end if comment pagination ?>
                   
                    <?php } else { ?>
						<p class="no-comments"><?php esc_html_e('There are no comments yet.', 'kona'); ?></p>
                    <?php } if ( !comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) { ?>
						<p class="no-comments"><strong><?php _e( 'Comments are closed.', 'kona' ); ?></strong></p>
                    <?php } ?>
                    
					</div> <!-- END #post-comments -->
                               
                	<div id="blog-leavecomment" class="leavecomment column two-fifth last-col">
                      	<?php 
							global $kona_comments_defaults;
							comment_form($kona_comments_defaults);    
						?> 
                    </div> <!-- END #leavecomment -->
                
				</div> <!-- END .column-section -->
