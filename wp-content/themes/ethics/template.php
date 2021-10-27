<?php 
/**
 * Template Name: Home Page
 * @package ethics
*/
get_header();
	get_template_part( 'section-parts/home-page-slider' );
	get_template_part( 'section-parts/home-page-thecontent' );
	get_template_part( 'section-parts/home-page-about' );
	get_template_part( 'section-parts/home-page-services' );
	get_template_part( 'section-parts/home-page-callout' );
	get_template_part( 'section-parts/home-page-blog' );

get_footer(); 
?>