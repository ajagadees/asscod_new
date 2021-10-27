<?php
/**
 * The template for displaying all single posts.
 *
 * @package ethics
*/
get_header(); 
ethics_breadcrumbs(); ?>
  	<!-- Page News Details Area Start Here -->
	<div class="page-news-details-area section-space">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
					?>
						<div class="row">
							<?php  get_template_part( 'content-parts/content', 'single' ); ?>
						</div>
					<?php endwhile; 
						else :  
                        get_template_part( 'content-parts/content', 'none' );
						endif; 
						if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif; 
					?> 
				</div>					
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
					<div class="sidebar">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Page News Details Area End Here -->			
<?php get_footer(); ?>