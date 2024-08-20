<?php
/*
Template Name: My Custom Template
*/
?>


<?php
get_header(); // Includes header.php
?>

    <main>
        <h1>It Is Custom Template:</h1>
        <p>Just my new</p>
        <?php
        // Start the Loop.
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
                // Display content.
                the_content();
            endwhile;
        else :
            echo '<p>No content found</p>';
        endif;
        ?>
    </main>

<?php
get_footer(); // Includes footer.php
?>