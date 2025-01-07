<?php

/**
 * digitalchoice-backend functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package digitalchoice-backend
 */

if (! defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function digitalchoice_backend_setup()
{
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on digitalchoice-backend, use a find and replace
		* to change 'digitalchoice-backend' to the name of your theme in all the template files.
		*/
	load_theme_textdomain('digitalchoice-backend', get_template_directory() . '/languages');

	// Add default posts and comments RSS feed links to head.
	add_theme_support('automatic-feed-links');

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support('title-tag');

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support('post-thumbnails');

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__('Primary', 'digitalchoice-backend'),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'digitalchoice_backend_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support('customize-selective-refresh-widgets');

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action('after_setup_theme', 'digitalchoice_backend_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function digitalchoice_backend_content_width()
{
	$GLOBALS['content_width'] = apply_filters('digitalchoice_backend_content_width', 640);
}
add_action('after_setup_theme', 'digitalchoice_backend_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function digitalchoice_backend_widgets_init()
{
	register_sidebar(
		array(
			'name'          => esc_html__('Sidebar', 'digitalchoice-backend'),
			'id'            => 'sidebar-1',
			'description'   => esc_html__('Add widgets here.', 'digitalchoice-backend'),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action('widgets_init', 'digitalchoice_backend_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function digitalchoice_backend_scripts()
{
	wp_enqueue_style('digitalchoice-backend-style', get_stylesheet_uri(), array(), _S_VERSION);
	wp_style_add_data('digitalchoice-backend-style', 'rtl', 'replace');

	wp_enqueue_script('digitalchoice-backend-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
}
add_action('wp_enqueue_scripts', 'digitalchoice_backend_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
	require get_template_directory() . '/inc/jetpack.php';
}



//Custom Posts 

function services()
{

	$supports = array(
		'title', // post title
		'thumbnail', // featured images
		'span', // post span
		"editor",
	);

	$labels = array(
		'name' => _x('Services', 'plural'),
		'singular_name' => _x('Service', 'singular'),
		'menu_name' => _x('Services', 'admin menu'),
		'name_admin_bar' => _x('Services', 'admin bar'),
		'add_new' => _x('Add New Service', 'add new'),
		'add_new_item' => __('Add New Service'),
		'new_item' => __('New Service'),
		'edit_item' => __('Edit Service'),
		'view_item' => __('View Service'),
		'all_items' => __('All Services'),
		'search_items' => __('Search Services'),
		'not_found' => __('No Service found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'services'),
          'menu_icon'          => 'dashicons-yes',
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('services', $args);
}
add_action('init', 'services');

function projects()
{

	$supports = array(
		'title',
		'thumbnail',
		'span',
		"editor",

	);

	$labels = array(
		'name' => _x('Projects', 'plural'),
		'singular_name' => _x('Project', 'singular'),
		'menu_name' => _x('Projects', 'admin menu'),
		'name_admin_bar' => _x('Projects', 'admin bar'),
		'add_new' => _x('Add New Project', 'add new'),
		'add_new_item' => __('Add New Project'),
		'new_item' => __('New Project'),
		'edit_item' => __('Edit Project'),
		'view_item' => __('View Project'),
		'all_items' => __('All Projects'),
		'search_items' => __('Search Projects'),
		'not_found' => __('No Project found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'project'),
          'menu_icon'          => 'dashicons-editor-paste-word',
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('projects', $args);
}
add_action('init', 'projects');


function Faqs()
{

	$supports = array(
		'title', // post title
		'thumbnail', // featured images
		'span', // post span
		"editor",

	);

	$labels = array(
		'name' => _x('Faqs', 'plural'),
		'singular_name' => _x('Faq', 'singular'),
		'menu_name' => _x('Faqs', 'admin menu'),
		'name_admin_bar' => _x('Faqs', 'admin bar'),
		'add_new' => _x('Add New ', 'add new'),
		'add_new_item' => __('Add New Faq'),
		'new_item' => __('New Faq'),
		'edit_item' => __('Edit Faq'),
		'view_item' => __('View Faq'),
		'all_items' => __('All Faqs'),
		'search_items' => __('Search Faq'),
		'not_found' => __('No Faq found.'),
	);

	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'faq'),
          'menu_icon'          => 'dashicons-editor-help',
		'has_archive' => true,
		'hierarchical' => false,
	);
	register_post_type('faq', $args);
}
add_action('init', 'Faqs');





function register_custom_page_api()
{
	register_rest_route('custom/v1', '/page/(?P<slug>[a-zA-Z0-9-]+)', array(
		'methods'  => 'GET',
		'callback' => 'get_page_data_by_slug',
		'permission_callback' => '__return_true', // Adjust permissions if needed
	));
}

add_action('rest_api_init', 'register_custom_page_api');

function get_page_data_by_slug($request)
{
	$slug = $request['slug'];
	$page = get_page_by_path($slug, OBJECT, 'page'); // Adjust post type if necessary

	if (! $page) {
		return new WP_Error('no_page', 'Page not found', array('status' => 404));
	}

	$custom_fields = get_post_meta($page->ID);
	$response = array(
		'ID'           => $page->ID,
		'title'        => get_the_title($page->ID),
		'content'      => apply_filters('the_content', $page->post_content),
		'excerpt'      => get_the_excerpt($page->ID),
		'custom_fields' => get_field('page_data', $page->ID , true),
	);

	return rest_ensure_response($response);
}
