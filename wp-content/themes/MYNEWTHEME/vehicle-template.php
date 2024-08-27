<?php
/**
 * Template Name: Vehicle Template
<?php
/**
 * Template Name: Vehicle Template
 * Template Post Type: vehicle
 */
get_header();

// Query the posts
$args = array(
    'post_type'      => 'vehicle', // Custom post type
    'posts_per_page' => -1,     // Display all posts
);
$posts_query = new WP_Query($args);

if ($posts_query->have_posts()) :
    ?>
    <div class="vehicle-card-grid">
        <?php
        while ($posts_query->have_posts()) : $posts_query->the_post();
            // Get ACF fields
            $image_v = get_field('image_v');
            $brand_v = get_field('brand_v');
            $model_v = get_field('model_v');
            $year_v = get_field('year_v');
            $mileg_v = get_field('mileg_v');
            $price_v = get_field('price_v');
            $color_box_v = get_field('color_box_v');

            // Format the year and mileage
            $formatted_year = !empty($year_v) ? date('Y', strtotime($year_v)) : 'N/A';
            $formatted_mileage = !empty($mileg_v) ? number_format($mileg_v) : 'N/A';

            ?>
            <div class="vehicle-card">
                <?php if ($image_v) : ?>
                    <div class="vehicle-card-image">
                        <img src="<?php echo esc_url($image_v['url']); ?>" alt="<?php echo esc_attr($image_v['alt']); ?>" width="150" height="150">
                    </div>
                <?php endif; ?>
                <div class="vehicle-card-content">
                    <h2 class="vehicle-card-title"><?php echo esc_html($brand_v . ' ' . $model_v); ?></h2>
                    <p><strong>Year:</strong> <?php echo esc_html($formatted_year); ?></p>
                    <p><strong>Mileage:</strong> <?php echo esc_html($formatted_mileage); ?> miles</p>
                    <p><strong>Price:</strong> <?php echo esc_html($price_v); ?></p>
                    <p><strong>Color:</strong> <?php echo esc_html($color_box_v); ?></p>
                </div>
            </div>
        <?php
        endwhile;
        ?>
    </div>
    <?php
    wp_reset_postdata(); // Restore origin


