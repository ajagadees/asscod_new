<?php
/**
 * // To display Blog Post section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ethics
*/
	$ethics_blog_title = get_theme_mod('ethics-blog_title');
	$ethics_blog_subtitle = get_theme_mod('ethics-blog_subtitle');
	$ethics_blog_url    = get_theme_mod( 'ethics-blog_url' );
	$ethics_blog_section     = get_theme_mod( 'ethics_blog_section_hideshow','show');
	$ethics_blog_section_column = get_theme_mod( 'ethics_blog_section_columnshow','4');
	if ($ethics_blog_section =='show') { 
	?>
	<!-- News Area Start Here -->
		<div class="news-area section-space-88-100">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php if($ethics_blog_title != "" || $ethics_blog_subtitle != "")   {  ?>
							<div class="section-title-area">					
								<h2><?php echo esc_html(get_theme_mod('ethics-blog_title')); ?></h2>				
								<div class="title-bottom-icon">
									<span class="title-bottom-icon-right"></span>
								</div>
								<p><?php echo esc_html(get_theme_mod('ethics-blog_subtitle')); ?></p>		
							</div>
						<?php } ?>
					</div>
				</div>
				<div class="row inner-section-space-top">
					<?php 
						$latest_blog_posts = new WP_Query( array( 'posts_per_page' => 3 ) );
						if ( $latest_blog_posts->have_posts() ) : 
							while ( $latest_blog_posts->have_posts() ) : $latest_blog_posts->the_post(); 
					?>
					<div class="col-lg-<?php echo esc_attr($ethics_blog_section_column); ?> col-md-<?php echo esc_attr($ethics_blog_section_column); ?> col-sm-<?php echo esc_attr($ethics_blog_section_column); ?> col-xs-12">
						<div class="inner-news-box-top">
							<?php the_post_thumbnail(); ?>
						</div>
						<div class="inner-news-box-bottom">
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
							</h4>
							<ul class="blog-meta-list">
								<li>
									<a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><i class="fa fa-user" aria-hidden="true"></i><?php echo esc_html__( 'By', 'ethics' ); ?> <?php the_author(); ?>
									</a>
								</li>
								<li>
									<a><i class="fa fa-calendar" aria-hidden="true"></i><?php echo get_the_date();?>
									</a>
								</li>
							</ul>
								<?php the_excerpt(); ?>
								<a href="<?php the_permalink(); ?>" class="blog-meta-btn"><?php echo esc_html__( 'Read More', 'ethics' ); ?>							
							</a>
						</div>
					</div>
					<?php 
						endwhile; 
						endif; 
					?>					
				</div>
			</div>
		</div>
		<!-- News Area End Here -->
    <?php } ?>