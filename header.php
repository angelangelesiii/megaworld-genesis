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
	<meta name="google-site-verification" content="-rdSiJEPGrJyILixsE9SUrPLbd4M5gKNlPj0dfxPLMo" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="#1674c1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<?php // additional header classes
	$headerClasses = get_post_type( $post->ID );
	if (is_front_page()) $headerClasses .= ' front-page hit-top';
	if (is_home()) $headerClasses .= ' blog';
	if (!is_front_page() && !get_field('page_bleed')) $headerClasses .= ' not-front-page';
	if (get_field('page_bleed')) $headerClasses .= ' front-page bleed hit-top';

	$inquireLink = '#';
	if (get_field('contact_us_page_url', 'options')) $inquireLink = get_field('contact_us_page_url', 'options');

	?>

	<div id="top"></div>

	<header id="siteheader" class="site-header <?php echo $headerClasses; ?>">
		<nav id="sitenav" class="main-site-navigation">
			<div class="wrapper-big">
				<div class="nav-container grid-x">

					<div class="logo-container cell shrink">
						<a href="<?php bloginfo( url ) ?>">
							<img class="main-color logo" src="<?php echo get_template_directory_uri().'/images/logos/mw_logo_white.png' ?>" alt="Megaworld">
						</a>
					</div>

					<div class="hspacer cell auto hide-for-large"></div>

					<div class="menu-container cell large-auto">

						<div class="mobile-inquire-button-container">
							<a href="<?php echo $inquireLink; ?>" class="btn secondary">Contact Us</a>
						</div>
						
						<?php
						// Call header nav menu items up to 3 depth
						wp_nav_menu( array(
							'menu'		=>	'header-menu',
							'menu_class'=>	'main-header-menu',
							'fallback_cb'=>	false,
							'depth'		=>	3,
							'item_spacing'=>'discard'
						) );
						?>
					</div>

					<div class="inquire-button-container cell shrink show-for-medium">
						<a href="<?php echo $inquireLink; ?>" class="btn cta">Contact Us</a>
					</div>

					<div class="hamburger-menu-container hide-for-large cell shrink">
						<button class="touch-menu" id="main-mobile-button">
							<div class="line"></div>
							<div class="line"></div>
							<div class="line"></div>
						</button>
					</div>

				</div>
			</div>
		</nav>
	</header>

	<div class="dimmer"></div>

	<!-- START SITE CONTENT -->
	<div id="content" class="site-content">
		<div class="spacer <?php echo $headerClasses; ?>"></div>