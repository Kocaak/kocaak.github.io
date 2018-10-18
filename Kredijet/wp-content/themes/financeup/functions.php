<?php
/**
 * financeup functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package financeup
 */


	$financeup_theme_path = get_template_directory() . '/inc/ansar/';

	require( $financeup_theme_path . '/financeup-custom-navwalker.php' );
	require( $financeup_theme_path . '/widget/financeup-service.php');
	require( $financeup_theme_path . '/font/font.php');

	/*-----------------------------------------------------------------------------------*/
	/*	Enqueue scripts and styles.
	/*-----------------------------------------------------------------------------------*/
	require( $financeup_theme_path .'/enqueue.php');
	/* ----------------------------------------------------------------------------------- */
	/* Customizer */
	/* ----------------------------------------------------------------------------------- */
	
	require( $financeup_theme_path . '/customize/ta_customize_top_header.php');
	require( $financeup_theme_path . '/customize/ta_customize_header.php');
	require( $financeup_theme_path . '/customize/ta_customize_theme_style.php');
	require( $financeup_theme_path . '/customize/ta_customize_homepage.php');
	require( $financeup_theme_path . '/customize/ta_customize_copyright.php');
	require( $financeup_theme_path . '/customize/ta_customize_pro.php');
	require( $financeup_theme_path . '/customize/customize_control/class-financeup-customize-alpha-color-control.php');
	require( $financeup_theme_path .'/import.php');
	
	
if ( ! function_exists( 'financeup_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function financeup_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on financeup, use a find and replace
	 * to change 'financeup' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'financeup', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __('Primary menu','financeup' ),
        'footer' => __('Footer Menu','financeup' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	
	//Custom Logo
	add_theme_support( 'custom-logo');

	function financeup_the_custom_logo() {
	
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}

	}

	add_filter('get_custom_logo','financeup_logo_class');


	function financeup_logo_class($html)
	{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
	}

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'financeup_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

    // Set up the woocommerce feature.
    add_theme_support( 'woocommerce');

}
endif;
add_action( 'after_setup_theme', 'financeup_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function financeup_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'financeup_content_width', 640 );
}
add_action( 'after_setup_theme', 'financeup_content_width', 0 );

/* Calling in the admin area for the Welcome Page */
if ( is_admin() ) {
	require get_template_directory() . '/inc/ansar/themeinfo/themeinfo-detail.php';
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function financeup_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'financeup' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="ta-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'financeup' ),
		'id'            => 'footer_widget_area',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="col-md-3 col-sm-6 rotateInDownLeft animated ta-widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h6>',
		'after_title'   => '</h6>',
	) );
}
add_action( 'widgets_init', 'financeup_widgets_init' );


add_action('widgets_init', 'financeup_register_widgets');

function financeup_register_widgets() {    

    register_widget('financeup_service_widget');
	
	
	$financeup_sidebars = array (  'sidebar-service' => 'sidebar-service');
	
	/* Register sidebars */
	foreach ( $financeup_sidebars as $financeup_sidebar ):
	
		if( $financeup_sidebar == 'sidebar-service' ):
		
			$financeup_name = __('Service section widgets', 'financeup');
			
		else:

			$financeup_name = $financeup_sidebar;
			
		endif;
		
        register_sidebar(
            array (
                'name'          => $financeup_name,
                'id'            => $financeup_sidebar,
                'before_widget' => '<div id="%1$s" class="ta-widget %2$s">',
                'after_widget'  => '</div>'
            )
        );
		
    endforeach;
	
}

function financeup_enqueue_customizer_controls_styles() {
  wp_register_style( 'financeup-customizer-controls', get_template_directory_uri() . '/css/customizer-controls.css', NULL, NULL, 'all' );
  wp_enqueue_style( 'financeup-customizer-controls' );
  }
add_action( 'customize_controls_print_styles', 'financeup_enqueue_customizer_controls_styles' );


/* Custom template tags for this theme. */
require get_template_directory() . '/inc/ansar/template-tags.php';

/*Load Jetpack compatibility file. */
require get_template_directory() . '/inc/jetpack.php';

/* custom-color file. */
require( get_template_directory() . '/css/colors/custom-color.php');

//Read more Button on slider & Post
function financeup_read_more() {
	
	global $post;
	
	$readbtnurl = '<a class="btn btn-tislider-two" href="' . get_permalink() . '">'.__('Read More','financeup').'</a>';
	
    return $readbtnurl;
}
add_filter( 'the_content_more_link', 'financeup_read_more' );

function financeup_import_data_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'To Set Excat Replica of Financeup Theme Install %sDemo Import%s.', 'financeup' ), '<a href="' . esc_url( admin_url( 'themes.php?page=financeup-welcome&tab=import_dummy_data' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=financeup-welcome&tab=import_dummy_data' ) ); ?>" class="button-primary" style="text-decoration: none;"><?php _e( 'Get started with Demo Import Financeup Theme', 'financeup' ); ?></a></p>
			</div>
		<?php
	}
	
add_action('admin_notices', 'financeup_import_data_notice');