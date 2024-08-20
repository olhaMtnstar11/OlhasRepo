<div class="label-component">
    content-article php
</div>
<div class="container">
    <header class="content-header">
        <div class="meta mb-3">
            <span class="date"><?php the_date(); ?></span>
            <?php the_tags('<span class="tag"><i class="fa fa-tag"></i>', '</span><span class="tag"><i class="fa fa-tag"></i>', '</span>'); ?>
            <span class="comment">
                <a href="#comments"><i class='fa fa-comment'></i>
                    <?php comments_number(); ?>
                </a>
            </span>
        </div>
    </header>
    <?php
    the_content();

    // Retrieve the image field value
    $image = get_field('my_image'); // Replace 'my_image' with your actual field name

    // Check if the image exists
    if ($image) {
        // Output the image
        echo '<img src="' . esc_url($image['url']) . '" alt="' . esc_attr($image['alt']) . '" />';
    }

    ?>
    <?php
    comments_template();
    ?>
</div>







