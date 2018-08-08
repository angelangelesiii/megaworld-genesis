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

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<header class="special-page-header properties-header">
				<div class="wrapper-small">
					<h1 class="title">Properties</h1>
					<p class="subtext">Exquisite lofts at your fingertips</p>
				</div>
			</header>

			<?php 
			$propertiesQuery = new WP_Query(array(
				'post_type' 			=> 'property',
				'posts_per_page' 		=> 24,
				'orderby'				=> 'title',
				'order'					=> 'ASC'
			));

			if ($propertiesQuery -> have_posts()):
			?>

			<section class="properties-container page-body">

				<div class="wrapper-medium">

					<div class="filter-menu">

						<button class="filter iso-filter active-filter" data-city="*">All</button>

						<?php
						$filters = get_terms(array(
							'taxonomy' => 'city'
						));
						foreach($filters as $filter):
						?>
						
						<button class="filter iso-filter" data-city="<?php echo '.'.$filter->slug ?>"><?php echo $filter->name; ?></button>

						<?php endforeach; ?>
					</div>

					<div class="iso-grid properties-grid">

						<div class="grid-sizer"></div>

						<?php while ($propertiesQuery -> have_posts()): $propertiesQuery -> the_post(); 

						$categories = wp_get_post_terms($post->ID, 'city');
						$cities = '';
						foreach($categories as $category) {
							$cities .= $category->slug.' ';
							}
						$cities = trim($cities, ' ');
						?>
						
						<article class="property property-item grid-item <?php echo $cities; ?>">
							
							<a href="<?php the_permalink(); ?>">
								<div class="aspect-ratio-sizer" style="background-image: url(<?php echo get_the_post_thumbnail_url( $post->ID, 'bg-small' ) ?>)"></div>

								<div class="contents-2">
									<div class="inner">
										<img src="<?php echo get_template_directory_uri().'/images/logos/mw_block_white.png'; ?>" alt="Megaworld" class="mini-logo">
										<h2 class="property-name"><?php the_title(); ?></h2>
									</div>
								</div>
	
								<div class="contents">
									<div class="inner">
										<img src="<?php echo get_template_directory_uri().'/images/logos/mw_block_white.png'; ?>" alt="Megaworld" class="mini-logo">
										<h2 class="property-name"><?php the_title(); ?></h2>
									</div>
								</div>
							</a>
							
						</article>
		
						<?php endwhile; ?>
					</div>
				</div>

			</section>

			<?php endif; ?>

			

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
// get_sidebar();
get_footer();
