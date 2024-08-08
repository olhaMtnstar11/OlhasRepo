<?php



//navid menu
function mynewtheme_menus() {

    $locations = array(
        'primary' => "Dectop Primary Left SideBar",
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


?>


