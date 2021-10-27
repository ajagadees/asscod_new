<?php
/**
 * Template part - Service Section of HomePage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ethics
*/
	$ethics_services_title = get_theme_mod('ethics-services_title');
	$ethics_services_subtitle    = get_theme_mod( 'ethics-services_subtitle' );
	$ethics_services_section     = get_theme_mod( 'ethics_services_section_hideshow','hide');
	$ethics_services_section_column = get_theme_mod( 'ethics_services_section_columnshow','hide');

	$services_no        = 6;
	$services_pages      = array();
	$ethics_serviceicon     = array();
		for( $i = 1; $i <= $services_no; $i++ ) {
			$services_pages[]    =  get_theme_mod( "ethics_service_page_$i", 1 );
			$services_btntext[]    = get_theme_mod( "ethics_service_page_btntext_$i", '' );
			$ethics_serviceicon[]    = get_theme_mod( "ethics_page_service_icon_$i", '' );
		}
		$services_args  = array(
		  'post_type' => 'page',
		  'post__in' => array_map( 'absint', $services_pages ),
		  'posts_per_page' => absint($services_no),
		  'orderby' => 'post__in'		 
		); 
		$services_query = new   wp_Query( $services_args );
		?>	  
		<!-- Our service Area Start Here -->
		<?php if( $ethics_services_section == "show") : ?>
		<div class="service-area section-space-88-64 bg-gray">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<?php if($ethics_services_title != "" || $ethics_services_subtitle != "")   {  ?>
						<div class="section-title-area">						
								<h2><?php echo esc_html(get_theme_mod('ethics-services_title')); ?></h2>
							<div class="title-bottom-icon">
								<span class="title-bottom-icon-right"></span>
							</div>
							<p><?php echo esc_html(get_theme_mod('ethics-services_subtitle')); ?>
							</p>							
						</div>
						<?php } ?>
					</div>
				</div>
				
				<div class="row inner-section-space-top">
					<?php
						$count = 0;
						while($services_query->have_posts()) :
						$services_query->the_post();
					?>
					<div class="col-lg-<?php echo esc_attr(get_theme_mod('ethics_services_section_columnshow')); ?> col-md-<?php echo esc_attr(get_theme_mod('ethics_services_section_columnshow')); ?> col-sm-<?php echo esc_attr(get_theme_mod('ethics_services_section_columnshow')); ?> col-xs-12">
						<div class="service-box">
							<div class="service-box-top">
							<?php if($ethics_serviceicon[$count] !=""){ ?>
							<a href="<?php the_permalink(); ?>"><i class="<?php echo esc_attr($ethics_serviceicon[$count]); ?>"></i></a>
							<?php } ?>
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							</div>
							<?php the_excerpt(); ?>
						</div>
					</div>
					<?php
						$count = $count + 1; endwhile;
						wp_reset_postdata();  
					?> 
				</div>
			</div>
		</div>
		<?php endif; ?>