<?php
$featuredVids = query_posts(
    array(
        'category_name' => "featured",
        'posts_per_page' => 6
    )
);
?>
<article class="slider-article">
<div class="container">
    <div id="slides">
        <?php
        $i = 1;
        foreach ($featuredVids as $featuredVid) :
            $images = get_children(array('post_parent' => $featuredVid->ID, 'post_type' => 'attachment', 'post_mime_type' => 'image', 'orderby' => 'menu_order', 'order' => 'ASC'));
            if ($images) :
                $total_images = count($images);
                $image = array_shift($images);
                $image_img_tag = wp_get_attachment_image($image->ID, 'homepage-thumb');
                echo '<a href="'.get_permalink($featuredVid->ID).'">';
                echo $image_img_tag;
                echo '</a>';
            endif;
            $i++;
        endforeach;
        wp_reset_query();
        ?>
    </div>
</div>
</article>