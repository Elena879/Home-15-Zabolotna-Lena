<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package myTheme
 */

?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        <?php wp_nav_menu(array(
            'menu' => 'Footer Menu',
            'container' => 'ul',
            'container_class' => 'footer-menu',
            'menu_class' => 'footer-menu',
        )); ?>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
