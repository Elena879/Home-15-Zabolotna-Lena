<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myTheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'mytheme'); ?></a>

    <header id="masthead" class="site-header">
        <div class="header-wrapper">
            <div class="container">
                <div class="header-container">
                    <div class="site-branding">
                        <?php
                        the_custom_logo();
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) : ?>
                            <p class="site-description"><?php echo $description; ?></p>
                            <?php
                        endif; ?>
                    </div><!-- .site-branding -->

                    <nav id="site-navigation" class="main-navigation">
                        <?php
                        wp_nav_menu(array(
                            'menu' => 'System Links',
                            'container' => 'ul',
                            'container_class' => 'header-links',
                            'menu_class' => 'header-links',
                        ));
                        ?>
                    </nav><!-- #site-navigation -->
                    <img src="<?php bloginfo('template_url') ?>/img/hand.png" class="hand-picture" alt="hand">
                </div>
            </div>
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">
