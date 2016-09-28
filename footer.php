<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package PACKAGENAME
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
        <nav id="footer-navigation" class="footer-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'footer', 'menu_id' => 'footer-menu' ) ); ?>
        </nav><!-- #site-navigation -->
		<div class="site-info">
			<div class="contact-information">
                <div itemscope itemtype="http://schema.org/">
                    <span itemprop="name" class="name"><?php bloginfo('name'); ?></span>
                    <div class="address" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                        <span itemprop="streetAddress"></span>,
                        <span itemprop="addressLocality"></span>,
                        <span itemprop="addressRegion"></span>
                        <span itemprop="postalCode"></span>
                    </div><!-- .address -->
                    <span itemprop="telephone"><a href="tel:+1" class="nowrap"></a></span>
                </div> <!-- itemscope -->
            </div><!-- .contact-information -->
		</div><!-- .site-info -->
        <div id="dwd" class="clear">Website Design and Development by <a href="http://www.deewebdesign.com/" class="nowrap" target="_blank" <?php if(!is_front_page()) { echo 'rel="nofollow"'; } ?>>Dee Web Design.</a></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
