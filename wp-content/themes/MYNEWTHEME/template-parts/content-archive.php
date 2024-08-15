
<div class="label-component" >
    content-archive php
</div>
<div class="container post">
    <div class=" mb-5">
        <div class="media">
            <?php
            $itemImg = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail'));
            ?>
            <div>
                <?php
                $itemImg;
                ?>
            </div>
            <img class="mr-3 img-fluid post-thumb d-none d-md-flex" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')); ?>" alt="Post Thumbnail">
            <div class="media-body">
                <h3 class="title mb-1"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                <div class="meta mb-1">
                    <span class="date"><?php the_date(); ?></span>
                    <span class="time">5 min read</span>
                    <span class="comment"><a href="#"><?php comments_number(); ?></a></span>
                </div>
                <div class="intro">
                    <?php the_excerpt(); ?>
                </div>
                <a class="more-link" href="<?php the_permalink(); ?>">Read more &rarr;</a>
            </div><!--//media-body-->
        </div><!--//media-->
    </div><!--//post-->
</div><!--//container-->
<?php
