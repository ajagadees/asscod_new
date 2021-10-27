<?php
/**
 * // To display About Us section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ethics
*/
	$ethics_abouts_section = get_theme_mod( 'ethics_about_section_hideshow','hide');
	$about_no        = 1;
	$about_pages      = array();
	$about_icons     = array();
	for( $i = 1; $i <= $about_no; $i++ ) {
		$about_pages[]    =  get_theme_mod( "ethics_about_page_$i", 1 );
	}
	$about_args  = array(
      'post_type' => 'page',
      'post__in' => array_map( 'absint', $about_pages ),
      'posts_per_page' => absint($about_no),
      'orderby' => 'post__in'     
	); 
	$about_query = new wp_Query( $about_args );
	if( $ethics_abouts_section == "show" && $about_query->have_posts() ) :
	?>
		<div class="about-area section-space">
			<?php
			while($about_query->have_posts()) :
			$about_query->the_post();
			?>
				<div class="container">
				<?php if(has_post_thumbnail()){ ?>
					<div class="row">
						<div class="col-lg-6 col-md-7 col-sm-7 col-xs-12">
							<div class="about-left">
								<h2><?php the_title(); ?></h2>
								<?php the_content(); ?>
								<a href="<?php the_permalink(); ?>" class="btn-read-more mt-20"><?php echo esc_html__( 'Read More', 'ethics' ); ?></a>
							</div>
						</div>
						<div class="col-lg-6 col-md-5 col-sm-5 col-xs-12">
							<div class="about-right img-back-side">
								<?php the_post_thumbnail(); ?>
							</div>
						</div>
					</div> <!-- /.row -->
				<?php } else { ?>
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="about-left">
								<h2><?php the_title(); ?></h2>
								<?php the_content(); ?>	
								<a href="<?php the_permalink(); ?>" class="btn-read-more mt-20"><?php echo esc_html__( 'Read More', 'ethics' ); ?></a>
							</div>
						</div>
					</div> <!-- /.row -->
				<?php } ?>
				</div> <!-- /.container -->
			<?php
			endwhile;
			wp_reset_postdata();
			?> 
		</div> <!-- /.about-compnay -->
	<?php endif; ?>