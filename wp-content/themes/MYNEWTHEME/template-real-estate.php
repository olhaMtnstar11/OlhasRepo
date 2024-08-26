<?php
/**
 * Template Name: Real Estate Template
 * Template Post Type: real_estate
 */
?>
<?php
get_header();

// Query the posts
$args = array(
    'post_type'      => 'real_estate', // Change this to your custom post type if needed
    'posts_per_page' => -1,     // Number of posts to display, -1 for all
);
$posts_query = new WP_Query($args);

if ($posts_query->have_posts()) :
    ?>
    <div class="content-wrapper">
        <?php
        while ($posts_query->have_posts()) : $posts_query->the_post();
            // Get ACF fields
            $text = get_field('text_field_name');
            $image = get_field('image_field_name');
            $position = get_field('position_field_name'); // 'right text' or 'left text'

            // Check if the fields have values
            if ($text && $image && $position) :
                ?>
                <div class="content-item">
                    <?php if ($position === 'left text') : ?>
                        <!-- Image on the left, text on the right -->
                        <div class="image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                        <div class="text">
                            <p><?php echo esc_html($text); ?></p>
                        </div>
                    <?php elseif ($position === 'right text') : ?>
                        <!-- Text on the left, image on the right -->
                        <div class="text">
                            <p><?php echo esc_html($text); ?></p>
                        </div>
                        <div class="image">
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                        </div>
                    <?php endif; ?>
                </div>
            <?php
            endif;
        endwhile;
        ?>
    </div>
    <?php
    wp_reset_postdata(); // Restore original post data
endif;

get_footer();
?>
