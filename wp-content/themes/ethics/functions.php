<?php
/**
 * ethics functions and definitions
  @package ethics
 *
*/
/* Set the content width in pixels, based on the theme's design and stylesheet.
*/
	function ethics_content_width() {
		$GLOBALS['content_width'] = apply_filters( 'ethics_content_width', 980 );
	}
	add_action( 'after_setup_theme', 'ethics_content_width', 0 );
	function new_excerpt_more( $more ) {
		return '.';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	if( ! function_exists( 'ethics_theme_setup' ) ) {	
		
		function ethics_theme_setup() {
			load_theme_textdomain( 'ethics', get_template_directory() . '/languages' );			
			// Add default posts and comments RSS feed links to head.
			add_theme_support( 'automatic-feed-links' );			
			// Add title tag 
			add_theme_support( 'title-tag' );			
			// Add default logo support		
			add_theme_support( 'custom-logo');
			add_theme_support('post-thumbnails');		
			// Add theme support for Semantic Markup
			add_theme_support( 'html5', array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			) ); 			
			$defaults = array(
				'default-image'          => get_template_directory_uri() .'/assets/images/header.jpg',
				'width'                  => 1920,
				'height'                 => 600,
				'uploads'                => true,
				'default-text-color'     => "#000",
				'wp-head-callback'       => 'ethics_header_style',
			);
			add_theme_support( 'custom-header', $defaults );
			// Menus
			register_nav_menus(array(
				'primary' => esc_html__('Primary Menu', 'ethics'),
			));
			// add excerpt support for pages
			add_post_type_support( 'page', 'excerpt' );			
			if ( is_singular() && comments_open() ) {
				wp_enqueue_script( 'comment-reply' );
			}
			// Add theme support for selective refresh for widgets.
			add_theme_support( 'customize-selective-refresh-widgets' );			
			// To use additional css
			add_editor_style( 'assets/css/editor-style.css' );
		}
		add_action( 'after_setup_theme', 'ethics_theme_setup' );
	}
	/**
	 * Styles the header text color displayed on the page header title
	 */
		function ethics_header_style()
		{
			$header_text_color = get_header_textcolor();
			?>
				<style type="text/css">				
					.text-logo a, .text-logo span{
						color: #<?php echo esc_attr($header_text_color); ?>;	
					}				
				</style>
			<?php
		}
	// Register Nav Walker class_alias
	require get_template_directory(). '/lib/class-wp-bootstrap-navwalker.php';
	
	/**
	 * Enqueue CSS stylesheets
	 */		
	if( ! function_exists( 'ethics_enqueue_styles' ) ) {
		function ethics_enqueue_styles() {	
		
			wp_enqueue_style('ethics-font', 'https://fonts.googleapis.com/css?family=Raleway:400,600,500');
			wp_enqueue_style('ethics-font-2', 'https://fonts.googleapis.com/css?family=Open+Sans:400,600,300');
			wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.css');
			wp_enqueue_style('ethics-responsive', get_template_directory_uri() .'/assets/css/responsive.css');	
			wp_enqueue_style('ethics-main', get_template_directory_uri() .'/assets/css/main.css');
			wp_enqueue_style('font-awesome', get_template_directory_uri() . '/assets/css/font-awesome.css');
			wp_enqueue_style('owl-carousel', get_template_directory_uri() .'/assets/css/owl.carousel.css');	
			wp_enqueue_style('owl-theme-default', get_template_directory_uri() .'/assets/css/owl.theme.default.css');
			wp_enqueue_style('meanmenu', get_template_directory_uri() .'/assets/css/meanmenu.css');
			// main style
			wp_enqueue_style( 'ethics-style', get_stylesheet_uri() );
			wp_enqueue_style('ethics-typography', get_template_directory_uri() .'/assets/css/typography.css');			
		}
		add_action( 'wp_enqueue_scripts', 'ethics_enqueue_styles' );
	}
	/**
	 * Enqueue JS scripts
	 */
	if( ! function_exists( 'ethics_enqueue_scripts' ) ) {
		function ethics_enqueue_scripts() {   
			
			wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/assets/js/bootstrap.js',array('jquery'),'', true);
			wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js',array(),'', true);
			wp_enqueue_script('jquery-meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js',array(),'', true);
			wp_enqueue_script('jquery-scrollUp', get_template_directory_uri() . '/assets/js/jquery.scrollUp.js',array(),'', true);
			wp_enqueue_script('ethics-main', get_template_directory_uri() . '/assets/js/main.js',array(),'', true);
		}
		add_action( 'wp_enqueue_scripts', 'ethics_enqueue_scripts' );
	}
	/**
	 * Register sidebars for ethics
	*/
	function ethics_sidebars() {
		// Blog Sidebar		
		register_sidebar(array(
			'name' => esc_html__( 'Blog Sidebar', "ethics"),
			'id' => 'blog-sidebar',
			'description' => esc_html__( 'Sidebar on the blog layout.', "ethics"),
			'before_widget' => '<div id="%1$s" class=" %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="sidebar-title clearfix">',
			'after_title' => '</h3>',
		));
		// Footer Widgets		
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 1', "ethics"),
			'id' => 'ethics-footer-widget-area-1',
			'description' => esc_html__( 'The footer widget area 1', "ethics"),
			'before_widget' => ' <div class="widget %2$s clearfix">',
			'after_widget' => '</div> ',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));		
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 2', "ethics"),
			'id' => 'ethics-footer-widget-area-2',
			'description' => esc_html__( 'The footer widget area 2', "ethics"),
			'before_widget' => '<div class="widget %2$s clearfix"> ',
			'after_widget' => ' </div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));			
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 3', "ethics"),
			'id' => 'ethics-footer-widget-area-3',
			'description' => esc_html__( 'The footer widget area 3', "ethics"),
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));			
		register_sidebar(array(
			'name' => esc_html__( 'Footer Widget Area 4', "ethics"),
			'id' => 'ethics-footer-widget-area-4',
			'description' => esc_html__( 'The footer widget area 4', "ethics"),
			'before_widget' => '<div class="widget %2$s clearfix">',
			'after_widget' => '</div>',
			'before_title' => '<h3>',
			'after_title' => '</h3>',
		));		
	}
	add_action( 'widgets_init', 'ethics_sidebars' );

	
// to display site logo on mobile menu	
if( ! function_exists( 'ethics_footer_scripts' ) ) {	
function ethics_footer_scripts() {
?>
<script>
jQuery('nav#dropdown').meanmenu({
	siteLogo: '<?php if (has_custom_logo()) : ?>'+ 
			  '<?php the_custom_logo(); ?>'+
			  '<?php else : ?>'+
			  '<div class="logo-area text-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-title">'+
			  '<?php esc_html(bloginfo( 'title' )); ?>'+
			  '</a><span><?php esc_html(bloginfo( 'description' )); ?> </span></div>'+
			  '<?php endif;?>'

});
</script>
<?php
}
add_action( 'wp_footer', 'ethics_footer_scripts', 100);
}

	
require get_template_directory(). '/lib/customizer.php';
require get_template_directory(). '/lib/breadcrumbs.php';