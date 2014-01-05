<?php
/*
 * Template Name: contact
 */
get_header(); ?>

    <div id="main-content" class="main-content">

        <?php
        if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
            // Include the featured content template.
            get_template_part( 'featured-content' );
        }
        ?>
        <div id="primary" class="content-area">
            <div id="content" class="site-content" role="main">

                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <?php
                    // Page thumbnail and title.
                    twentyfourteen_post_thumbnail();
                    the_title( '<header class="entry-header"><h1 class="entry-title">', '</h1></header><!-- .entry-header -->' );
                    ?>

                    <div class="entry-content entry-contact">
                        <div id="contact">

                            <div id="message"></div>

                            <form method="post" action="<?php echo get_stylesheet_directory_uri(); ?>/classes/contact.php" name="contactform" id="contactform">

                                <fieldset>

                                    <legend>Please fill in the following form to contact Well Rooted Media</legend>
                                    <label for="name" accesskey="U"><span class="required">*</span>Your Name</label>
                                    <input name="name" type="text" id="name" size="30" value="" />
                                    <br />
                                    <label for="email" accesskey="E"><span class="required">*</span>Email</label>
                                    <input name="email" type="text" id="email" size="30" value="" />
                                    <br />
                                    <label for="phone" accesskey="P"><span class="required">*</span>Phone</label>
                                    <input name="phone" type="text" id="phone" size="30" value="" />
                                    <br />
                                    <label for="subject" accesskey="S">Subject</label>
                                    <select name="subject" id="subject">
                                        <option value="Design">Design</option>
                                        <option value="Programming">Programming</option>
                                        <option value="Photo Manipulation">Photo Manipulation</option>
                                    </select>
                                    <br />
                                    <label for="comments" accesskey="C"><span class="required">*</span>Message</label>
                                    <textarea name="comments" cols="40" rows="3" id="comments"></textarea>
                                    <br />
                                    <!--                <label for="agree" class="checkbox" accesskey="A"><span class="required">*</span> Agree to terms?</label>-->
                                    <!--                <input type="checkbox" class="checkbox" name="agree" id="agree">-->
                                    <!--                <br />-->
                                    <!--                <label class="radio">-->
                                    <!--                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>-->
                                    <!--                    Choose option one?-->
                                    <!--                </label>-->
                                    <!--                <br />-->
                                    <!--                <label class="radio">-->
                                    <!--                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">-->
                                    <!--                    Or rather, option two?-->
                                    <!--                </label>-->

                                    <br /><br />
                                    <p><span class="required">*</span> Are you human?</p>

                                    <label for="verify" accesskey="V">&nbsp;&nbsp;&nbsp;<img src="<?php echo get_stylesheet_directory_uri(); ?>/classes/image.php" alt="Image verification" border="0"/></label>
                                    <input name="verify" type="text" id="verify" size="6" value="" style="width: 50px;" /><br /><br />
                                    <input type="submit" class="submit" id="submit" value="Submit" />

                                </fieldset>

                            </form>

                        </div>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->

            </div><!-- #content -->
        </div><!-- #primary -->
        <?php get_sidebar( 'content' ); ?>
    </div><!-- #main-content -->

<?php
get_sidebar();
get_footer();
