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

	<header id="siteheader" class="site-header <?php echo $headerClasses; ?>">
		<nav id="sitenav" class="main-site-navigation">
			<div class="wrapper-medium">
				<div class="nav-container grid-x">
					<div class="logo-container cell shrink">
						<img src="<?php echo get_template_directory_uri().'/images/logos/mw_logo_white.png' ?>" alt="Megaworld">
					</div>
					<div class="menu-container cell auto">
						<span class="sample">
							Hello World
						</span>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<!-- START SITE CONTENT -->
	<div id="content" class="site-content">
