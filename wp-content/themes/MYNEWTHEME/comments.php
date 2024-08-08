<div class="comments-wrapper">


    <div class="comments" id="comments">


        <div class="comments-header">

            <h2 class="comment-reply-title">


                <?php
                if( ! have_comments() ){
                   echo "Leave a comments";
                } else {
                    echo get_comments_number(). " Comments";
                }
                ?>

               </h2><!-- .comments-title -->

        </div><!-- .comments-header -->

        <div class="comments-inner">

            <?php
            $args = array(
                'walker'            => null,
                'max_depth'         => '',
                'style'             => 'div',
                'callback'          => null,
                'end-callback'      => null,
                'type'              => 'all',
                'page'              => '',
                'per_page'          => '',
                'avatar_size'       => 100,
                'reverse_top_level' => null,
                'reverse_children'  => '',
                'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
                'short_ping'        => false,   // @since 3.6
                'echo'              => true     // boolean, default is true
            );
            wp_list_comments(
                $args
            );

            ?>

        </div><!-- .comments-inner -->

    </div><!-- comments -->

    <hr class="" aria-hidden="true">
<?php
 if( comments_open() ) {
     comment_form(
             array(
                'class_form' => '',
                'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title">',
                 'title_reply_after' => '</h2>',
             )
     );
 }
?>

</div>
