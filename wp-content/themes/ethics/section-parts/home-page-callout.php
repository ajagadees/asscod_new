<?php
/**
 * // To display Footer Call Out section on front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ethics
*/
	$ethics_callouts_section = get_theme_mod( 'ethics_callout_section_hideshow','hide');
	$callout_text_value= get_theme_mod( "ethics_callout_text_value", 1 );
	$callout_button_value= get_theme_mod( "ethics_callout_button_text", 1 );  
	if( $ethics_callouts_section == "show" ) :
	?>
		<div class="contact-banner-area section-space" <?php if ( get_header_image() ){ ?> style="background-image:url('<?php header_image(); ?>')"  <?php } ?>>
		<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 in-responsive-center">
						<?php if($callout_text_value !=""){ ?>
							<h3><?php echo esc_html(get_theme_mod('ethics_callout_text_value')); ?></h3>
						<?php } ?>
					</div>
					<?php if($callout_button_value !=""){ ?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-right in-responsive-center">
							<a href="<?php echo esc_url(get_theme_mod('button_url')); ?>" class="btn-read-more"><?php echo esc_html(get_theme_mod('ethics_callout_button_text')); ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	<?php endif; ?>