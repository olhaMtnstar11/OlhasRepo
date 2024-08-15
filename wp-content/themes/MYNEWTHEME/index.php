
<?php
get_header();
?>


<?php
// Fetch the hero image URL from the Customizer
$bg_image = get_theme_mod('bg_image_posts');

?>


<style>
    body {
        background-image: url('<?php echo esc_url($bg_image); ?>');
    }
</style>


<div class="label-component" >
    index php
</div>

<article class="content px-3 py-5 p-md-5 posts">
    <?php
    if( have_posts() ) {
        while( have_posts() ){
            the_post();
            get_template_part('template-parts/content', 'archive');
        }
    } else {
        // If no posts are found, display a message
        echo '<p>No posts found.</p>';
    }

    ?>
    <?php
    // Display pagination if there are multiple pages
    the_posts_pagination();
    ?>


</article>








<?php
get_footer();
?>