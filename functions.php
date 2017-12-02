<?php
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
  exit;
}

class name_theme_setup {
  static function hooks() {
    add_action( 'wp_enqueue_scripts', array(__CLASS__, 'scripts') ); 
    add_action( 'after_setup_theme', array(__CLASS__, 'load_theme_textdomain') );
    add_action( 'wp_footer', array(__CLASS__, 'add_ajax_script') );
    add_action( 'after_setup_theme', array( __CLASS__, 'theme_support' ) );
    add_action( 'after_setup_theme', array( __CLASS__, 'option_menu' ), 15, 1 );
    add_action( 'init', array( __CLASS__, 'add_menu' ) );
    add_filter( 'acf/settings/load_json', array( __CLASS__, 'acf_json_load_point' ) );
    add_filter('acf/settings/save_json', array( __CLASS__, 'my_acf_json_save_point' ) );
    add_filter('upload_mimes', array( __CLASS__, 'cc_mime_types' ) );
  }
  
  static function cc_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
  }

  static function my_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    
    // return
    return $path;  
  }

  static function acf_json_load_point( $paths ) {
   // remove original path (optional)
   unset($paths[0]);
        
   // append path
   $paths[] = get_stylesheet_directory() . '/acf-json';
        
   // return
   return $paths;
  }

  static function scripts() {
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js' , array('jquery') , true );
  }

  static function add_ajax_script() {
    echo '<script type="text/javascript">let ajaxurl = "' . admin_url( 'admin-ajax.php' ) . '";</script>';
  }

  static function add_menu() {
		register_nav_menu( 'header', __( 'Header Menu' ) );
	}

  static function load_theme_textdomain() {
		load_theme_textdomain( 'name_theme', get_template_directory() . '/languages' );
  }
  
	static function option_menu() {
    if ( function_exists( 'acf_add_options_page' ) ) 
    {
			acf_add_options_page( 
        array(
          'page_title' => __( 'Theme Options', 'name_theme' ),
          'menu_title' => __( 'Theme Options', 'name_theme' ),
          'menu_slug'  => 'theme_master',
        ) 
      );
		}
  }

  static function theme_support() {
		$html5 = array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		);
		add_theme_support( 'post-formats', $html5 );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'title-tag' );
    
    //Image sizes
    add_image_size('hero', 1800, 800, false);
    add_image_size('thumbnail-small', 80, 80, true);
    add_image_size('avartar-big', 300, 300, true);
    add_image_size('avartar-small', 150, 150, true);
    add_image_size('favicon-large', 180, 180, false);
    add_image_size('favicon-medium', 32, 32, false);
    add_image_size('favicon-small', 16, 16, false);

	}
}

class name_theme_security extends name_theme_setup {
  static function security_check() {
		parent::hooks();
		add_action( 'init', array( __CLASS__, 'disable_stuff' ) );
	}

  static function disable_stuff() {
    //Disable Emoji, Move to optimization snippet...
    remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
    remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
    remove_action( 'wp_print_styles', 'print_emoji_styles' );
    remove_action( 'admin_print_styles', 'print_emoji_styles' );
    remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
    remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
    remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

    //Disable WLW, unless Windows Live Writer is used.
    remove_action( 'wp_head', 'wlwmanifest_link' );
    remove_action( 'wp_head', 'rsd_link' );

    //Disable XML RPC
    add_filter( 'xmlrpc_enabled', '__return_false' );

    //Remove extra spacing in WYSIWYG
    remove_filter( 'the_content', 'wpautop' ); 
    remove_filter( 'the_excerpt', 'wpautop' );

    //Disable feed, unless Comment Feeds are used.
    add_action( 'do_feed', 'wp_die', 1 );
    add_action( 'do_feed_rdf', 'wp_die', 1 );
    add_action( 'do_feed_rss', 'wp_die', 1 );
    add_action( 'do_feed_rss2', 'wp_die', 1 );
    add_action( 'do_feed_atom', 'wp_die', 1 );
  }
}

class name_theme extends name_theme_security {
  static function startup() {
    parent::security_check();
  }
}

name_theme::startup();

class name_theme_custom_rules {
  static function wp_menu($args = []) {
    $args = [
      'theme_location' => 'header', 
      'container' => 'nav'
    ];
    wp_nav_menu($args);
  }
}