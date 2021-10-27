<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package ethics
 */
	$ethics_footer_section = get_theme_mod('ethics_footer_section_hideshow','show');
	if ($ethics_footer_section =='show') { 
	?>
		<!-- Footer Area Start Here -->
		<footer>
			<div class="footer-area-top section-space-b-less-30">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30">
							<?php dynamic_sidebar('ethics-footer-widget-area-1'); ?>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30">
							<?php dynamic_sidebar('ethics-footer-widget-area-2'); ?>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30">
							<?php dynamic_sidebar('ethics-footer-widget-area-3'); ?>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 margin-b-30">
							<?php dynamic_sidebar('ethics-footer-widget-area-4'); ?>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-area-bottom">
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<p><?php if( get_theme_mod('ethics-footer_title') ) : ?>
								<?php echo wp_kses_post( html_entity_decode(get_theme_mod('ethics-footer_title'))); ?>
								<?php else : 
									/* translators: 1: poweredby, 2: link, 3: span tag closed  */
									printf( esc_html__( ' %1$sPowered by %2$s%3$s', 'ethics' ), '<span>', '<a href="'. esc_url( __( 'https://wordpress.org/', 'ethics' ) ) .'" target="_blank">'.esc_html__('WordPress', 'ethics').'</a>', '</span>' );
									/* translators: 1: poweredby, 2: link, 3: span tag closed  */
									printf( esc_html__( ' Theme: ethics by: %1$sDesign By %2$s%3$s', 'ethics' ), '<span>', '<a href="'. esc_url( __( 'https://wpshopmart.com/', 'ethics' ) ) .'" target="_blank">'.esc_html__('wpshopmart', 'ethics').'</a>', '</span>' );
								endif;  
							?></p>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer Area End Here -->
	<?php } ?>
	<!-- Preloader Start Here -->
	
		 <!-- Scroll Top Button -->
		<a id="scrollUp" href="#top" ><i class="fa fa-long-arrow-up"></i></a>
<?php wp_footer(); ?>
</div>
</body>

</html>