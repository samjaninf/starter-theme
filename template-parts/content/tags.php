<div class="tags">
    <?php $tags = get_tags(); foreach ( $tags as $tag ) { ?>
        <a href="<?php echo get_tag_link( $tag->term_id ); ?>" rel="tag"><?php echo $tag->name; ?></a>
    <?php } ?>
</div><!-- tags -->