<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage ethics
 * @since ethics 
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


	<?php if ( have_comments() ) : ?>
		
		
		
		
		<span class="inner-sub-title">
						<?php
							$comments_number = get_comments_number();
							if ( 1 === $comments_number ) {
								/* translators: %s: post title */
								printf( esc_html__( 'One thought on &ldquo;%s&rdquo;','ethics' ), get_the_title() );
							} else {					
								printf(
									esc_html(
										/* translators: 1: number of comments, 2: post title */
										_nx( 
											'%1$s thought on &ldquo;%2$s&rdquo;',
											'%1$s thoughts on &ldquo;%2$s&rdquo;',
											$comments_number,
											'comments title',
											'ethics'
										)
									),
									esc_html (number_format_i18n( $comments_number ) ),
									get_the_title()
								);
							}
						?>
					</span>
					
			<?php the_comments_navigation(); ?>

		         <ul>
		              <?php
		                   wp_list_comments( array(
		                       'style'       => 'ul',
		                       'short_ping'  => true,
		                       'avatar_size' => 42		                      
		                  ) );
		              ?>
		          </ul>

		          <?php the_comments_navigation(); ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'ethics' ) ) :
	?>
			<p class="no-comments"><?php esc_html__( 'Comments are closed.', 'ethics' ); ?></p> 
		<?php endif; ?>

	
   
    <div class="page-news-details-leave-comments">
        <?php comment_form(); ?>
    </div> <!-- /.inner-box -->
    
<!-- .comments-area -->