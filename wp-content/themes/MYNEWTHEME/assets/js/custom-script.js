jQuery(document).ready(function($) {
    $('#create-post-button').click(function() {
        $.ajax({
            url: myAjax.ajaxurl, // Access ajaxurl from the localized script
            type: 'POST',
            data: {
                action: 'create_new_post',
                title: 'Olha: Auto Created Post from code',
                content: 'Olha: This post was created automatically in my code.',
            },
            success: function(response) {
                alert('New post created successfully!');
                location.reload(); // Optionally reload the page
            },
            error: function() {
                alert('An error occurred.');
            }
        });
    });
});
