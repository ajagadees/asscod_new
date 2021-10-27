<?php
/**
 * Template part - HomePage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ethics
 */

$ethics_slider_section = get_theme_mod( 'ethics_slider_section_hideshow','hide');
    
    $slider_no = 3;
    $slider_pages = array();
    for( $i = 1; $i <= $slider_no; $i++ ) {
        $slider_pages[] = get_theme_mod( "ethics_slider_page_$i", 1 );
        $ethics_slider_btntxt1[] = get_theme_mod( "ethics_slider_btntxt1_$i", 1 );
        $ethics_slider_btnurl1[] = get_theme_mod( "ethics_slider_btnurl1_$i", 1 );

        $ethics_slider_btntxt2[] = get_theme_mod( "ethics_slider_btntxt2_$i", 1 );
        $ethics_slider_btnurl2[] = get_theme_mod( "ethics_slider_btnurl2_$i", 1 );

    }
    $slider_args = array(
        'post_type' => 'page',
        'post__in' => array_map( 'absint', $slider_pages ),
        'posts_per_page' => absint($slider_no),
        'orderby' => 'post__in'
       
    ); 
    
$slider_query = new wp_Query( $slider_args );

if ($ethics_slider_section =='show' ) : ?>

		<!-- Slider Area Start Here -->
		<section class="hero-slider main-slider-one">
			<div class="kon-carousel owl-carousel " data-loop="true" data-items="1" data-dots="true" data-nav="true"
			 data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="false" data-r-x-small-dots="true" data-r-x-medium="1"
			 data-r-x-medium-nav="false" data-r-x-medium-dots="true" data-r-small="1" data-r-small-nav="false" data-r-small-dots="true"
			 data-r-medium="1" data-r-medium-nav="true" data-r-medium-dots="true" data-r-large="1" data-r-large-nav="true"
			 data-r-large-dots="true">
			<?php
	            $count = 0;
	            while($slider_query->have_posts()) :
	            $slider_query->the_post();
        	?>
				<div class="item">
					<?php if(has_post_thumbnail()){  the_post_thumbnail(); } ?>
					<div class="slide-overlay">
						<div class="slide-table">
							<div class="slide-table-cell">
								<div class="container">
									<div class="row">
										<div class="col-md-8">
											<div class="slide-content">
												<h2><?php the_title(); ?> </h2>
												<?php the_content(); ?>
												<?php if ( $ethics_slider_btntxt1[$count] ): ?>
													<a href="<?php echo esc_url($ethics_slider_btnurl1[$count]); ?>" class="btn btn-theme btn-active"><?php echo esc_html($ethics_slider_btntxt1[$count]); ?></a>
												<?php endif; ?>
												<?php if ( $ethics_slider_btntxt2[$count] ): ?>
													<a href="<?php echo esc_url($ethics_slider_btnurl2[$count]); ?>" class="btn btn-theme"><?php echo esc_html($ethics_slider_btntxt2[$count]); ?>
													</a>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- item -->				
				<?php
	            $count++;
	            endwhile;
	            wp_reset_postdata();
	        	?>
			</div>
		</section>
		<!-- Slider Area End Here -->  
    <?php endif; ?>