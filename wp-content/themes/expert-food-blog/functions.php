<?php
if ( ! function_exists( 'expert_food_blog_setup' ) ) :
function expert_food_blog_setup() {

// Root path/URI.
define( 'EXPERT_FOOD_BLOG_PARENT_DIR', get_template_directory() );
define( 'EXPERT_FOOD_BLOG_PARENT_URI', get_template_directory_uri() );

// Root path/URI.
define( 'EXPERT_FOOD_BLOG_PARENT_INC_DIR', EXPERT_FOOD_BLOG_PARENT_DIR . '/inc');
define( 'EXPERT_FOOD_BLOG_PARENT_INC_URI', EXPERT_FOOD_BLOG_PARENT_URI . '/inc');

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'wc-product-gallery-zoom' );
	add_theme_support( 'wc-product-gallery-slider' );

	/*
	 * Let WordPress manage the document title.
	 */
	add_theme_support( 'title-tag' );
	
	add_theme_support( 'custom-header' );

	add_theme_support( 'responsive-embeds' );
	
	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 */
	add_theme_support( 'post-thumbnails' );
	
	//Add selective refresh for sidebar widget
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'expert-food-blog', get_template_directory() . '/languages' );
		
	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary'  => esc_html__( 'Primary Menu', 'expert-food-blog' ),
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
		
	add_theme_support('custom-logo');

	/*
	 * WooCommerce Plugin Support
	 */
	add_theme_support( 'woocommerce' );
	
	// Gutenberg wide images.
	add_theme_support( 'align-wide' );
	
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', expert_food_blog_google_font() ) );
	
	//Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'expert_food_blog_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'expert_food_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function expert_food_blog_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'expert_food_blog_content_width', 1170 );
}
add_action( 'after_setup_theme', 'expert_food_blog_content_width', 0 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

function expert_food_blog_widgets_init() {
	
	register_sidebar( array(
		'name' => __( 'Sidebar Widget Area', 'expert-food-blog' ),
		'id' => 'expert-food-blog-sidebar-primary',
		'description' => __( 'The Primary Widget Area', 'expert-food-blog' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4><div class="title"><span class="shap"></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Area', 'expert-food-blog' ),
		'id' => 'expert-food-blog-footer-widget-area',
		'description' => __( 'The Footer Widget Area', 'expert-food-blog' ),
		'before_widget' => '<div class="footer-widget col-lg-3 col-sm-6 wow fadeIn" data-wow-delay="0.2s"><aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside></div>',
		'before_title' => '<h5 class="widget-title w-title">',
		'after_title' => '</h5><span class="shap"></span>',
	) );
}
add_action( 'widgets_init', 'expert_food_blog_widgets_init' );

/**
 * All Styles & Scripts.
 */

require_once get_template_directory() . '/inc/enqueue.php';

/**
 * Nav Walker fo Bootstrap Dropdown Menu.
 */

require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';

/**
 * Implement the Custom Header feature.
 */
require_once get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require_once get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require_once get_template_directory() . '/inc/customizer.php';

require_once get_template_directory() . '/inc/fonts.php';

require_once get_template_directory() . '/wptt-webfont-loader.php';

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/aboutthemes/about-theme.php' );

/**
 * Demo Import
 */
require get_parent_theme_file_path( '/demo-import/demo-import-settings.php' );

/*
 * Enable support for Post Formats.
 *
 * See: https://codex.wordpress.org/Post_Formats
*/
add_theme_support( 'post-formats', array('image','video','gallery','audio',) );


/* Excerpt Limit Begin */
function expert_food_blog_string_limit_words($string, $word_limit) {
    $words = explode(' ', $string, ($word_limit + 1));
    if(count($words) > $word_limit)
    array_pop($words);
    return implode(' ', $words);
}

function expert_food_blog_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

// Sanitize the input
function expert_food_blog_sanitize_sidebar_position( $input ) {
    $valid = array( 'right', 'left' );

    if ( in_array( $input, $valid ) ) {
        return $input;
    } else {
        return 'right';
    }
}

add_filter( 'nav_menu_link_attributes', 'expert_food_blog_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function expert_food_blog_dropdown_data_attribute( $atts, $item, $args ) {
    if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
        if ( array_key_exists( 'data-toggle', $atts ) ) {
            unset( $atts['data-toggle'] );
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}

function expert_food_blog_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/customizer/customizer-custom-controls.php' );
}
add_action( 'customize_register', 'expert_food_blog_custom_controls' );

function expert_food_blog_remove_theme_customizer_setting($wp_customize) {
    // Remove the setting
    $wp_customize->remove_setting('display_header_text');
    // Remove the control
    $wp_customize->remove_control('display_header_text');
}
add_action('customize_register', 'expert_food_blog_remove_theme_customizer_setting', 20); 
// Use a priority greater than the one used for adding the setting


// Set the number of products per row to 3 on the shop page
add_filter('loop_shop_columns', 'expert_food_blog_custom_shop_loop_columns');

if (!function_exists('expert_food_blog_custom_shop_loop_columns')) {
    function expert_food_blog_custom_shop_loop_columns() {
        // Retrieve the number of columns from theme customizer setting (default: 3)
        $expert_food_blog_columns = get_theme_mod('expert_food_blog_custom_shop_per_columns', 3);
        return $expert_food_blog_columns;
    }
}

// Set the number of products per page on the shop page
add_filter('loop_shop_per_page', 'expert_food_blog_custom_shop_per_page', 20);

if (!function_exists('expert_food_blog_custom_shop_per_page')) {
    function expert_food_blog_custom_shop_per_page($expert_food_blog_products_per_page) {
        // Retrieve the number of products per page from theme customizer setting (default: 9)
        $expert_food_blog_products_per_page = get_theme_mod('expert_food_blog_custom_shop_product_per_page', 9);
        return $expert_food_blog_products_per_page;
    }
}

// notice
function expert_food_blog_activation_notice() {
    // Check if the notice has already been dismissed
    if (get_option('expert_food_blog_notice_dismissed')) {
        return;
    }

    // Avoid showing the notice on the demo import wizard page
    if (isset($_GET['page']) && $_GET['page'] === 'expertfoodblog-wizard') {
        return;
    }
    ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="expert-food-blog-getting-started-notice clearfix">
            <div class="expert-food-blog-theme-notice-content">
                <h2 class="expert-food-blog-notice-h2">
                    <?php
                    printf(
                        /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                        esc_html__('Welcome! Thank you for choosing %1$s!', 'expert-food-blog'), '<strong>' . wp_get_theme()->get('Name') . '</strong>'
                    );
                    ?>
                </h2>
                <a class="expert-food-blog-btn-get-started button button-primary button-hero expert-food-blog-button-padding" 
                    href="<?php echo esc_url(admin_url('themes.php?page=expertfoodblog-wizard')); ?>" 
                    id="expert-food-blog-import-button">
                    <?php esc_html_e('One Click Demo Import', 'expert-food-blog') ?>
                </a>
            </div>
        </div>
    </div>
    <?php
}

add_action('admin_notices', 'expert_food_blog_activation_notice');

// Add Ajax action to handle dismiss
add_action('wp_ajax_expert_food_blog_dismiss_notice', 'expert_food_blog_dismiss_notice');

// Reset the dismissed status when the theme is activated
function expert_food_blog_notice_status() {
    delete_option('expert_food_blog_notice_dismissed');
}
add_action('after_switch_theme', 'expert_food_blog_notice_status');

function expert_food_blog_dismiss_notice() {
    // Update the option to mark the notice as dismissed
    update_option('expert_food_blog_notice_dismissed', true);

    // Return a JSON response to indicate the success of the action
    wp_send_json_success();
}

/**
 * Enqueue theme copyright alignment style.
 */
function expert_food_blog_copyright_alignment_option() {
    // Get the alignment setting from the theme customizer.
    $expert_food_blog_copyright_alignment = get_theme_mod('expert_food_blog_copyright_alignment', 'center');

    // Start building the CSS string for the alignment.
    $expert_food_blog_copyright_alignment_css = '
        .copyright-text {
            text-align: ' . esc_attr($expert_food_blog_copyright_alignment) . ';
        }
    ';

    // Add the inline style to the theme's main stylesheet.
    wp_add_inline_style('expert-food-blog-style', $expert_food_blog_copyright_alignment_css);
}

add_action('wp_enqueue_scripts', 'expert_food_blog_copyright_alignment_option');

function expert_food_blog_fonts_scripts() {
	$expert_food_blog_headings_font = esc_html(get_theme_mod('expert_food_blog_headings_text'));
	$expert_food_blog_body_font = esc_html(get_theme_mod('expert_food_blog_body_text'));

	if( $expert_food_blog_headings_font ) {
		wp_enqueue_style( 'expert-food-blog-headings-fonts', '//fonts.googleapis.com/css?family='. $expert_food_blog_headings_font );
	} else {
		wp_enqueue_style( 'expert-food-blog-source-sans', '//fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic');
	}
	if( $expert_food_blog_body_font ) {
		wp_enqueue_style( 'expert-food-blog-body-fonts', '//fonts.googleapis.com/css?family='. $expert_food_blog_body_font );
	} else {
		wp_enqueue_style( 'expert-food-blog-source-body', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600');
	}
}
add_action( 'wp_enqueue_scripts', 'expert_food_blog_fonts_scripts' );

function expert_food_blog_customize_css() {
    ?>
    <style type="text/css">
        :root {
            --color-primary1: <?php echo esc_html( get_theme_mod( 'expert_food_blog_dynamic_color_one', '#9f1b31' ) ); ?>;
            --color-primary2: <?php echo esc_html( get_theme_mod( 'expert_food_blog_dynamic_color_two', '#ffd5d3' ) ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'expert_food_blog_customize_css' );

// Helper function to get page ID by slug
function get_page_id_by_slug($slug) {
    $page = get_page_by_path($slug); // Get the page by slug
    return $page ? $page->ID : 0;   // Return the page ID or 0 if not found
}