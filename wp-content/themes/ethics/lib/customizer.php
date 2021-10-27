<?php
/**
 * ethics Theme Customizer
 *
 * @package ethics
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */


function ethics_customize_register( $wp_customize ) {	
	 
	// ethics theme choice options
	if (!function_exists('ethics_section_choice_option')) :
		function ethics_section_choice_option()
		{
			$ethics_section_choice_option = array(
				'show' => esc_html__('Show', 'ethics'),
				'hide' => esc_html__('Hide', 'ethics')
			);
			return apply_filters('ethics_section_choice_option', $ethics_section_choice_option);
		}
	endif;

	//// ethics service column choice options
	if (!function_exists('ethics_services_section_columnshow')) :
		function ethics_services_section_columnshow()
		{
			$ethics_services_section_columnshow = array(
				'6' => esc_html__('2 COLUMN', 'ethics'),
				'4' => esc_html__('3 COLUMN', 'ethics'),
			);
			return apply_filters('ethics_services_section_columnshow', $ethics_services_section_columnshow);
		}
	endif;

	//// ethics blog column choice options
	if (!function_exists('ethics_blog_section_columnshow')) :
		function ethics_blog_section_columnshow()
		{
			$ethics_blog_section_columnshow = array(
				'6' => esc_html__('2 COLUMN', 'ethics'),
				'4' => esc_html__('3 COLUMN', 'ethics'),
			);
			return apply_filters('ethics_blog_section_columnshow', $ethics_blog_section_columnshow);
		}
	endif;


	/**
	 * Sanitizing the select callback example
	 *
	 */
	if ( !function_exists('ethics_sanitize_select') ) :
		function ethics_sanitize_select( $input, $setting ) {

			// Ensure input is a slug.
			$input = sanitize_text_field( $input );

			// Get list of choices from the control associated with the setting.
			$choices = $setting->manager->get_control( $setting->id )->choices;

			// If the input is a valid key, return it; otherwise, return the default.
			return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
		}
	endif;

	/**
	 * Drop-down Pages sanitization callback example.
	 *
	 * - Sanitization: dropdown-pages
	 * - Control: dropdown-pages
	 * 
	 * Sanitization callback for 'dropdown-pages' type controls. This callback sanitizes `$page_id`
	 * as an absolute integer, and then validates that $input is the ID of a published page.
	 * 
	 * @see absint() https://developer.wordpress.org/reference/functions/absint/
	 * @see get_post_status() https://developer.wordpress.org/reference/functions/get_post_status/
	 *
	 * @param int                  $page    Page ID.
	 * @param WP_Customize_Setting $setting Setting instance.
	 * @return int|string Page ID if the page is published; otherwise, the setting default.
	 */
	function ethics_sanitize_dropdown_pages( $page_id, $setting ) {
		// Ensure $input is an absolute integer.
		$page_id = absint( $page_id );
		
		// If $page_id is an ID of a published page, return it; otherwise, return the default.
		return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}
	
	
	/** Front Page Section Settings starts **/	

	$wp_customize->add_panel(
		'ethics_frontpage', 
		array(
			'title' => esc_html__('Ethics Options', 'ethics'),        
			'description' => '',                                        
			'priority' => 3,
		)
	);
	
	

	// Header info
	$wp_customize->add_section(
		'ethics_header_section', 
		array(
			'title'   => esc_html__('Top Header Info Section', 'ethics'),
			'description' => '',
			'panel' => 'ethics_frontpage',
			'priority'    => 130
		)
	);

	$wp_customize->add_setting(
		'ethics_header_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'ethics_sanitize_select',
		)
	);

	$ethics_section_choice_option = ethics_section_choice_option();
	$wp_customize->add_control(
		'ethics_header_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Header Info Option', 'ethics'),
			'description' => esc_html__('Show/hide option for Header Section.', 'ethics'),
			'section' => 'ethics_header_section',
			'choices' => $ethics_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'ethics_header_phone_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ethics_header_phone_value', 
		array(
			'label'   => esc_html__('Phone', 'ethics'),
			'section' => 'ethics_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'ethics_header_email_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ethics_header_email_value', 
		array(
			'label'   => esc_html__('E-mail', 'ethics'),
			'section' => 'ethics_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'ethics_header_address_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ethics_header_address_value', 
		array(
			'label'   => esc_html__('Address', 'ethics'),
			'section' => 'ethics_header_section',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'ethics_header_button_value',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'ethics_header_button_value',
			array(
				'label'    			=> esc_html__( 'Header Button Text','ethics' ),
				'section'  			=> 'ethics_header_section',
				'priority' 			=> 3
			)
		);

		$wp_customize->add_setting( 
			'ethics_header_btnurl',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( 
			'ethics_header_btnurl',
			array(
				'label'    			=> esc_html__( 'Header Button URL', 'ethics' ),
				'section'  			=> 'ethics_header_section',
				'priority' 			=> 3,
			)
		);
	////End Header info Section

	/** Start slider customizer **/
	$wp_customize->add_section('sliderinfo', array(
		'title'   => esc_html__('Home Slider Section', 'ethics'),
		'description' => '',
		'panel' => 'ethics_frontpage',
		'priority'    => 140
		)
	);

	// hide show
	$wp_customize->add_setting('ethics_slider_section_hideshow', array(
		'default' => 'hide',
		'sanitize_callback' => 'ethics_sanitize_select',
		)
	);

	$ethics_section_choice_option = ethics_section_choice_option();

	$wp_customize->add_control(
		'ethics_slider_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Slider Option', 'ethics'),
			'description' => esc_html__('Show/hide option for Slider Section.', 'ethics'),
			'section' => 'sliderinfo',
			'choices' => $ethics_section_choice_option,
			'priority' => 1
		)
	);

	$slider_no = 3;

	for( $i = 1; $i <= $slider_no; $i++ )
	{
		$ethics_slider_page = 'ethics_slider_page_' .$i;

		$ethics_slider_btntxt1 = 'ethics_slider_btntxt1_' . $i;
		$ethics_slider_btnurl1 = 'ethics_slider_btnurl1_' .$i;

		$ethics_slider_btntxt2 = 'ethics_slider_btntxt2_' . $i;
		$ethics_slider_btnurl2 = 'ethics_slider_btnurl2_' .$i;

		$wp_customize->add_setting( $ethics_slider_page,
			array(
				'default'           => 1,
				'sanitize_callback' => 'ethics_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( $ethics_slider_page,
			array(
				'label'    			=> esc_html__( 'Slider Page ', 'ethics' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $ethics_slider_btntxt1,
			array(
				'default'           => 'enter text',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $ethics_slider_btntxt1,
			array(
				'label'    			=> esc_html__( 'Slider Button Text ', 'ethics' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $ethics_slider_btnurl1,
			array(
				'default'           => '#',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $ethics_slider_btnurl1,
			array(
				'label'    			=> esc_html__( 'Button URL ', 'ethics' ) .$i,
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $ethics_slider_btntxt2,
			array(
				'default'           => 'enter text',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $ethics_slider_btntxt2,
			array(
				'label'    			=> esc_html__( 'Slider Button Text ', 'ethics' ) .($i+1),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);

		$wp_customize->add_setting( $ethics_slider_btnurl2,
			array(
				'default'           => '#',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control( $ethics_slider_btnurl2,
			array(
				'label'    			=> esc_html__( 'Button URL ', 'ethics' ) .($i+1),
				'section'  			=> 'sliderinfo',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
	}
	/** End **/

	////Start About info Section
	$wp_customize->add_section(
		'about', 
		array(
			'title'   => esc_html__('Home About Section', 'ethics'),
			'description' => '',
			'panel' => 'ethics_frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'ethics_about_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'ethics_sanitize_select',
		)
	);

	$ethics_section_choice_option = ethics_section_choice_option();
	$wp_customize->add_control(
		'ethics_about_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'ethics'),
			'description' => esc_html__('Show/hide option for About Section.', 'ethics'),
			'section' => 'about',
			'choices' => $ethics_section_choice_option,
			'priority' => 1
		)
	);

    $about_no = 1;
	for( $i = 1; $i <= $about_no; $i++ ) {
		$ethics_aboutpage = 'ethics_about_page_' . $i;
	// Setting - About page
	$wp_customize->add_setting( 
			$ethics_aboutpage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'ethics_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$ethics_aboutpage,
			array(
				'label'    			=> esc_html__( 'About Page ', 'ethics' ),
				'section'  			=> 'about',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
	}
	////End about info Section

	////Start Service info Section
		$wp_customize->add_section(
		'services', 
		array(
			'title'   => esc_html__('Home Service Section', 'ethics'),
			'description' => '',
			'panel' => 'ethics_frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'ethics_services_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'ethics_sanitize_select',
		)
	);

	$ethics_section_choice_option = ethics_section_choice_option();
	$wp_customize->add_control(
		'ethics_services_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'ethics'),
			'description' => esc_html__('Show/hide option for Service Section.', 'ethics'),
			'section' => 'services',
			'choices' => $ethics_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'ethics_services_section_columnshow',
		array(
			'default' => '4',
			'sanitize_callback' => 'ethics_sanitize_select',
		)
	);

	$ethics_services_section_columnshow = ethics_services_section_columnshow();
    $wp_customize->add_control(
    'ethics_services_section_columnshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Select Column', 'ethics'),
        'description' => esc_html__('Select Service Column option for Service.', 'ethics'),
        'section' => 'services',
        'choices' => $ethics_services_section_columnshow,
        'priority' => 3
    )
    );

	$wp_customize->add_setting(
		'ethics-services_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'ethics-services_title',
		array(
			'label'   => esc_html__('Services Section Title', 'ethics'),
			'section' => 'services',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'ethics-services_subtitle',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'ethics-services_subtitle',
		array(
			'label'   => esc_html__('Services Section Sub Title', 'ethics'),
			'section' => 'services',
			'priority'  => 3
		)
	);

    $service_no = 6;
	for( $i = 1; $i <= $service_no; $i++ ) {
		$ethics_servicepage = 'ethics_service_page_' . $i;
		$ethics_serviceicon = 'ethics_page_service_icon_' . $i;
		$ethics_servicepage_btntext = 'ethics_service_page_btntext_' . $i;

	// Setting - Service page
	$wp_customize->add_setting( 
			$ethics_servicepage,
			array(
				'default'           => 1,
				'sanitize_callback' => 'ethics_sanitize_dropdown_pages',
			)
		);

		$wp_customize->add_control( 
			$ethics_servicepage,
			array(
				'label'    			=> esc_html__( 'Service Page ', 'ethics' ) .$i,
				'section'  			=> 'services',
				'type'     			=> 'dropdown-pages',
				'priority' 			=> 100,
			)
		);
		//Setting Feature Icon
		$wp_customize->add_setting( 
			$ethics_serviceicon,
			array(
				'default'           => '',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);
		$wp_customize->add_control( 
			$ethics_serviceicon,
			array(
				'label'    			=> esc_html__( 'Service Icon ', 'ethics' ).$i,
				'description' 		=>  __('Select a icon in this list <a target="_blank" href="https://fontawesome.com/v4.7.0/icons/">Font Awesome icons</a> and enter the class name','ethics'),
				'section'  			=> 'services',
				'type'     			=> 'text',
				'priority' 			=> 100,
			)
		);
	}
	////End Service info Section

	////Start callout info Section
	$wp_customize->add_section(
		'callout', 
		array(
			'title'   => esc_html__('Home Callout Section', 'ethics'),
			'description' => '',
			'panel' => 'ethics_frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'ethics_callout_section_hideshow',
		array(
			'default' => 'hide',
			'sanitize_callback' => 'ethics_sanitize_select',
		)
	);

	$ethics_section_choice_option = ethics_section_choice_option();
	$wp_customize->add_control(
		'ethics_callout_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'ethics'),
			'description' => esc_html__('Show/hide option for Callout Section.', 'ethics'),
			'section' => 'callout',
			'choices' => $ethics_section_choice_option,
			'priority' => 1
		)
	);



		$wp_customize->add_setting(
		'ethics_callout_text_value', 
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'ethics_callout_text_value', 
		array(
			'label'   => esc_html__('Callout Text', 'ethics'),
			'section' => 'callout',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'ethics_callout_button_text',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			'ethics_callout_button_text',
			array(
				'label'    			=> esc_html__( 'Callout Button Text','ethics' ),
				'section'  			=> 'callout',
				'priority' 			=> 3
			)
		);

		$wp_customize->add_setting( 
			'ethics_callout_button_url',
			array(
				'default'           => '',
				'type'      		=> 'theme_mod',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control( 
			'ethics_callout_button_url',
			array(
				'label'    			=> esc_html__( 'Button URL', 'ethics' ),
				'section'  			=> 'callout',
				'priority' 			=> 3,
			)
		);
	
	////End callout info Section

	////Start Blog info Section
		$wp_customize->add_section(
		'blog', 
		array(
			'title'   => esc_html__('Home Blog Section', 'ethics'),
			'description' => '',
			'panel' => 'ethics_frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'ethics_blog_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'ethics_sanitize_select',
		)
	);

	$ethics_section_choice_option = ethics_section_choice_option();
	$wp_customize->add_control(
		'ethics_blog_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Section Option', 'ethics'),
			'description' => esc_html__('Show/hide option for Blog Section.', 'ethics'),
			'section' => 'blog',
			'choices' => $ethics_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'ethics_blog_section_columnshow',
		array(
			'default' => '4',
			'sanitize_callback' => 'ethics_sanitize_select',
		)
	);

	$ethics_blog_section_columnshow = ethics_blog_section_columnshow();
    $wp_customize->add_control(
    'ethics_blog_section_columnshow',
    array(
        'type' => 'radio',
        'label' => esc_html__('Select Column', 'ethics'),
        'description' => esc_html__('Select Service Column option for Service.', 'ethics'),
        'section' => 'blog',
        'choices' => $ethics_blog_section_columnshow,
        'priority' => 3
    )
    );

    $wp_customize->add_setting(
		'ethics-blog_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'ethics-blog_title',
		array(
			'label'   => esc_html__('Blog Section Title', 'ethics'),
			'section' => 'blog',
			'priority'  => 3
		)
	);

	$wp_customize->add_setting(
		'ethics-blog_subtitle',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'sanitize_text_field'
		)
	);

    $wp_customize->add_control(
		'ethics-blog_subtitle',
		array(
			'label'   => esc_html__('Blog Section Sub Title', 'ethics'),
			'section' => 'blog',
			'priority'  => 3
		)
	);

	

    ////Start footer Section
	
	$wp_customize->add_section(
		'footer',
		array(
			'title'   => esc_html__('Footer Section', 'ethics'),
			'description' => '',
			'panel' => 'ethics_frontpage',
			'priority'    => 180
		)
	);

	$wp_customize->add_setting(
		'ethics_footer_section_hideshow',
		array(
			'default' => 'show',
			'sanitize_callback' => 'ethics_sanitize_select',
		)
	);
	$ethics_section_choice_option = ethics_section_choice_option();
	$wp_customize->add_control(
		'ethics_footer_section_hideshow',
		array(
			'type' => 'radio',
			'label' => esc_html__('Footer Option', 'ethics'),
			'description' => esc_html__('Show/hide option for Footer Section.', 'ethics'),
			'section' => 'footer',
			'choices' => $ethics_section_choice_option,
			'priority' => 1
		)
	);

	$wp_customize->add_setting(
		'ethics-footer_title',
		array(
			'default'   => '',
			'type'      => 'theme_mod',
			'sanitize_callback'	=> 'wp_kses_post'
		)
	);

	$wp_customize->add_control(
		'ethics-footer_title',
		array(
			'label'   => esc_html__('Copyright', 'ethics'),
			'section' => 'footer',
			'type'      => 'textarea',
			'priority'  => 1
		)
	);
}
add_action( 'customize_register', 'ethics_customize_register' );