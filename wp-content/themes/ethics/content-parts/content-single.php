<?php
/**
 * The template part for displaying Single posts
 *
 * @package WordPress
 * @subpackage ethics
 */
?>
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="page-news-details-content solid-underline">
				<?php if(has_post_thumbnail()) : ?>
				<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail(); ?>
				</a>
				<?php endif; ?>
				<h3><?php the_title(); ?></h3>
				<ul class="comments-info solid-underline">
					<li><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date();?></li>
					<li><i class="fa fa-user" aria-hidden="true"></i> <?php echo esc_html__( 'Posted by', 'ethics' ); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"> <?php the_author(); ?></a></li>
					<li><i class="fa fa-comments-o" aria-hidden="true"></i><?php comments_number( __('0 comments', 'ethics'), __('1 comments', 'ethics'), __('% comments', 'ethics') ); ?></li>
				</ul>
				<?php the_content();
		            wp_link_pages( array(
		            'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'ethics' ),
		            'after'  => '</div>',
		            ) );
		    	?>
			</div>
			     <?php if (has_tag()) : 
		             $seperator = ''; // blank instead of comma
		                echo esc_html__(' ', 'ethics' ); ?>
			<div class="page-news-details-tags solid-underline">
				<span class="inner-sub-title"><?php echo esc_html__( 'Tags :', 'ethics' ); ?></span>
				<ul>
					<li><?php the_tags( $seperator,', &nbsp;'); ?></li>		        	
				</ul>
			</div>
			 <?php endif; ?>
		</div>
	</div>