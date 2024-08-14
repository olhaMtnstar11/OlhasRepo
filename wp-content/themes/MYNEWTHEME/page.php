
<?php
get_header();
?>





<?php
// Fetch the hero image URL from the Customizer
$bg_image_f = get_theme_mod('bg_image_form');
$bg_image_about = get_theme_mod('bg_image_about');
?>


<style>
    .page-id-11 {
        background-image: url('<?php echo esc_url($bg_image_f); ?>');
    }
    .page-id-57 {
        background-image: url('<?php echo esc_url($bg_image_about); ?>');
    }
</style>


<article class="content px-3 py-5 p-md-5">

    <div class="label-component" >
        Page php
    </div>
    <?php
    if( have_posts() ){
        while( have_posts() ){
            the_post();
            get_template_part('template-parts/content', 'page');
        }
    }
    ?>

</article>


<?php
get_footer();
?>


