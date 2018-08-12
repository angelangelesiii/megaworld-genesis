<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Megaworld_Genesis
 */

get_header('404');
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="section-404">
				<div class="contents">
					<div class="wrapper-medium">
						<img src="<?php echo get_template_directory_uri().'/images/logos/mw_block_primary.png' ?>" alt="" class="logo">
						<h1 class="head-404">
							404
						</h1>
						<p class="subtext">
							The page you are looking for is not here.
						</p>
						<a href="<?php bloginfo(url); ?>" class="btn secondary">Back Home</a>

						
					</div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer('404');
