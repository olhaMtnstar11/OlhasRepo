<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Blog Site Template">
    <meta name="author" content="https://youtube.com/FollowAndrew">    
    <link rel="shortcut icon" href="/wp-content/themes/mynewtheme/assets/images/logo.png">
    <title>hey!</title>

    <?php
wp_head(); 
?>

</head>

<body <?php body_class(); ?>>

<div class="wrapper">


<header class="site-header">
    <div class="header-container flex">

        <!-- Logo -->
        <div class="site-logo">
            <?php if (has_custom_logo()) {
                the_custom_logo();
            } else { ?>
                <a href="<?php echo esc_url(home_url('/')); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>">
                </a>
            <?php } ?>
        </div>
        <!-- Add this button to toggle the menu visibility -->
        <button class="menu-toggle">Menu</button>

        <!-- Navigation -->
        <nav class="main-navigation">



            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary', // This should match the location set in the menu settings
                'container_class' => 'primary-navigation',
                'container' => 'nav',
                'menu_class' => 'menu',        // Custom class for the menu

            ));
            ?>
        </nav>



        <!-- Header Extras (e.g., search form) -->
        <div class="header-extras">

            <!-- Example of the HTML output from get_search_form() -->
            <form role="search" method="get" class="search-form" action="/">

                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search..." value="" name="s">

                <button type="submit" class="search-submit">Search</button>
            </form>


        </div>
    </div>
</header>


<div class="content">


