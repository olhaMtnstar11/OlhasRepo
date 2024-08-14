
<?php
get_header();
?>





<?php
// Fetch the hero image URL from the Customizer
$bg_image = get_theme_mod('bg_image');

?>


<style>
    .page-id-11 {
        background-image: url('<?php echo esc_url($bg_image); ?>');
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


