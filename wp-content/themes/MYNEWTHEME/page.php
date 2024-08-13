
<?php
get_header();
?>


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