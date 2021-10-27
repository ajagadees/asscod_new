<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package ethics
*/
get_header(); ethics_breadcrumbs(); ?>
	<!-- Page News Area Start Here -->
	<div class="page-news-details-area page-content section-space-b-less-30 bg-gray">
		<div class="container">
			<div class="row ">
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
						if(has_post_thumbnail()) : 
							the_post_thumbnail(); 
						endif; 
					?>
				    <div class="content">
				   		<?php the_content();
				   			wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages: ', 'ethics' ),
							'after'  => '</div>',
							) );
				   		?>
					</div>
				    <?php
						endwhile;
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
<?php get_footer(); ?>		