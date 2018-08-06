<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Megaworld_Genesis
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<?php // additional header classes
	$headerClasses = get_post_type( $post->ID );
	if (is_front_page()) $headerClasses .= ' front-page hit-top';
	if (is_home()) $headerClasses .= 'blog';
	?>

	<div id="top"></div>

	<header id="siteheader" class="site-header <?php echo $headerClasses; ?>">
		<nav id="sitenav" class="main-site-navigation">
			<div class="wrapper-medium">
				<div class="nav-container grid-x">

					<div class="logo-container cell shrink">
						<a href="<?php bloginfo( url ) ?>">
							<img class="main-color logo" src="<?php echo get_template_directory_uri().'/images/logos/mw_logo_orig.png' ?>" alt="Megaworld">
							<img class="secondary-color logo" src="<?php echo get_template_directory_uri().'/images/logos/mw_logo_white.png' ?>" alt="Megaworld">
						</a>
					</div>

					<div class="menu-container cell auto">
						<?php
						// Call header nav menu items up to 3 depth
						wp_nav_menu( array(
							'menu'		=>	'header-menu',
							'menu-class'=>	'main-header-menu',
							'fallback-cb'=>	false,
							'depth'		=>	3,
							'item-spacing'=>'discard'
						) );
						?>
					</div>

					<div class="inquire-button-container cell shrink">
						<a href="#" class="btn cta">Inquire Now!</a>
					</div>

				</div>
			</div>
		</nav>
	</header>

	<!-- START SITE CONTENT -->
	<div id="content" class="site-content">
