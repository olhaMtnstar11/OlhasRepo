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
<script>
    document.addEventListener('DOMContentLoaded', function() {
        grecaptcha.ready(function() {
            grecaptcha.execute('6LcCPSwqAAAAADg84YzSLv0Ak2gxRr6B1MptjPyn', {action: 'submit'}).then(function(token) {
                console.log('reCAPTCHA token:', token); // Log the token to the console

                // Send the token to your server for verification
                fetch('https://olhasite.wpenginepowered.com/verify-recaptcha.php', { // Make sure this URL is correct
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ token: token })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('reCAPTCHA score:', data.score); // Log the score to the console
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });
    });
</script>


</body>
</html>



