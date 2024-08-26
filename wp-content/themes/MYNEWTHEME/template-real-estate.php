<?php
/* Template Name: Real Estate Template */
get_header(); ?>

<div class="container-real-estate">
    <h1><?php the_title(); ?></h1>

    <?php
    // Check if the ACF plugin is active
    if (function_exists('get_field')) {

        // Get the custom fields
        $image = get_field('image_field_name'); // Replace with your actual field name
        $text = get_field('text_field_name'); // Replace with your actual field name

        if ($image) {
            echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
        }

        if ($text) {
            echo '<p>' . esc_html($text) . '</p>';
        }
    }
    ?>
</div>

<?php get_footer(); ?>
