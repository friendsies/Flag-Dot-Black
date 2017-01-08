<?php
/**
 * Katori functions and definitions
 *
 * @package Katori
 */


if ( ! function_exists( 'katori_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function katori_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Katori, use a find and replace
	 * to change 'katori' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'katori', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Set the content width based on the theme's design and stylesheet.
	global $content_width;
	if ( ! isset( $content_width ) ) {
		$content_width = 640; /* pixels */
	}

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('katori-small', 500, 500, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'katori' ),
		'social' => __( 'Social', 'katori' ),
	) );
	
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link'
	) );

	// Setup the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'katori_custom_background_args', array(
		'default-color' => 'f6f6f6',
		'default-image' => '',
	) ) );
}
endif; // katori_setup
add_action( 'after_setup_theme', 'katori_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function katori_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'katori' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	//Register the widgets
	register_widget( 'Katori_Recent_Comments' );
	register_widget( 'Katori_Recent_Posts' );
	register_widget( 'Katori_Social_Profile' );
	register_widget( 'Katori_Video_Widget' );	
}
add_action( 'widgets_init', 'katori_widgets_init' );

/**
 * Load the widgets.
 */
require get_template_directory() . "/widgets/recent-comments.php";
require get_template_directory() . "/widgets/recent-posts.php";
require get_template_directory() . "/widgets/social-profile.php";
require get_template_directory() . "/widgets/video-widget.php";


/**
 * Enqueue scripts and styles.
 */
function katori_scripts() {

	wp_enqueue_style( 'katori-bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), true );

	wp_enqueue_style( 'katori-style', get_stylesheet_uri() );

	//Load the fonts
	$headings_font = esc_html(get_theme_mod('katori_headings_fonts'));
	$body_font = esc_html(get_theme_mod('katori_body_fonts'));
	if( $headings_font ) {
		wp_enqueue_style( 'katori-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );	
	} else {
		wp_enqueue_style( 'katori-headings-fonts', '//fonts.googleapis.com/css?family=Merriweather:900,700');
	}	
	if( $body_font ) {
		wp_enqueue_style( 'katori-body-fonts', '//fonts.googleapis.com/css?family='. $body_font );	
	} else {
		wp_enqueue_style( 'katori-body-fonts', '//fonts.googleapis.com/css?family=Fira+Sans:400,700,400italic,700italic');
	}	

	wp_enqueue_style( 'katori-font-awesome', get_template_directory_uri() . '/fonts/font-awesome.min.css' );

	wp_enqueue_script( 'katori-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'katori-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'katori-imagesloaded', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), true );

	wp_enqueue_script( 'katori-shuffle', get_template_directory_uri() . '/js/jquery.shuffle.js', array('jquery'), true );

	wp_enqueue_script( 'katori-scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), true );

	wp_enqueue_script( 'katori-fitvids', get_template_directory_uri() . '/js/jquery.fitvids.js', array('jquery'), true );



	if ( is_page_template( 'page_front-page.php' ) ) {

		wp_enqueue_style( 'katori-pretty-photo', get_template_directory_uri() . '/inc/prettyphoto/css/prettyPhoto.min.css' );

		wp_enqueue_script( 'katori-pretty-photo-js', get_template_directory_uri() .  '/inc/prettyphoto/js/jquery.prettyPhoto.min.js', array(), true );	

		wp_enqueue_script( 'katori-pretty-photo-init', get_template_directory_uri() .  '/inc/prettyphoto/js/prettyphoto-init.js', array(), true );

	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'katori_scripts' );

/**
 * Load html5shiv
 */
function katori_html5shiv() {
    echo '<!--[if lt IE 9]>' . "\n";
    echo '<script src="' . esc_url( get_template_directory_uri() . '/js/html5shiv.js' ) . '"></script>' . "\n";
    echo '<![endif]-->' . "\n";
}
add_action( 'wp_head', 'katori_html5shiv' );

/**
 * Custom excerpt length
 */
function katori_excerpt_length( $length ) {

	$excerpt = get_theme_mod('katori_exc_lenght', '55');
	return $excerpt;
	
}
add_filter( 'excerpt_length', 'katori_excerpt_length', 999 );

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
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load the slider
 */
require get_template_directory() . '/inc/slider.php';
/**
 * Dynamic styles
 */
require get_template_directory() . '/styles.php';