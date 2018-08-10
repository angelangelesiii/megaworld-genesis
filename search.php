<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Megaworld_Genesis
 */

get_header();
?>

	<section id="primary" class="content-area search-page">
		<main id="main" class="site-main">

			<div class="wrapper-medium">

				<div class="search-box">
					<?php get_search_form(); ?>
				</div>

				<header class="search-header">
					<h1 class="search-title"><?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'megaworld-genesis' ), '<span>' . get_search_query() . '</span>' );
					?></h1>
				</header>
				
				<div class="grid-x">

					<div class="main-column cell  medium-8 small-12">
						<?php
						if ( have_posts() ) : ?>

							
							<div class="search-results">

							<?php while (have_posts()): the_post(); ?>

								<article class="search-item <?php echo get_post_type(); ?>">

									<h2 class="article-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
									<span class="link"><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></span>
									<div class="excerpt"><?php the_excerpt(); ?></div>
									
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

					<div class="sidebar-column cell medium-4 small-12">
						<?php get_sidebar(); ?>
					</div>

				</div>

			</div>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php
get_sidebar();
get_footer();
