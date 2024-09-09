
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


    //about
    $about_image_url = get_theme_mod('about_image');
    $about_title = get_theme_mod('about_title');
    $about_description = get_theme_mod('about_description');
    $about_button_text = get_theme_mod('about_button_text');
    $about_button_url = get_theme_mod('about_button_url');


    ?>

    <style>
        .hero {
            background-image: url('<?php echo esc_url($hero_image_url); ?>');
        }
    </style>



    <div class="label-component" >
        front page php***
    </div>

    <section class="hero">
        <div class="hero-content">
            <h1><?php echo $hero_title; ?></h1>
            <p><?php echo $hero_description; ?></p>



            <a href="<?php echo $hero_button_url; ?>" class="custom-button"><?php echo $hero_button_text; ?></a>



        </div>
    </section>

    <section class="featured-posts">
        <h2 class="featured-posts-title">Featured Posts</h2>
        <div class="featured-posts-container">
            <?php
            // Query to get featured posts
            $args = array(
                'posts_per_page' => 4, // Number of featured posts to display
                'post_type' => 'post',
                'meta_key' => 'is_featured', // Custom field key for featured posts
                'meta_value' => '1', // Value indicating the post is featured
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $featured_posts = new WP_Query($args);

            if ($featured_posts->have_posts()) :
                while ($featured_posts->have_posts()) : $featured_posts->the_post(); ?>
                    <div class="featured-post-item">
                        <a href="<?php the_permalink(); ?>" class="featured-post-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('large', array('class' => 'featured-post-thumbnail')); ?>
                            <?php endif; ?>
                            <div class="featured-post-content">
                                <h3 class="featured-post-title"><?php the_title(); ?></h3>
                                <p class="featured-post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                            </div>
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
        <div class="about-us-block">
            <img src="<?php echo esc_url($about_image_url); ?>" alt="About Us" class="about-us-image">
            <div class="about-us-content">
                <h2><?php echo $about_title; ?></h2>
                <p><?php echo $about_description; ?></p>
                <a href="<?php echo $about_button_url; ?>" class="custom-button"><?php echo $about_button_text; ?></a>
            </div>
        </div>
    </section>









    <section class="latest-posts">
        <h2 class="latest-posts-title">Latest News</h2>
        <ul class="latest-posts-list">
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
                    <li class="latest-post-item">
                        <a href="<?php the_permalink(); ?>" class="latest-post-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('thumbnail', array('class' => 'latest-post-thumbnail')); ?>
                            <?php endif; ?>
                            <div class="latest-post-content">
                                <h3 class="latest-post-title"><?php the_title(); ?></h3>
                                <p class="latest-post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                            </div>
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
