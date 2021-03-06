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
 * @package Megaworld_Genesis
 */

get_header();
?>

	<div id="primary" class="content-area single-page <?php echo get_post_type(); ?>">
		<main id="main" class="site-main">

			<div class="wrapper-medium">

				<header class="page-header">
					<h1 class="page-title"><?php echo get_the_title($post->ID); ?></h1>
				</header>

				<div class="grid-x">

					<div class="main-column cell small-12 medium-8 large-9">
						<?php if (have_posts()): ?>
			
						<article class="article single <?php echo get_post_type(); ?>">
							<?php while (have_posts()): the_post(); ?>

							<?php if(has_post_thumbnail()): ?>
							<img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'bg_medium' ) ?>" alt="" class="post-thumb">
							<?php endif; ?>

							<?php the_content(  ); ?>
				
							<?php endwhile; ?>
						</article>
			
						<?php endif; ?>
					</div>

					<div class="sidebar-column cell small-12 medium-4 large-3">
						<?php get_sidebar(); ?>
					</div>

				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
