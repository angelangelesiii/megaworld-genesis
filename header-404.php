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



	<!-- START SITE CONTENT -->
	<div id="content" class="site-content">