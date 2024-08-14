<?php
wp_footer();
?>

<?php
// Fetch the hero image URL from the Customizer
$footer_text = get_theme_mod('footer_text');
// Define your static text
$static_text = 'default footer';
// Check if $footer_text is not empty, otherwise use $static_text
$text_to_display = !empty($footer_text) ? $footer_text : $static_text;

?>


</div>

<footer class="footer text-center py-2 theme-bg-dark">
    <p class="copyright"><a href="">
            <?php echo $text_to_display; ?>
        </a></p>
    <?php
    dynamic_sidebar('footer-1');
    ?>
</footer>

</div>

</body>
</html>



