<?php
/**
 * Template Name: Vehicle Template
 */

get_header();
?>

<div id="filter-container">
    <?php

    // Get terms from the 'vehicles_taxonomy' ACF taxonomy
    $vehicles_terms = get_terms(array(
        'taxonomy'   => 'vehicles-taxonomy',
        'hide_empty' => true,
    ));

    if (!empty($vehicles_terms) && !is_wp_error($vehicles_terms)) :
        ?>
        <div id="filter-form">
            <form method="GET">

                <div class="filter-group col-3">
                    <label for="vehicles-filter-select">Select a brand:</label>
                    <select name="vehicles_filter" id="vehicles-filter-select">
                        <option value="">Select a brand</option>
                        <?php foreach ($vehicles_terms as $vehicle_term) : ?>
                            <option value="<?php echo esc_attr($vehicle_term->term_id); ?>" <?php selected(isset($_GET['vehicles_filter']) ? $_GET['vehicles_filter'] : '', $vehicle_term->term_id); ?>>
                                <?php echo esc_html($vehicle_term->name); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="filter-group col-1">
                    <label for="vehicles-filter-select" style="visibility: hidden"> - </label>
                    <button type="submit">Filter</button>
                </div>

            </form>
        </div>
    <?php endif; ?>

    <div id="content-vehicle" class="vehicle-card-grid">
        <?php
        // Query the posts with filtering
        $args = array(
            'post_type'      => 'vehicle', // Custom post type
            'posts_per_page' => 3,        // -1 Display all posts
        );

        // Initialize tax_query
        $tax_query = array('relation' => 'AND');


        if (!empty($_GET['vehicles_filter'])) {
            $tax_query[] = array(
                'taxonomy' => 'vehicles-taxonomy',
                'field'    => 'term_id',
                'terms'    => intval($_GET['vehicles_filter']),
            );
        }

        if (!empty($tax_query)) {
            $args['tax_query'] = $tax_query;
        }

        $posts_query = new WP_Query($args);

        if ($posts_query->have_posts()) :
            while ($posts_query->have_posts()) : $posts_query->the_post();
                // Get ACF fields
                $image_v = get_field('image_v');
                $brand_v = get_field('brand_v');
                $model_v = get_field('model_v');
                $year_v = get_field('year_v'); // Number field
                $mileg_v = get_field('mileg_v');
                $price_v = get_field('price_v');
                $color_box_v = get_field('color_box_v');

                // Check if image_v is an array and extract attributes
                if (is_array($image_v)) {
                    $image_url = esc_url($image_v['url']);
                    $image_alt = esc_attr($image_v['alt']);
                    $image_width = isset($image_v['width']) ? intval($image_v['width']) : 150;
                    $image_height = isset($image_v['height']) ? intval($image_v['height']) : 150;
                } else {
                    $image_url = 'path/to/placeholder-image.png'; // Fallback placeholder image URL
                    $image_alt = 'No image available';
                    $image_width = 150;
                    $image_height = 150;
                }

                // Ensure year_v is a number and format it properly
                $formatted_year = !empty($year_v) && is_numeric($year_v) ? intval($year_v) : 'N/A';
                $formatted_mileage = !empty($mileg_v) ? number_format($mileg_v) : 'N/A';

                // Sanitize color value
                $border_color = !empty($color_box_v) ? esc_attr($color_box_v) : '#ddd';

                // Get the permalink of the current post
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
            wp_reset_postdata(); // Restore original post data
        else :
            echo '<p>No vehicles found.</p>';
        endif;
        ?>
    </div>
    <div id="loading" style="display: none;">Loading...</div>
</div>

<?php
get_footer();
?>



