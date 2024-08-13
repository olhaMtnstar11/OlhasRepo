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

    wp_enqueue_script("mynewtheme_jquery", "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1", true);

    wp_enqueue_script("mynewtheme_popper", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", true);

    wp_enqueue_script("mynewtheme_bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "4.4.1", true);

    wp_enqueue_script("mynewtheme_main", get_template_directory_uri() . "/assets/js//main.js", array(), $version, true);

    
}

add_action( 'wp_enqueue_scripts', 'mynewtheme_register_scripts');



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
    // Add a new section for the hero image
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
}
add_action('customize_register', 'mynewtheme_customize_register');






?>


