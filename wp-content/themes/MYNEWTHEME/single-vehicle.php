<?php
get_header();

// Start the Loop
if (have_posts()) :
    while (have_posts()) : the_post();
        // Get ACF fields
        $image_v = get_field('image_v');
        $brand_v = get_field('brand_v');
        $model_v = get_field('model_v');
        $year_v = get_field('year_v');
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
        $border_color = !empty($color_box_v) ? esc_attr($color_box_v) : '#ddd';
        ?>
        <div class="vehicle-detail">
            <div class="vehicle-detail-image">
                <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" width="<?php echo $image_width; ?>" height="<?php echo $image_height; ?>">
            </div>
            <div class="vehicle-detail-content">
                <h1><?php echo esc_html($brand_v . ' ' . $model_v); ?></h1>
                <p><strong>Year:</strong> <?php echo esc_html($formatted_year); ?></p>
                <p><strong>Mileage:</strong> <?php echo esc_html($formatted_mileage); ?> miles</p>
                <p><strong>Price:</strong> <?php echo esc_html($price_v); ?></p>
                <p><strong>Color:</strong> <?php echo esc_html($color_box_v); ?></p>
                <!-- Add more fields as needed -->
            </div>
        </div>
    <?php
    endwhile;
endif;

get_footer();
