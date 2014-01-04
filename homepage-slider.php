<?php
$featuredVids = query_posts(
    array(
        'category_name' => "featured",
        'posts_per_page' => 6
    )
);
?>
<article>
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
                echo $image_img_tag;

            endif;
            $i++;
        endforeach;
        ?>
    </div>
</div>
</article>

<style>
    /* Prevent the slideshow from flashing on load */
    #slides {
        display: none
    }

    /* Center the slideshow */
    .container {
        margin: 0 auto
    }

    /* Show active item in the pagination */
    .slidesjs-pagination .active {
        color: red;
    }

    /* Media quires for a responsive layout */

    /* For tablets & smart phones */
    @media (max-width: 767px) {
        .container {
            width: auto
        }
    }

    /* For smartphones */
    @media (max-width: 480px) {
        .container {
            width: auto
        }
    }

    /* For smaller displays like laptops */
    @media (min-width: 768px) {
        .container {
            width: 724px
        }
    }

    @media (min-width: 783px) {
        .container {
            width: 100%;
        }
    }

    /* For larger displays */
    @media (min-width: 1200px) {
        .container {
            width: 100%;
        }
    }
</style>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/basic-slide/js/jquery.slides.min.js"></script>
<script>
    jQuery(function () {
        jQuery('#slides').slidesjs({
            width: 945,
            height: 460,
            play: {
                active: false,
                // [boolean] Generate the play and stop buttons.
                // You cannot use your own buttons. Sorry.
                effect: "slide",
                // [string] Can be either "slide" or "fade".
                interval: 4000,
                // [number] Time spent on each slide in milliseconds.
                auto: true,
                // [boolean] Start playing the slideshow on load.
                swap: true,
                // [boolean] show/hide stop and play buttons
                pauseOnHover: false,
                // [boolean] pause a playing slideshow on hover
                restartDelay: 2500
                // [number] restart delay on inactive slideshow
            }
        });
    });
</script>