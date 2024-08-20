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
            'post_type' => 'team_member',
            'posts_per_page' => -1,
            'meta_key' => 'team_group', // Meta key for sorting
            'orderby' => 'meta_value',
            'order' => 'ASC',
        );
        $team_query = new WP_Query( $args );

        // Initialize grouping array
        $groups = array();

        if ( $team_query->have_posts() ) :
            while ( $team_query->have_posts() ) : $team_query->the_post();
                $group = get_field('team_group'); // Get team group field
                if (!isset($groups[$group])) {
                    $groups[$group] = array();
                }
                $groups[$group][] = get_the_ID();
            endwhile;

            foreach ($groups as $group_name => $members) :
                ?>
                <section class="team-group">
                    <h2><?php echo esc_html($group_name); ?></h2>
                    <div class="team-members">
                        <?php
                        foreach ($members as $member_id) :
                            $post = get_post($member_id);
                            setup_postdata($post);
                            ?>
                            <div class="team-member">
                                <?php if ( has_post_thumbnail() ) : ?>
                                    <div class="team-member-image">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="team-member-info">
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php the_field('job_title'); ?></p>
                                    <div><?php the_field('bio'); ?></div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        wp_reset_postdata();
                        ?>
                    </div>
                </section>
            <?php
            endforeach;
        endif;
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
