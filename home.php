<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package myTheme
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <div class="container">
            <main id="main" class="site-main">
                
                <?php
                while (have_posts()) : the_post();

                    get_template_part('template-parts/content', 'page');

                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;

                endwhile; // End of the loop.
                ?>

            </main><!-- #main -->

        </div>
        <section class="get-notified">
            <div class="container get-notified-block">
                <div class="main-get-notified">
                    <h2><?php echo get_theme_mod('get_notified_title')?></h2>
                    <p><?php echo get_theme_mod('get_notified_text')?></p>
                    <form action="http://home14.local" id="form" name="form" method="post"
                          enctype="application/x-www-form-urlencoded" class="get-notified-form">
                        <input type="text" name="email" id="email" placeholder="Email Address" class="email">
                        <input type="submit" name="submit" id="submit" value="Notify" class="submit">
                    </form>
                </div>
                <iframe src="<?php echo get_theme_mod('get_notified_media')?>" allowfullscreen></iframe>
            </div>
        </section>
    </div><!-- #primary -->

<?php

get_footer();
