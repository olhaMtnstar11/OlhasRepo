<?php
/**
 * Template Name: Olhas Template

 */
get_header();

// Query the posts
$args = array(
    'post_type'      => 'olhas-by-acf', // Your custom post type
    'posts_per_page' => -1,     // Display all posts
);
$posts_query = new WP_Query($args);

if ($posts_query->have_posts()) :
    ?>
    <div class="content-wrapper">
        <?php
        while ($posts_query->have_posts()) : $posts_query->the_post();
            // Get ACF fields
            $url = get_field('url'); // URL field
            $taxonomy = get_field('t-acf'); // Taxonomy field
            $text = get_field('text'); // Text field
            $img_1 = get_field('img_1'); // Image 1 field
            $img_2 = get_field('img_2'); // Image 2 field
            $number = get_field('number'); // Number field
            $add_file = get_field('add_file'); // File field

            // Check conditions
            $show_text = $taxonomy && $url;
            $show_add_file = $number > 5;

            if ($show_text || $show_add_file) :
                ?>
                <div class="content-item">
                    <?php if ($show_text) : ?>
                        <div class="text-section">
                            <p><?php echo esc_html($text); ?></p>
                        </div>
                    <?php endif; ?>

                    <?php if ($img_1) : ?>
                        <div class="image-section">
                            <img src="<?php echo esc_url($img_1['url']); ?>" alt="<?php echo esc_attr($img_1['alt']); ?>">
                        </div>
                    <?php endif; ?>

                    <?php if ($img_2) : ?>
                        <div class="image-section">
                            <img src="<?php echo esc_url($img_2['url']); ?>" alt="<?php echo esc_attr($img_2['alt']); ?>">
                        </div>
                    <?php endif; ?>

                    <?php if ($show_add_file && $add_file) : ?>
                        <div class="file-section">
                            <a href="<?php echo esc_url($add_file['url']); ?>" download><?php echo esc_html($add_file['filename']); ?></a>
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

