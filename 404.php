<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package PACKAGENAME
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Sorry, the file you requested was not found.', 'Quarters' ); ?></h1>
				</header><!-- .page-header -->
				<div class="page-content">
					<p>Unfortunately the page you are looking for is no longer available. <a href="<?php echo site_url(); ?>/contact/">Send us a note</a> or call us at <a href="tel:+1">1</a>.</p>
					<p>Go to our <a href="<?php echo site_url(); ?>">homepage</a>.</p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php get_footer(); ?>
