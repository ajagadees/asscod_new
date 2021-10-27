<?php 
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package ethics
*/	
get_header(); ?>
	<div class="header-bennar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-bennar-left">
                        <h2 class="sub-title"><?php the_archive_title(); ?></h2>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-bennar-right">
                        <ul>
                            <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html__( 'Home', 'ethics' ); ?></a> <?php echo esc_html__( '/', 'ethics' ); ?> </li>
                            <li><?php wp_title(''); ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- Page News Area Start Here -->
	<div class="page-news-area  section-space-b-less-30 bg-gray">
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