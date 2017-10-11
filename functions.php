<?php
/**
 * Codilight Lite functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Codilight_Lite
 */

if ( ! function_exists( 'codilight_lite_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function codilight_lite_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Codilight Lite, use a find and replace
	 * to change 'codilight-lite' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'codilight-lite', get_template_directory() . '/languages' );

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
	add_image_size( 'codilight_lite_block_small', 90, 60, true ); // Archive List Posts
	add_image_size( 'codilight_lite_block_1_medium', 250, 170, true ); // Archive List Posts
	add_image_size( 'codilight_lite_block_2_medium', 325, 170, true ); // Archive Grid Posts
	add_image_size( 'codilight_lite_single_medium', 700, 350, true ); // Archive Grid Posts

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'codilight-lite' ),
		'footer' => esc_html__( 'Footer Menu', 'codilight-lite' )
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'codilight_lite_custom_background_args', array(
		'default-color' => 'f9f9f9',
		'default-image' => '',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', codilight_lite_fonts_url() ) );

}
endif; // codilight_lite_setup
add_action( 'after_setup_theme', 'codilight_lite_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function codilight_lite_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'codilight_lite_content_width', 700 );
}
add_action( 'after_setup_theme', 'codilight_lite_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function codilight_lite_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Default Sidebar', 'codilight-lite' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	// Homepage Template
	register_sidebar( array(
		'name'          => esc_html__( 'Home 1', 'codilight-lite' ),
		'id'            => 'home-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 2', 'codilight-lite' ),
		'id'            => 'home-2',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 3', 'codilight-lite' ),
		'id'            => 'home-3',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home 4', 'codilight-lite' ),
		'id'            => 'home-4',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="home-widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

}
add_action( 'widgets_init', 'codilight_lite_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function codilight_lite_scripts() {

	// Styles
	wp_enqueue_style( 'codilight-lite-google-fonts', codilight_lite_fonts_url(), array(), null );
	wp_enqueue_style( 'codilight-lite-fontawesome', get_template_directory_uri() .'/assets/css/font-awesome.min.css', array(), '4.4.0' );
	wp_enqueue_style( 'codilight-lite-style', get_stylesheet_uri() );

	// Scripts
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'codilight-lite-libs-js', get_template_directory_uri() . '/assets/js/libs.js', array(), '20120206', true );
	wp_enqueue_script( 'codilight-lite-theme-js', get_template_directory_uri() . '/assets/js/theme.js', array(), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'codilight_lite_scripts' );


if ( ! function_exists( 'codilight_lite_fonts_url' ) ) :
/**
 * Register default Google fonts
 */
function codilight_lite_fonts_url() {
    $fonts_url = '';

 	/* Translators: If there are characters in your language that are not
    * supported by merriweather, translate this to 'off'. Do not translate
    * into your own language.
    */
    $merriweather = _x( 'on', 'Open Sans font: on or off', 'codilight-lite' );

    /* Translators: If there are characters in your language that are not
    * supported by Raleway, translate this to 'off'. Do not translate
    * into your own language.
    */
    $raleway = _x( 'on', 'Raleway font: on or off', 'codilight-lite' );

    if ( 'off' !== $raleway || 'off' !== $merriweather ) {
        $font_families = array();

        if ( 'off' !== $raleway ) {
            $font_families[] = 'Raleway:300,400,500,600';
        }

        if ( 'off' !== $merriweather ) {
            $font_families[] = 'Merriweather';
        }

        $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}
endif;

if ( ! function_exists( 'codilight_lite_admin_scripts' ) ) :
/**
 * Enqueue scripts for admin page only: Theme info page
 */
function codilight_lite_admin_scripts( $hook ) {
	if ( $hook === 'widgets.php' || $hook === 'appearance_page_codilight-lite'  ) {
		wp_enqueue_style('codilight-lite-admin-css', get_template_directory_uri() . '/assets/css/admin.css');
	}
}
endif;
add_action('admin_enqueue_scripts', 'codilight_lite_admin_scripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom theme widgets.
 */
require get_template_directory() . '/inc/widgets/block_1_widget.php';
require get_template_directory() . '/inc/widgets/block_2_widget.php';
require get_template_directory() . '/inc/widgets/block_3_widget.php';
require get_template_directory() . '/inc/widgets/block_4_widget.php';

/**
 * Add theme info page
 */
require get_template_directory() . '/inc/dashboard.php';


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/tgm.php';
add_action( 'tgmpa_register', 'codilight_lite_register_required_plugins' );
function codilight_lite_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		// This is an example of how to include a plugin from the WordPress Plugin Repository.
		array(
			'name'      => 'Mega Menu plugin for WordPress',
			'slug'      => 'easymega',
			'required'  => false,
		),
	);
	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'codilight-lite',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);
	tgmpa( $plugins, $config );
}