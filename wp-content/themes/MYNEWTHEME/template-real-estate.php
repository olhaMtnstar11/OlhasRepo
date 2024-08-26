<?php
/* Template Name: Real Estate Template */
 ?>
<?php get_header(); ?>

<div class="container">
    <h1><?php the_title(); ?></h1>

    <?php if (have_rows('content_rows')) : ?>
        <?php while (have_rows('content_rows')) : the_row(); ?>
            <?php
            $image = get_sub_field('image');
            $text = get_sub_field('text');
            $position = get_sub_field('position');
            ?>
            <div class="content-row <?php echo esc_attr($position); ?>">
                <?php if ($position == 'Left') : ?>
                    <div class="image">
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                    <div class="text">
                        <?php if ($text) : ?>
                            <p><?php echo esc_html($text); ?></p>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <div class="text">
                        <?php if ($text) : ?>
                            <p><?php echo esc_html($text); ?></p>
                        <?php endif; ?>
                    </div>
                    <div class="image">
                        <?php if ($image) : ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    <?php else : ?>
        <p>No content found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
