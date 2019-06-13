<?php
if(has_post_thumbnail()){
    $style = 'style="background-image: url('. esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) ) .')"';
}else{
    $style = '';
}
?>
<div class="column-item post-style-2">
    <div class="post-inner" <?php echo wp_kses_post($style);?>>

        <div class="post-content">
            <div class="entry-category "><?php the_category(' '); ?></div>
            <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></h3>
            <div class="post-date"><?php echo get_the_date(); ?></div>
        </div>

    </div>
</div>