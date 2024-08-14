<?php
wp_footer();
?>

<?php
// Fetch the hero image URL from the Customizer
$footer_text = get_theme_mod('footer_text');

?>


</div>

<footer class="footer text-center py-2 theme-bg-dark">
    <p class="copyright"><a href="">
            <?php echo $footer_text; ?>
        </a></p>
    <?php
    dynamic_sidebar('footer-1');
    ?>
</footer>

</div>

</body>
</html>



