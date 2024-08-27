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
    <div class="grid-wrapper">
        <?php
        while ($posts_query->have_posts()) : $posts_query->the_post();
            // Get ACF fields
            $fields = array(
                'URL'          => get_field('url'),
                'Taxonomy'     => get_field('t-acf'),
                'Text'         => get_field('text'),
                'Image 1'      => get_field('img_1'),
                'Image 2'      => get_field('img_2'),
                'Number'       => get_field('number'),
                'File'         => get_field('add_file'),
            );
            ?>
            <div class="grid-item">
                <h2><?php the_title(); ?></h2>
                <table>
                    <tbody>
                    <?php foreach ($fields as $label => $value) : ?>
                        <tr>
                            <th><?php echo esc_html($label); ?></th>
                            <td>
                                <?php
                                if (is_array($value)) {
                                    // Handle different types of values
                                    if (isset($value['url'])) {
                                        // URL or file
                                        echo '<a href="' . esc_url($value['url']) . '" download>' . esc_html($value['filename'] ?? 'Download') . '</a>';
                                    } elseif (isset($value['url'])) {
                                        // Image
                                        echo '<img src="' . esc_url($value['url']) . '" alt="' . esc_attr($value['alt']) . '">';
                                    }
                                } else {
                                    // Text and number
                                    echo esc_html($value);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php
        endwhile;
        ?>
    </div>
    <?php
    wp_reset_postdata(); // Restore original post data
endif;

get_footer();

