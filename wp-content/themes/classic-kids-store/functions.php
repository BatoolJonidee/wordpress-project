<?php
/**
 * Classic Kids Store functions and definitions
 *
 * @package Classic Kids Store
 */

if ( ! function_exists( 'classic_kids_store_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function classic_kids_store_setup() {
	global $classic_kids_store_content_width;
	if ( ! isset( $classic_kids_store_content_width ) )
		$classic_kids_store_content_width = 680;

	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wp-block-styles');
	add_theme_support( 'align-wide' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 100,
		'flex-height' => true,
	) );
	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	add_editor_style( 'editor-style.css' );
}
endif; // kindergarten_school_setup
add_action( 'after_setup_theme', 'classic_kids_store_setup' );

function classic_kids_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'classic-kids-store' ),
		'description'   => __( 'Appears on blog page sidebar', 'classic-kids-store' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 1', 'classic-kids-store' ),
		'description'   => __( 'Appears on footer', 'classic-kids-store' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-1 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 2', 'classic-kids-store' ),
		'description'   => __( 'Appears on footer', 'classic-kids-store' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-2 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 3', 'classic-kids-store' ),
		'description'   => __( 'Appears on footer', 'classic-kids-store' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-3 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer Widget 4', 'classic-kids-store' ),
		'description'   => __( 'Appears on footer', 'classic-kids-store' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="ftr-4-box widget-column-4 %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );
}
add_action( 'widgets_init', 'classic_kids_store_widgets_init' );

function classic_kids_store_enqueue_styles() {
    $parenthandle = 'classic-kids-store-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, esc_url(get_template_directory_uri()) . '/style.css',
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'classic-kids-store-child-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}
add_action( 'wp_enqueue_scripts', 'classic_kids_store_enqueue_styles' );

function classic_kids_store_sanitize_select( $input, $setting ){
        //input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
        $input = sanitize_key($input);
        //get the list of possible select options
        $choices = $setting->manager->get_control( $setting->id )->choices;
        //return input if valid or return default option
        return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
    }

// customizer css
function classic_kids_store_enqueue_customizer_css() {
    wp_enqueue_style( 'classic_kids_store-customizer-css', get_stylesheet_directory_uri() . '/css/customize-controls.css' );
}
add_action( 'customize_controls_print_styles', 'classic_kids_store_enqueue_customizer_css' );

function classic_kids_store_scripts() {
	// Style handle of parent theme.
    	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/css/bootstrap.css' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$headings_font = esc_html(get_theme_mod('classic-kids-store_headings_fonts'));
	$body_font = esc_html(get_theme_mod('classic-kids-store_body_fonts'));

	if( $headings_font ) {
		wp_enqueue_style( 'classic-kids-store-headings-fonts', '//fonts.googleapis.com/css?family='. $headings_font );
	} else {
		wp_enqueue_style( 'baloo', '//fonts.googleapis.com/css?family=Baloo+2:wght@400;500;600;700;800');
	}
	if( $body_font ) {
		wp_enqueue_style( 'nunito', '//fonts.googleapis.com/css?family='. $body_font );
	} else {
		wp_enqueue_style( 'classic-kids-store-source-body', '//fonts.googleapis.com/css?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000');
	}
}
add_action( 'wp_enqueue_scripts', 'classic_kids_store_scripts' );

add_action( 'customize_register', 'classic_kids_store_customize_register', 11 );
function classic_kids_store_customize_register() {
	global $wp_customize;

	$wp_customize->remove_setting( 'kindergarten_school_stickyheader' );
	$wp_customize->remove_control( 'kindergarten_school_stickyheader' );

	$wp_customize->remove_setting( 'kindergarten_school_social_youtube' );
	$wp_customize->remove_control( 'kindergarten_school_social_youtube' );

	$wp_customize->remove_setting( 'kindergarten_school_color_scheme_one' );
	$wp_customize->remove_control( 'kindergarten_school_color_scheme_one' );

	$wp_customize->remove_setting( 'kindergarten_school_slider' );
	$wp_customize->remove_control( 'kindergarten_school_slider' );

	$wp_customize->remove_section( 'kindergarten_school_sectionsecond' );

}


// Customizer Section
function classic_kids_store_customizer ( $wp_customize ) {

	// Hot Products Category Section
	$wp_customize->add_section('classic_kids_store_two_cols_section',array(
		'title'	=> __('Manage Products Category Section','classic-kids-store'),
		'description' => __('<p class="sec-title">Manage Products Category Section</p>','classic-kids-store'),
		'priority'	=> null,
		'panel' => 'kindergarten_school_panel_area'
	));

	$wp_customize->add_setting('classic_kids_store_product_title',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_kids_store_product_title', array(
	   'settings' => 'classic_kids_store_product_title',
	   'section'   => 'classic_kids_store_two_cols_section',
	   'label' => __('Add Section Title', 'classic-kids-store'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('classic_kids_store_product_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'classic_kids_store_product_text', array(
	   'settings' => 'classic_kids_store_product_text',
	   'section'   => 'classic_kids_store_two_cols_section',
	   'label' => __('Add Section Text', 'classic-kids-store'),
	   'type'      => 'text'
	));

	$args = array(
       	'type'                     => 'product',
        'child_of'                 => 0,
        'parent'                   => '',
        'orderby'                  => 'term_group',
        'order'                    => 'ASC',
        'hide_empty'               => false,
        'hierarchical'             => 1,
        'number'                   => '',
        'taxonomy'                 => 'product_cat',
        'pad_counts'               => false
    );
	$categories = get_categories($args);
	$cat_posts = array();
	$m = 0;
	$cat_posts[]='Select';
	foreach($categories as $category){
		if($m==0){
			$default = $category->slug;
			$m++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('classic_kids_store_hot_products_cat',array(
		'default'	=> 'select',
		'sanitize_callback' => 'classic_kids_store_sanitize_select',
	));
	$wp_customize->add_control('classic_kids_store_hot_products_cat',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select category to display products ','classic-kids-store'),
		'section' => 'classic_kids_store_two_cols_section',
	));

	$wp_customize->add_setting('kindergarten_school_social_google_plus',array(
		'sanitize_callback' => 'esc_url_raw',
	));
	$wp_customize->add_control( 'kindergarten_school_social_google_plus', array(
	   'section'   => 'kindergarten_school_social_media_section',
	   'label'	=> __('Google Plus','classic-kids-store'),
	   'type'      => 'url',
	   'priority' => null,
    ));

    $categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_post[$category->slug] = $category->name;
	}

    $wp_customize->add_setting('classic_kids_store_slidercat',array(
	    'default' => 'select',
	    'sanitize_callback' => 'kindergarten_school_sanitize_choices',
  	));
  	$wp_customize->add_control('classic_kids_store_slidercat',array(
	    'type'    => 'select',
	    'choices' => $cat_post,
	    'label' => __('Select Category to display Latest Post','classic-kids-store'),
	    'section' => 'kindergarten_school_slider_section',
	));

}

add_action( 'customize_register', 'classic_kids_store_customizer' );

// Footer Link
define('CLASSIC_KIDS_STORE_FOOTER_LINK',__('https://www.theclassictemplates.com/free-kids-wordpress-theme/','classic-kids-store'));

if ( ! defined( 'KINDERGARTEN_SCHOOL_PRO_NAME' ) ) {
	define( 'KINDERGARTEN_SCHOOL_PRO_NAME', __( 'About Classic Kids Store', 'classic-kids-store' ));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_THEME_PAGE' ) ) {
define('KINDERGARTEN_SCHOOL_THEME_PAGE',__('https://www.theclassictemplates.com/themes/','classic-kids-store'));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_SUPPORT' ) ) {
define('KINDERGARTEN_SCHOOL_SUPPORT',__('https://wordpress.org/support/theme/classic-kids-store/','classic-kids-store'));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_REVIEW' ) ) {
define('KINDERGARTEN_SCHOOL_REVIEW',__('https://wordpress.org/support/theme/classic-kids-store/reviews/#new-post','classic-kids-store'));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_PRO_DEMO' ) ) {
define('KINDERGARTEN_SCHOOL_PRO_DEMO',__('https://www.theclassictemplates.com/trial/classic-kids-store-pro/','classic-kids-store'));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_PREMIUM_PAGE' ) ) {
define('KINDERGARTEN_SCHOOL_PREMIUM_PAGE',__('https://www.theclassictemplates.com/wp-themes/kids-store-wordpress-theme/','classic-kids-store'));
}
if ( ! defined( 'KINDERGARTEN_SCHOOL_THEME_DOCUMENTATION' ) ) {
define('KINDERGARTEN_SCHOOL_THEME_DOCUMENTATION',__('https://theclassictemplates.com/documentation/classic-kids-store-free/','classic-kids-store'));
}


get_template_part('/inc/select/category-dropdown-custom-control');