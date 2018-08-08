<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megaworld_Genesis
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			
			<?php 
			
			// Templates
			get_template_part( 'fp-modules/featured' ); 
			get_template_part( 'fp-modules/genesis' ); 
			// get_template_part( 'fp-modules/intro' ); 
			
			?>

			<?php if(have_posts): the_post(); ?>
			<section class="fp-content article-content">
				<?php the_content(); ?>
			</section>
			<?php endif; ?>

			<?php 
			get_template_part( 'fp-modules/property-grid' ); 
			?>
			
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
