
    <?php
	get_header();
	?>


    <?php
    // Fetch the hero image URL from the Customizer
    $hero_image_url = get_theme_mod('hero_image');
    $hero_title = get_theme_mod('hero_title');
    $hero_description = get_theme_mod('hero_description');
    $hero_button_text = get_theme_mod('hero_button_text');
    $hero_button_url = get_theme_mod('hero_button_url');
    ?>

    <style>
        .hero {
            background-image: url('<?php echo esc_url($hero_image_url); ?>');
        }
    </style>



    <div class="label-component" >
        front page php
    </div>

    <section class="hero">
        <div class="hero-content">
            <h1><?php echo $hero_title; ?></h1>
            <p><?php echo $hero_description; ?></p>



            <a href="<?php echo $hero_button_url; ?>" class="custom-button"><?php echo $hero_button_text; ?></a>



        </div>
    </section>

    <section class="featured-posts">
        <h2>Featured Posts</h2>
        <div class="slider">
            <?php
            $args = array(
                'posts_per_page' => 5,
                'post_type' => 'post',
                'category_name' => 'featured', // Use your category slug or ID
            );
            $featured_posts = new WP_Query($args);

            if ($featured_posts->have_posts()) :
                while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                    <div class="slide">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('large'); ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No featured posts available.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="about">
        <h2>About Us</h2>
        <div class="about-content">
            <p><?php echo get_theme_mod('welcome_message', 'Welcome to our website!'); ?></p>
            <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn-secondary">Contact Us</a>
        </div>
    </section>

    <section class="latest-posts">
        <h2>Latest News</h2>
        <ul>
            <?php
            $args = array(
                'posts_per_page' => 3,
                'post_type' => 'post',
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $latest_posts = new WP_Query($args);

            if ($latest_posts->have_posts()) :
                while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
                    <li>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('thumbnail'); ?>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                        </a>
                    </li>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No recent posts available.</p>
            <?php endif; ?>
        </ul>
    </section>

    <section class="testimonials">
        <h2>What Our Clients Say</h2>
        <div class="testimonial-slider">
            <?php
            $args = array(
                'post_type' => 'testimonial',
                'posts_per_page' => 3,
            );
            $testimonials = new WP_Query($args);

            if ($testimonials->have_posts()) :
                while ($testimonials->have_posts()) : $testimonials->the_post(); ?>
                    <div class="testimonial">
                        <blockquote>
                            <?php the_content(); ?>
                            <footer>— <?php the_title(); ?></footer>
                        </blockquote>
                    </div>
                <?php endwhile;
                wp_reset_postdata();
            else : ?>
                <p>No testimonials available.</p>
            <?php endif; ?>
        </div>
    </section>

		<article class="content px-3 py-5 p-md-5">

		<?php
		if( have_posts() ){
		while( have_posts() ){
		the_post();
		the_content();
		}
		}
		?>

	    </article>





    
	<?php
	get_footer();
	?>
