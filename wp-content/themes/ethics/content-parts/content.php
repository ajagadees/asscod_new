<?php
/**
 * @package ethics
 */
?>			
	<div class="inner-page-news-area news-area">
		<div class="row featuredContainer">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="blog-dess">					
					<?php if(has_post_thumbnail()) : ?>
						<div class="inner-news-box-top">
						   <?php the_post_thumbnail(); ?>
						</div>
					<?php endif; ?>					
					<div class="inner-news-box-bottom">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h4>
						<ul class="blog-meta-list">
							<li><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo esc_html__( 'By', 'ethics' ); ?> <?php the_author(); ?></a></li>
							<li><a><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date();?></a></li>
							<li><a><i class="fa fa-comments-o" aria-hidden="true"></i><?php comments_number( __('0 comments', 'ethics'), __('1 comments', 'ethics'), __('% comments', 'ethics') ); ?></a></li>
						</ul>
						<?php the_excerpt(); ?>
						<a href="<?php the_permalink(); ?>" class="blog-meta-btn"><?php echo esc_html__( 'Read More', 'ethics' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>