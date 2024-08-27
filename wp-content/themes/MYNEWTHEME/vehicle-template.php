<?php
/* Template Name: Team Page */
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <?php
            // Display content of the page
            if ( have_posts() ) :
                while ( have_posts() ) : the_post();
                    the_content();
                endwhile;
            endif;

            // Query for team members
            $args = array(
                'post_type' => 'vehicle',
                'posts_per_page' => -1,

            );






            ?>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php get_footer(); ?>