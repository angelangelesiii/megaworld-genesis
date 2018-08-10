<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Megaworld_Genesis
 */

get_header();
?>

	<div id="primary" class="content-area blog-area">
		<main id="main" class="site-main">

			<div class="wrapper-medium">

				<header class="page-header">
					<h1 class="page-title"><?php the_archive_title( '', '' ) ?></h1>
				</header>
				
				<div class="grid-x">

					<div class="main-column cell large-9  medium-8 small-12">
						<?php
						if ( have_posts() ) : ?>

							
							<div class="blog-posts">

							<?php while (have_posts()): the_post(); ?>

								<article class="article <?php echo get_post_type(); ?>">
									

									<?php 
									$thumbBool = '';
									if(has_post_thumbnail()): 
									$thumbBool = 'thumb-true';
									?>
									<div class="date thumb-date"><?php echo get_the_date(); ?></div>
									<a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID, 'bg_medium' );  ?>" alt="<?php the_title(); ?>" class="featured-image"></a>
									<?php else: ?>
									<div class="date-container">
										<div class="date"><?php echo get_the_date(); ?></div>
									</div>
									<?php endif; ?>

									<div class="text-contents <?php echo $thumbBool; ?>">
										<h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<div class="excerpt-container">
											<?php the_excerpt(); ?>
										</div>
										<a href="<?php the_permalink(); ?>" class="btn white read-more-btn">Read More</a>
									</div>
								</article>

							<?php endwhile; ?>

							</div>

							<div class="pagination-links">
							<?php the_posts_pagination( array(
								'mid_size' => 2,
								'prev_text' => __( 'Previous', 'textdomain' ),
								'next_text' => __( 'Next', 'textdomain' ),
							) ); ?>
							</div>
						
						<?php
						else :
				
							get_template_part( 'template-parts/content', 'none' );
				
						endif;
						?>
					</div>

					<div class="sidebar-column cell large-3 medium-4 small-12">
						<?php get_sidebar(); ?>
					</div>

				</div>

			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
