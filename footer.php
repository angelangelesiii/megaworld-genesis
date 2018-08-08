<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Megaworld_Genesis
 */

?>

	</div><!-- #content -->

	<footer id="main-footer" class="site-footer">
		<div class="footer-main-row wrapper-medium grid-x">

			<div class="info-column cell small-12 medium-4">
			<img src="<?php echo get_template_directory_uri().'/images/logos/mw_logo_white.png'; ?>" alt="Megaworld" class="footer-logo">
			<p class="attribution">
			&copy; <?php echo date('Y'); ?>. Megaworld Corporation. All rights reserved. <br/>	
			Megaworld&reg; and the Megaworld Logo&trade; are registered trademarks of Megaworld Corporation.</p>
			</div>

			<div class="footer-menu-container cell small-12 medium-4">
				<?php
				// Call header nav menu items up to 3 depth
				wp_nav_menu( array(
					'menu'		=>	'footer-menu',
					'menu_class'=>	'main-footer-menu',
					'menu_id'	=>	'footer-menu',
					'fallback_cb'=>	false,
					'depth'		=>	1,
					'item_spacing'=>'discard'
				) );
				?>
			</div>

			<div class="contact-container cell small-12 medium-4">
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate vero nulla at quibusdam illum. Fugiat!</p>
			</div>

		</div>
	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
