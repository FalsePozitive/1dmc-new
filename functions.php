<?php
/**
 * 1DMC functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package 1DMC
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function onedmc_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on 1DMC, use a find and replace
		* to change 'onedmc' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'onedmc', get_template_directory() . '/languages' );

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
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'onedmc' ),
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
			'onedmc_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'onedmc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function onedmc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'onedmc_content_width', 640 );
}
add_action( 'after_setup_theme', 'onedmc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function onedmc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'onedmc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'onedmc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'onedmc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function onedmc_scripts() {
	wp_enqueue_style( 'onedmc-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'onedmc-style', 'rtl', 'replace' );
	
     //Slick Imports
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/slick/slick.css', array(), _S_VERSION );
	wp_enqueue_style( 'slick-theme',get_stylesheet_directory_uri() . '/slick/slick-theme.css', array(), _S_VERSION );
	wp_enqueue_script('slick-script', get_stylesheet_directory_uri() . '/slick/slick.js', array('jquery'), _S_VERSION, true);	
   	wp_enqueue_script('onedmc-script', get_stylesheet_directory_uri() . '/onedmc.js', array('jquery'), _S_VERSION, true);	
	wp_enqueue_script( 'onedmc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
      
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'onedmc_scripts' );

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
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// CUSTOM POSTS

include (get_template_directory() . "/inc/cpt/country.php");

include (get_template_directory() . "/inc/cpt/testimonials.php");

// Option Page
add_action('acf/init', function() {
  if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => '1DMC Settings',
        'menu_title'    => '1DMC Settings',
        'menu_slug'     => '1dmc-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

//     acf_add_options_sub_page(array(
//         'page_title'    => 'Theme Header Settings',
//         'menu_title'    => 'Header',
//         'parent_slug'   => 'theme-general-settings',
//     ));

//     acf_add_options_sub_page(array(
//         'page_title'    => 'Theme Footer Settings',
//         'menu_title'    => 'Footer',
//         'parent_slug'   => 'theme-general-settings',
//     ));

  }
});


// region functions

function output_country_posts_by_category( $category_slug ) {
    // Get posts in the specified category
    $args = array(
        'post_type'      => 'country',
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'country-category',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        ),
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
       
        while ( $query->have_posts() ) {
            $query->the_post();
            echo '<a style="text-transform:uppercase;" href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
        }
       
    } else {
        echo '<p>No countries found in this category.</p>';
    }

    wp_reset_postdata();
}

function output_country_posts_by_category_mobile( $category_slug ) {
    // Get posts in the specified category
    $args = array(
        'post_type'      => 'country',
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'country-category',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        ),
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
       
        while ( $query->have_posts() ) {
            $query->the_post();
            echo '<option name="' . esc_url( get_permalink() ) . '<a style="text-transform:uppercase;" href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a></option>';
        }
       
    } else {
        echo '<p>No countries found in this category.</p>';
    }

    wp_reset_postdata();
}

function output_country_cards_by_category( $category_slug ) {
    // Query args
    $args = array(
        'post_type'      => 'country',
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'country-category',
                'field'    => 'slug',
                'terms'    => $category_slug,
            ),
        ),
        'posts_per_page' => -1,
        'orderby'        => 'title',
        'order'          => 'ASC',
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        
        while ( $query->have_posts() ) {
            $query->the_post();
             $meta = get_post_meta(get_the_ID(), '_country', true);
                $company_name = !empty($meta['company_name']) ? $meta['company_name'] : '';
            // Get post thumbnail
            $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
            if ( ! $thumbnail_url ) {
                $thumbnail_url = '/wp-content/uploads/2019/07/1-DMC-World-network-Logo_250x90.jpg'; // Fallback image
            }

            // Get excerpt or fallback text
            $excerpt = get_the_excerpt();
            if ( empty( $excerpt ) ) {
                $excerpt = 'Discover more about ' . get_the_title() . '.';
            }
            echo '<a href="' . esc_url( get_permalink() ) . '">';
            echo '<div class="rcard">';
            echo '<img src="' . esc_url( $thumbnail_url ) . '" alt="' . esc_attr( get_the_title() ) . '">';
            echo '<h5>' . esc_html( get_the_title() ) . '</h5>';
            echo '<p>' . esc_html( wp_trim_words( $excerpt, 15 ) ) . '</p>';
            echo '<p>' . $company_name . '</p>';
            echo '</div>';
            echo '</a>';
        }
       
    } else {
        echo '<p>No countries found in this category.</p>';
    }

    wp_reset_postdata();
}

function output_blog_cards_by_category( $category_slug ) {
    $args = array(
        'post_type'      => 'post',           
        'post_status'    => 'publish',
        'category_name'  => $category_slug,   
        'posts_per_page' => 4,               
        'orderby'        => 'date',
        'order'          => 'DESC'
		
    );

    $query = new WP_Query( $args );

    if ( $query->have_posts() ) {
        
       while ( $query->have_posts() ) {
    $query->the_post();

    // Get thumbnail: alt thumbnail > featured image > fallback
    $alt_thumb = get_field( 'alter_thumbnail' );
    if ( $alt_thumb ) {
        $thumbnail_url = $alt_thumb;
    } else {
        $thumbnail_url = get_the_post_thumbnail_url( get_the_ID(), 'medium' );
        if ( ! $thumbnail_url ) {
            $thumbnail_url = '/wp-content/uploads/2025/01/blog.jpg'; // Fallback image
        }
    }

    // Get excerpt and trim to 115 characters
    $excerpt = get_the_excerpt();
    if ( empty( $excerpt ) ) {
        $excerpt = 'Read more about ' . get_the_title();
    }
    $excerpt = wp_html_excerpt( $excerpt, 115 );

    echo '<a href="' . esc_url( get_the_permalink() ) . '">';
    echo '<div class="bgcard">';
    echo '<img src="' . esc_url( $thumbnail_url ) . '" alt="' . esc_attr( get_the_title() ) . '"><div>';
    echo '<h5>' . esc_html( get_the_title() ) . '</h5>';
    echo '<p>' . esc_html( wp_trim_words( $excerpt, 8 ) ) . '</p></div>';
    echo '</div></a>';
}
     
    } else {
        echo '<p>No posts found in this category.</p>';
    }

    wp_reset_postdata();
}


//AJAX
function mna_enqueue_scripts() {
    wp_enqueue_script('mna-filter', get_template_directory_uri() . '/ajax.js', ['jquery'], null, true);
    wp_localize_script('mna-filter', 'mna_ajax', [
        'ajax_url' => admin_url('admin-ajax.php'),
    ]);
}
add_action('wp_enqueue_scripts', 'mna_enqueue_scripts');

function load_mna_posts() {
    $category = sanitize_text_field($_POST['category']);
    $page = intval($_POST['page']);
    $per_page = intval($_POST['per_page']);

    $args = [
        'post_type' => 'post',
        'posts_per_page' => $per_page,
        'paged' => $page,
        'category_name' => $category, // uses slug
    ];

    $query = new WP_Query($args);

 if ($query->have_posts()) : ?>
    <?php while ($query->have_posts()) : $query->the_post();

        $alt_thumb = get_field('alter_thumbnail');
        if ($alt_thumb) {
            $img_url = $alt_thumb;
        } elseif (has_post_thumbnail()) {
            $img_url = get_the_post_thumbnail_url(get_the_ID(), 'medium');
        } else {
            $img_url = '';
        }
    ?>
        <a href="<?php echo esc_url(get_the_permalink()); ?>">
            <div class="bgcard">
                <?php if ($img_url) : ?>
                    <img src="<?php echo esc_url($img_url); ?>" alt="<?php the_title_attribute(); ?>">
                <?php endif; ?>
                <div>
                    <h5><?php the_title(); ?></h5>
                    <p class="gridonly"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 10)); ?></p>
                    <p class="listonly"><?php echo esc_html(wp_trim_words(get_the_excerpt(), 30)); ?></p>
                </div>
            </div>
        </a>
    <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
<?php endif; 

    wp_die(); // required for AJAX
}
add_action('wp_ajax_load_mna_posts', 'load_mna_posts');
add_action('wp_ajax_nopriv_load_mna_posts', 'load_mna_posts');



// Register Custom Post Type: Itinerary
function create_itinerary_cpt() {

    $labels = array(
        'name'                  => _x( 'Itineraries', 'Post Type General Name', 'textdomain' ),
        'singular_name'         => _x( 'Itinerary', 'Post Type Singular Name', 'textdomain' ),
        'menu_name'             => __( 'Itineraries', 'textdomain' ),
        'name_admin_bar'        => __( 'Itinerary', 'textdomain' ),
        'archives'              => __( 'Itinerary Archives', 'textdomain' ),
        'attributes'            => __( 'Itinerary Attributes', 'textdomain' ),
        'parent_item_colon'     => __( 'Parent Itinerary:', 'textdomain' ),
        'all_items'             => __( 'All Itineraries', 'textdomain' ),
        'add_new_item'          => __( 'Add New Itinerary', 'textdomain' ),
        'add_new'               => __( 'Add New', 'textdomain' ),
        'new_item'              => __( 'New Itinerary', 'textdomain' ),
        'edit_item'             => __( 'Edit Itinerary', 'textdomain' ),
        'update_item'           => __( 'Update Itinerary', 'textdomain' ),
        'view_item'             => __( 'View Itinerary', 'textdomain' ),
        'view_items'            => __( 'View Itineraries', 'textdomain' ),
        'search_items'          => __( 'Search Itineraries', 'textdomain' ),
    );

    $args = array(
        'label'                 => __( 'Itinerary', 'textdomain' ),
        'description'           => __( 'Travel itineraries and plans', 'textdomain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'custom-fields' ),
        'taxonomies'            => array( 'itinerary_category' ), // ✅ only itinerary categories
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-location-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'rewrite'               => array( 'slug' => 'itineraries' ),
        'capability_type'       => 'post',
        'show_in_rest'          => true,
    );

    register_post_type( 'itinerary', $args );
}
add_action( 'init', 'create_itinerary_cpt', 0 );


// Register Custom Taxonomy: Itinerary Categories
function create_itinerary_taxonomy() {
    register_taxonomy(
        'itinerary_category',
        array( 'itinerary' ),
        array(
            'label'        => __( 'Itinerary Categories', 'textdomain' ),
            'rewrite'      => array( 'slug' => 'itinerary-category' ),
            'hierarchical' => true,
            'show_in_rest' => true,
        )
    );
}
add_action( 'init', 'create_itinerary_taxonomy' );


// ✅ Use itinerary.php template for single itineraries
function use_itinerary_single_template( $template ) {
    if ( is_singular( 'itinerary' ) ) {
        $new_template = locate_template( array( 'itinerary.php' ) );
        if ( '' != $new_template ) {
            return $new_template;
        }
    }
    return $template;
}
add_filter( 'single_template', 'use_itinerary_single_template' );


//kill prefixes
add_filter( 'get_the_archive_title', function( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    }
    return $title;
});


add_filter( 'wpcf7_autop_or_not', '__return_false' );


// Meta helper
function get_country_meta($post_id) {
    global $wpdb;
    
    $results = $wpdb->get_results($wpdb->prepare(
        "SELECT meta_value FROM {$wpdb->postmeta} 
        WHERE post_id = %d AND meta_key = '_country'",
        $post_id
    ));
    
    $meta = array();
    
    if (!empty($results)) {
        $raw_value = $results[0]->meta_value;
        $meta = maybe_unserialize($raw_value);
        
        if (!is_array($meta) || empty($meta)) {
            $meta = array();
            
            $fields = array(
                'image_1', 'image_2', 'image_3', 'image_4', 'image_5',
                'image_1_title', 'image_2_title', 'image_3_title', 'image_4_title', 'image_5_title',
                'logo_url', 'profile_url', 'company_name', 'first_name',
                'phone', 'mobile', 'address', 'skype', 'email', 'website',
                'services', 'highlights', 'video_youtube', 'video_vimeo', 'map',
                'itin_1', 'itin_1_name', 'itin_2', 'itin_2_name', 'itin_3', 'itin_3_name'
            );
            
            foreach ($fields as $field) {
                $field_len = strlen($field);
                $pattern = '/s:' . $field_len . ':"' . preg_quote($field, '/') . '";s:\d+:"([^"]*)"(?:;|\})/';
                if (preg_match($pattern, $raw_value, $matches)) {
                    $meta[$field] = $matches[1];
                }
            }
        }
    }
    
    return $meta;
}


//tighten search results
add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/country-search', [
        'methods'  => 'GET',
        'callback' => 'custom_country_title_search',
        'permission_callback' => '__return_true',
        'args' => [
            'search' => [
                'required' => true,
                'sanitize_callback' => 'sanitize_text_field',
            ],
        ],
    ]);
});

function custom_country_title_search( WP_REST_Request $request ) {
    global $wpdb;

    $search = $request->get_param('search');
    $like   = '%' . $wpdb->esc_like( $search ) . '%';

    $sql = $wpdb->prepare(
        "SELECT ID, post_title
         FROM {$wpdb->posts}
         WHERE post_type = %s
           AND post_status = 'publish'
           AND post_title LIKE %s
         ORDER BY post_title ASC
         LIMIT 10",
        'country',
        $like
    );

    $rows = $wpdb->get_results( $sql );

    $results = array_map(function ( $row ) {
        return [
            'id'    => (int) $row->ID,
            'title' => $row->post_title,
            'link'  => get_permalink( $row->ID ),
        ];
    }, $rows);

    return rest_ensure_response( $results );
}