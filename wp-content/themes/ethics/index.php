<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ethics
*/
get_header(); 
?>
	<div class="header-bennar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-bennar-left">
                    	<?php if (is_home() || is_front_page()) { ?>
					      	<h2 class="sub-title"><?php echo esc_html__('Blog', 'ethics') ?></h2>
					    <?php } else { ?>
					      	<h2 class="sub-title"><?php wp_title(''); ?></h2>
					    <?php } ?>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
		<!-- Page News Area Start Here -->
	<div class="page-news-area section-space-b-less-30 bg-gray">
		<div class="container">
			<div class="row ">
				<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php get_template_part('content-parts/content', get_post_format()); ?>
					</div>
					<?php 
						endwhile; else :
						get_template_part( 'content-parts/content', 'none' );
						endif; 
					?>
					<nav class="pagination-outer" aria-label="Page navigation">
						<ul class="pagination">
							<?php the_posts_pagination(
                              array(
                                    'prev_text' =>esc_html__('&laquo;','ethics'),
                                    'next_text' =>esc_html__('&raquo;','ethics')
                                	)
                                ); 
                            ?>  
						</ul>
					</nav>
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