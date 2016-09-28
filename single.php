<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package PACKAGENAME
 */

get_header(); ?>
<div class="container">
	<div id="primary" class="content-area wide-column">
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/content', 'single' ); ?>

			<div class="posts-navigation clear">
   				<div class="alignleft"><?php previous_post_link( '%link', ( '&laquo; Previous Post' ) ); ?></div>
   				<div class="alignright"><?php next_post_link( '%link', ( 'Next Post &raquo;' ) ); ?></div>
   			</div>

			<?php
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // End of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
