<?php



//navid menu
function mynewtheme_menus() {

    $locations = array(
        'primary' => "Primary Menu header",
         'footer' => "Footer Menu Items"
    );
register_nav_menus($locations);
}

add_action( 'init', 'mynewtheme_menus');


 //add dinamic title tag support
function mynewtheme_theme_support() {

    //add dinamic title tag support
add_theme_support('title-tag');

//logo
add_theme_support('custom-logo');

//post pictures
    add_theme_support('post-thumbnails');
}


add_action( 'after_setup_theme', 'mynewtheme_theme_support');





function mynewtheme_register_style(){
    $version = wp_get_theme()->get( 'Version' );

wp_enqueue_style('mynewtheme_style', get_template_directory_uri() . "/style.css", array('mynewtheme_bootstrap'), $version, 'all');
wp_enqueue_style('mynewtheme_bootstrap', "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css", array(), '4.4.1', 'all');
wp_enqueue_style('mynewtheme_fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css", array(), '5.13.0', 'all');

}

add_action( 'wp_enqueue_scripts', 'mynewtheme_register_style');



function mynewtheme_register_scripts() {
    $version = wp_get_theme()->get( 'Version' );

    // Register and enqueue jQuery
    wp_enqueue_script(
        "mynewtheme_jquery",
        "https://code.jquery.com/jquery-3.4.1.slim.min.js",
        array(), // Dependencies (none in this case)
        "3.4.1",
        true // Load in footer
    );

    // Register and enqueue Popper.js
    wp_enqueue_script(
        "mynewtheme_popper",
        "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js",
        array(), // Dependencies (none in this case)
        "1.16.0",
        true // Load in footer
    );

    // Register and enqueue Bootstrap
    wp_enqueue_script(
        "mynewtheme_bootstrap",
        "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js",
        array("mynewtheme_jquery"), // jQuery is a dependency
        "4.4.1",
        true // Load in footer
    );

    // Register and enqueue main.js
    wp_enqueue_script(
        "mynewtheme_main",
        get_template_directory_uri() . "/assets/js/main.js",
        array("mynewtheme_jquery", "mynewtheme_bootstrap"), // Dependencies
        $version,
        true // Load in footer
    );

    // Register and enqueue reCAPTCHA

    wp_enqueue_script(
        "mynewtheme_recaptcha",
        "https://www.google.com/recaptcha/api.js?render=6LeT5iwqAAAAACzoI0wJuFMqCNv1QIkptUrj1HPP",
        array(),
        $version,
        true);

}

// Hook into the wp_enqueue_scripts action
add_action( 'wp_enqueue_scripts', 'mynewtheme_register_scripts' );




function mynewtheme_widget_areas() {

    $viff =    array(
        'before_title'   => '<h2 class="widgettitle">',
        'after_title'    => "</h2>\n",
        'before_widget'  => '<li id="%1$s" class="widget %2$s">',
        'after_widget'   => "</li>\n",
    );


register_sidebar(
    array(
        'before_title'   => '',
        'after_title'    => "",
        'before_widget'  => '',
        'after_widget'   => "",
        'name'   => 'Sidebar Area',
        'id'    => 'sidebar-1',
        'description'  => 'Sidebar Widget Area',

    )
);
    register_sidebar(
        array(
            'before_title'   => '',
            'after_title'    => "",
            'before_widget'  => '',
            'after_widget'   => "",
            'name'   => 'Footer Area',
            'id'    => 'footer-1',
            'description'  => 'Footer Widget Area',

        )
    );
}

add_action( 'widgets_init', 'mynewtheme_widget_areas');


/*
add_action('after_setup_theme', 'check_image_sizes');
function check_image_sizes() {
    global $_wp_additional_image_sizes;
    print_r($_wp_additional_image_sizes);
}
 * */



function mynewtheme_customize_register($wp_customize) {

    // Add a new section for bg color of some page
    $wp_customize->add_section('bg_page_section', array(
        'title'    => __('bg color Section', 'mytheme'),
        'priority' => 31,
    ));
    // Add setting for bgc
    $wp_customize->add_setting('bg_image_form', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bg_image_form', array(
        'label'    => __('bg Image for Form page', 'mytheme'),
        'section'  => 'bg_page_section',
        'settings' => 'bg_image_form',
    )));

    // Add setting for bgc
    $wp_customize->add_setting('bg_image_about', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bg_image_about', array(
        'label'    => __('bg Image for About page', 'mytheme'),
        'section'  => 'bg_page_section',
        'settings' => 'bg_image_about',
    )));

    // Add setting for bgc of post page
    $wp_customize->add_setting('bg_image_posts', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'bg_image_posts', array(
        'label'    => __('bg Image for Posts page', 'mytheme'),
        'section'  => 'bg_page_section',
        'settings' => 'bg_image_posts',
    )));


    // Add a new section for the hero
    $wp_customize->add_section('hero_section', array(
        'title'    => __('Hero Section', 'mytheme'),
        'priority' => 30,
    ));
    // Add setting for Hero Background Image
    $wp_customize->add_setting('hero_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label'    => __('Hero Background Image', 'mytheme'),
        'section'  => 'hero_section',
        'settings' => 'hero_image',
    )));

    // Add setting for Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'   => 'Welcome to Best Coffee Place',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_title', array(
        'label'    => __('Hero Title', 'mytheme'),
        'section'  => 'hero_section',
        'type'     => 'text',
    ));

    // Add setting for Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default'   => 'Coffee is like a warm hug in a cup, offering a comforting boost of energy to kickstart the day.',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_description', array(
        'label'    => __('Hero Description', 'mytheme'),
        'section'  => 'hero_section',
        'type'     => 'textarea',
    ));

    // Add setting for Hero Button Text
    $wp_customize->add_setting('hero_button_text', array(
        'default'   => 'Learn More',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_button_text', array(
        'label'    => __('Hero Button Text', 'mytheme'),
        'section'  => 'hero_section',
        'type'     => 'text',
    ));

    // Add setting for Hero Button URL
    $wp_customize->add_setting('hero_button_url', array(
        'default'   => home_url('/about'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('hero_button_url', array(
        'label'    => __('Hero Button URL', 'mytheme'),
        'section'  => 'hero_section',
        'type'     => 'url',
    ));


    // Add a new section for the footer
    $wp_customize->add_section('footer_section', array(
        'title'    => __('Footer Section', 'mytheme'),
        'priority' => 30,
    ));

    // Add setting for Hero Button Text
    $wp_customize->add_setting('footer_text', array(
        'default'   => 'Here have to be footer text !',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('footer_text', array(
        'label'    => __('Footer Text', 'mytheme'),
        'section'  => 'footer_section',
        'type'     => 'text',
    ));



    // Add a new section for the about
    $wp_customize->add_section('about_section', array(
        'title'    => __('About Section', 'mytheme'),
        'priority' => 30,
    ));

    // Add setting for about Background Image
    $wp_customize->add_setting('about_image', array(
        'default'   => '',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'about_image', array(
        'label'    => __('About Image', 'mytheme'),
        'section'  => 'about_section',
        'settings' => 'about_image',
    )));
    // Add setting for about Title
    $wp_customize->add_setting('about_title', array(
        'default'   => 'About',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_title', array(
        'label'    => __('About Title', 'mytheme'),
        'section'  => 'about_section',
        'type'     => 'text',
    ));

    // Add setting for about Description
    $wp_customize->add_setting('about_description', array(
        'default'   => 'Description',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_description', array(
        'label'    => __('About Description', 'mytheme'),
        'section'  => 'about_section',
        'type'     => 'textarea',
    ));

    // Add setting for about Button Text
    $wp_customize->add_setting('about_button_text', array(
        'default'   => 'Learn More',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_button_text', array(
        'label'    => __('About Button Text', 'mytheme'),
        'section'  => 'about_section',
        'type'     => 'text',
    ));

    // Add setting for about Button URL
    $wp_customize->add_setting('about_button_url', array(
        'default'   => home_url('/about'),
        'transport' => 'refresh',
    ));

    $wp_customize->add_control('about_button_url', array(
        'label'    => __('About Button URL', 'mytheme'),
        'section'  => 'about_section',
        'type'     => 'url',
    ));






}
add_action('customize_register', 'mynewtheme_customize_register');



function custom_search_form($form) {
    $form = '
    <form role="search" method="get" class="search-form" action="' . esc_url(home_url('/')) . '">
        <label>
            <span class="screen-reader-text">Search for:</span>
            <input type="search" class="search-field" placeholder="Search..." value="' . get_search_query() . '" name="s">
        </label>
        <button type="submit" class="search-submit">Search</button>
    </form>';
    return $form;
}
add_filter('get_search_form', 'custom_search_form');


//add role
function add_custom_customizer_role() {
    add_role(
        'custom_customizer', // Role ID
        __('Custom Role For Editing Site'), // Display name
        array(
            'read'                   => true,   // Allows reading content
            'edit_posts'             => true,   // Allows editing their own posts
            'edit_pages'             => true,   // Allows editing their own pages
            'edit_theme_options'     => true,   // Allows accessing the Customizer and some site settings
            'upload_files'           => true,   // Allows uploading files
            'moderate_comments'      => true,   // Allows moderating comments

            // Restrict administrative capabilities
            'manage_options'         => false,  // Disallows managing site options and settings (includes plugins and themes)
            'edit_plugins'           => false,  // Disallows editing plugins
            'install_plugins'        => false,  // Disallows installing plugins
            'update_plugins'         => false,  // Disallows updating plugins
            'delete_plugins'         => false,  // Disallows deleting plugins
            'edit_themes'            => false,  // Disallows editing themes
            'switch_themes'          => false,  // Disallows switching themes
            'install_themes'         => false,  // Disallows installing themes
            'update_themes'          => false,  // Disallows updating themes
            'delete_themes'          => false,  // Disallows deleting themes
            'edit_files'             => false,  // Disallows editing theme/plugin files
            'delete_others_posts'    => false,  // Disallows deleting others' posts
            'delete_others_pages'    => false,  // Disallows deleting others' pages
        )
    );
}
add_action('init', 'add_custom_customizer_role');

function create_team_post_type() {
    register_post_type('team_member',
        array(
            'labels'      => array(
                'name'          => __('Team Members'),
                'singular_name' => __('Team Member'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
            'menu_position' => 5,
            'menu_icon' => 'dashicons-groups',
        )
    );

    register_post_type('real_estate',
        array(
            'labels' => array(
                'name' => __('Real Estates'),
                'singular_name' => __('Real Estate'),
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array('title', 'featured-image', 'editor', 'thumbnail'), // Add 'page-attributes' if needed for templates

        )
    );

        register_post_type('olhas-by-acf',
            array(
                'labels'      => array(
                    'name'          => __('Olhas-by-ACF'),
                    'singular_name' => __('Olhas-by-ACF'),
                ),
                'public'      => true,
                'has_archive' => true,
                'supports'    => array('title', 'featured-image'),
            )
        );



}
add_action('init', 'create_team_post_type');



//add new post
function enqueue_custom_script() {
    // Enqueue the full version of jQuery
    wp_enqueue_script('jquery'); // WordPress's jQuery should be the full version

    // Enqueue your custom script
    wp_enqueue_script('custom-script', get_stylesheet_directory_uri() . '/assets/js/custom-script.js', array('jquery'), null, true);

    // Localize the script with ajaxurl
    wp_localize_script('custom-script', 'myAjax', array(
        'ajaxurl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_script');



//Handle the AJAX Request in PHP
function create_new_post() {
    // Check for nonce security or user permissions as needed
    $title = sanitize_text_field($_POST['title']);
    $content = sanitize_textarea_field($_POST['content']);

    $post_data = array(
        'post_title'   => $title,
        'post_content' => $content,
        'post_status'  => 'publish', // Change to 'draft' if you don't want to publish immediately
        'post_author'  => get_current_user_id(),
    );

    $post_id = wp_insert_post($post_data);

    if ($post_id) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }

    wp_die(); // Required to terminate immediately and return a proper response
}
add_action('wp_ajax_create_new_post', 'create_new_post');

//Add this to functions.php to load the full version of jquery manually:
function load_custom_jquery() {
    wp_deregister_script('jquery'); // Deregister the current version
    wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.6.4.min.js', array(), null, true); // Load the full version
}
add_action('wp_enqueue_scripts', 'load_custom_jquery');



function enqueue_infinite_scroll_script() {
    wp_register_script(
        'infinite-scroll',
        get_template_directory_uri() . '/infinite-scroll.js',
        array('jquery'),
        null,
        true // Load in footer
    );
    wp_enqueue_script('infinite-scroll');
}
add_action('wp_enqueue_scripts', 'enqueue_infinite_scroll_script');

function load_more_vehicles() {
    $paged = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $filter = isset($_GET['filter']) ? intval($_GET['filter']) : '';

    $args = array(
        'post_type'      => 'vehicle',
        'paged'          => $paged,
        'posts_per_page' => 3,
    );

    // Initialize tax_query
    $tax_query = array('relation' => 'AND');

    if (!empty($filter)) {
        $tax_query[] = array(
            'taxonomy' => 'vehicles-taxonomy',
            'field'    => 'term_id',
            'terms'    => $filter,
        );
    }

    if (!empty($tax_query)) {
        $args['tax_query'] = $tax_query;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        ob_start();
        while ($query->have_posts()) : $query->the_post();
            // Output post HTML
            $image_v = get_field('image_v');
            $brand_v = get_field('brand_v');
            $model_v = get_field('model_v');
            $year_v = get_field('year_v');
            $mileg_v = get_field('mileg_v');
            $price_v = get_field('price_v');
            $color_box_v = get_field('color_box_v');

            if (is_array($image_v)) {
                $image_url = esc_url($image_v['url']);
                $image_alt = esc_attr($image_v['alt']);
                $image_width = isset($image_v['width']) ? intval($image_v['width']) : 150;
                $image_height = isset($image_v['height']) ? intval($image_v['height']) : 150;
            } else {
                $image_url = 'path/to/placeholder-image.png';
                $image_alt = 'No image available';
                $image_width = 150;
                $image_height = 150;
            }

            $formatted_year = !empty($year_v) && is_numeric($year_v) ? intval($year_v) : 'N/A';
            $formatted_mileage = !empty($mileg_v) ? number_format($mileg_v) : 'N/A';

            $border_color = !empty($color_box_v) ? esc_attr($color_box_v) : '#ddd';

            $vehicle_link = get_permalink();
            ?>
            <div class="vehicle-card" style="border-color: <?php echo $border_color; ?>;">
                <div class="vehicle-card-image">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>">
                </div>
                <div class="vehicle-card-content">
                    <h2 class="vehicle-card-title"><?php echo esc_html($brand_v . ' ' . $model_v); ?></h2>
                    <p><strong>Year:</strong> <?php echo esc_html($formatted_year); ?></p>
                    <p><strong>Mileage:</strong> <?php echo esc_html($formatted_mileage); ?> miles</p>
                    <p><strong>Price:</strong> <?php echo esc_html($price_v); ?></p>
                    <p><strong>Color:</strong> <?php echo esc_html($color_box_v); ?></p>
                    <a class="view-details-button" href="<?php echo esc_url($vehicle_link); ?>">View Details</a>
                </div>
            </div>
        <?php
        endwhile;
        wp_reset_postdata();

        $response = array(
            'content' => ob_get_clean()
        );

    else :
        $response = array('content' => '');
    endif;

    wp_send_json($response);
}
add_action('wp_ajax_load_more_vehicles', 'load_more_vehicles');
add_action('wp_ajax_nopriv_load_more_vehicles', 'load_more_vehicles');
















?>


