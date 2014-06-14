<?php
/**
 * techcontinuum1_s functions and definitions
 *
 * @package techcontinuum1_s
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

/*
 * Load Jetpack compatibility file.
 */
require( get_template_directory() . '/inc/jetpack.php' );

if ( ! function_exists( 'techcontinuum1_s_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function techcontinuum1_s_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	require( get_template_directory() . '/inc/extras.php' );

	/**
	 * Customizer additions
	 */
	require( get_template_directory() . '/inc/customizer.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on techcontinuum1_s, use a find and replace
	 * to change 'techcontinuum1_s' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'techcontinuum1_s', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses TWO wp_nav_menu()
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'techcontinuum1_s' ),
	) );

	register_nav_menus( array(
		'secondary' => __( 'Secondary Menu', 'techcontinuum1_s' ),
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );
}
endif; // techcontinuum1_s_setup
add_action( 'after_setup_theme', 'techcontinuum1_s_setup' );

/**
 * Setup the WordPress core custom background feature.
 *
 * Use add_theme_support to register support for WordPress 3.4+
 * as well as provide backward compatibility for WordPress 3.3
 * using feature detection of wp_get_theme() which was introduced
 * in WordPress 3.4.
 *
 * @todo Remove the 3.3 support when WordPress 3.6 is released.
 *
 * Hooks into the after_setup_theme action.
 */
function techcontinuum1_s_register_custom_background() {
	$args = array(
		'default-color' => 'ffffff',
		'default-image' => '',
	);

	$args = apply_filters( 'techcontinuum1_s_custom_background_args', $args );

	if ( function_exists( 'wp_get_theme' ) ) {
		add_theme_support( 'custom-background', $args );
	} else {
		define( 'BACKGROUND_COLOR', $args['default-color'] );
		if ( ! empty( $args['default-image'] ) )
			define( 'BACKGROUND_IMAGE', $args['default-image'] );
		add_custom_background();
	}
}
add_action( 'after_setup_theme', 'techcontinuum1_s_register_custom_background' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function techcontinuum1_s_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'techcontinuum1_s' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title"><span class="icon-reorder"></span>',
		'after_title'   => '</h1>',
	) );

	register_sidebar(array(
    'id' => 'header-widget-left-featured',
    'name' => __('Left featured', 'techcontinuum1_s'),
    'description' => __('Widget area below the header, left area','techcontinuum1_s'),
    'before_widget' => '<div class="left-featured">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>'
	));
	register_sidebar(array(
		'id' => 'header-widget-right-featured',
		'name' => __('Right featured', 'techcontinuum1_s'),
		'description' => __('Widget area below the header, right area','techcontinuum1_s'),
		'before_widget' => '<div class="right-featured">',
		'after_widget' => '</div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>'
	));
	
}
add_action( 'widgets_init', 'techcontinuum1_s_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function techcontinuum1_s_scripts() {
	wp_enqueue_style( 'techcontinuum1_s-style', get_stylesheet_uri() );

	wp_enqueue_style( 'fontawesome-css', get_template_directory_uri() . '/font-awesome.min.css' );

	wp_enqueue_style( 'ubuntu-webfont', 'http://fonts.googleapis.com/css?family=Ubuntu:300');

	wp_enqueue_script( 'techcontinuum1_s-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'techcontinuum1_s-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/*wp_enqueue_script( 'techcontinuum1_s-jquery', get_template_directory_uri() . '/js/jquery-1.9.1.min.js', array(), 'jquery191', true);*/

	wp_enqueue_script( 'techcontinuum1_s-script', get_template_directory_uri() . '/js/script.js', array(), '20130330', true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'techcontinuum1_s-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'techcontinuum1_s_scripts' );

function new_excerpt_more( $more ) {
	return ' <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">[read more...]</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

function wp_trim_excerpt_mod($text = '') {
	$raw_excerpt = $text;
	if ( '' == $text ) {
		$text = get_the_content('');

		$text = strip_shortcodes( $text );

		$text = apply_filters('the_content', $text);
		$text = str_replace(']]>', ']]&gt;', $text);
		$excerpt_length = apply_filters('excerpt_length', 80);
		$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
		$text = wp_trim_words_mod( $text, $excerpt_length, $excerpt_more );
	}
	return apply_filters('wp_trim_excerpt_mod', $text, $raw_excerpt);
}

function wp_trim_words_mod( $text, $num_words = 55, $more = null ) {
	if ( null === $more )
		$more = __( '&hellip;' );
	$original_text = $text;

	//$text = wp_strip_all_tags( $text );
	//$allowed_tags = 'img, span';
	//$text = strip_tags($text, $allowed_tags);
	/* translators: If your word count is based on single characters (East Asian characters),
	   enter 'characters'. Otherwise, enter 'words'. Do not translate into your own language. */
	if ( 'characters' == _x( 'words', 'word count: words or characters?' ) && preg_match( '/^utf\-?8$/i', get_option( 'blog_charset' ) ) ) {
		$text = trim( preg_replace( "/[\n\r\t ]+/", ' ', $text ), ' ' );
		preg_match_all( '/./u', $text, $words_array );
		$words_array = array_slice( $words_array[0], 0, $num_words + 1 );
		$sep = '';
	} else {
		$words_array = preg_split( "/[\n\r\t ]+/", $text, $num_words + 1, PREG_SPLIT_NO_EMPTY );
		$sep = ' ';
	}
	if ( count( $words_array ) > $num_words ) {
		array_pop( $words_array );
		$text = implode( $sep, $words_array );
		$text = $text . $more;
	} else {
		$text = implode( $sep, $words_array );
	}
	return apply_filters( 'wp_trim_words', $text, $num_words, $more, $original_text );
}

remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_excerpt_mod');

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );
