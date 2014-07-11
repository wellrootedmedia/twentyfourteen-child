<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<?php //do_action( 'twentyfourteen_credits' ); ?>
				<?php echo date("Y"); ?> <a href="<?php echo esc_url( __( bloginfo('url'), 'twentyfourteen' ) ); ?>"><?php printf( __( '%s', 'twentyfourteen' ), _e(bloginfo('name'))); ?></a>
                <a style="float: right;" href="<?php echo get_permalink(3625); ?>">Privacy Policy</a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->



<!-- AJAX Contact Form Stylesheet -->
<link href="<?php echo get_stylesheet_directory_uri(); ?>/assets/css/contact.css" rel="stylesheet" type="text/css" />
<!-- AJAX Form Submit -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/js/jquery.jigowatt.js"></script>

<!--@import url(css/theme.css);-->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/theme.css" type="text/css" media="screen" />
<!-- Add fancyBox -->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-buttons.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.css" type="text/css" media="screen" />

<!-- This is for missing images -->
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/holder.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/jquery.fancybox.pack-min.js"></script>
<!-- Optionally add helpers - button, thumbnail and/or media -->
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-buttons.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-media.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/fancybox/source/helpers/jquery.fancybox-thumbs.js"></script>

<!-- This is for buddypress mentions, FB style -->
<!--<script type="text/javascript" src="--><?php //echo get_stylesheet_directory_uri(); ?><!--/js/jquery-buddypress-mentions.js"></script>-->

<script type="text/javascript">
    jQuery(function(){
        jQuery(".gallery-icon").find("a[href]")
            .each(function(){
                jQuery(this).addClass("fancybox");
                jQuery(this).attr("rel", "images");
            });
        jQuery(".fancybox").fancybox({
            helpers : {
                title : { type : "inside" }
            },
            beforeLoad: function() {
                this.title = jQuery(this.element)
                    .find("img")
                    .attr("alt");
            }
        });

        jQuery(".fancybox-media").fancybox({
            openEffect  : "none",
            closeEffect : "none",
            padding: 0,
            margin: [10, 0, 0, 0],
            helpers : {
                media : {}
            }
        });

        var someClass = jQuery(".post-thumbnail").parent();
        jQuery(someClass).each(function(){
            if(jQuery(this).hasClass('has-post-thumbnail')) {
                //console.log('has class');
            } else {
                jQuery(this).addClass('has-post-thumbnail');
            }
        });

        jQuery(".size-medium").each(function(){
            jQuery(this).parent().addClass("fancybox");
        });

        jQuery('.current.selected')
            .first()
            .addClass('bp-parent-menu');

        /*
         * woocommerce fancybox
         */
        jQuery(".woocommerce-main-image").each(function(){
            jQuery(this)
                .addClass("fancybox");
        });
        jQuery(".thumbnails a").each(function(){
            jQuery(this)
                .addClass("fancybox");
        });

        /*
         * TODO: search for users from activity textarea.
         */
//        jQuery.fn.bpMentions({
//            selectedName: ".activity-greeting"
//        });



    });
</script>

	<?php wp_footer(); ?>
</body>
</html>