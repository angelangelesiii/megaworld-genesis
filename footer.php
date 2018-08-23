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


	<?php if(!is_front_page() && !is_page('contact-us')): 
		if(get_field('footer_contact_toggle', 'options')):?>
	<section class="footer-contact-form">
		<div class="wrapper-small">
			<div class="message">
				<?php if(get_field('footer_contact_message', 'options')): 
					the_field('footer_contact_message', 'options');
				else:
				?>

					<h2>Contact Us</h2>

				<?php endif; ?>
				
			</div>
			<div class="form-container">
				<?php if(get_field('footer_contact_shortcode', 'options')) echo do_shortcode(get_field('footer_contact_shortcode', 'options')); ?>
			</div>
		</div>
	</section>
	<?php endif; 
	endif; ?>


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
				<div class="contact-details">
				<?php 
				$footer = get_field('main_footer','options');
				
				if($footer['email']):
				?>
					<p class="detail"><i class="fas fa-envelope"></i><span class="var"><?php echo $footer['email']; ?></span></p>
				<?php endif; ?>

				<?php if($footer['phone_1']): ?>
					<p class="detail"><i class="fas fa-phone"></i><span class="var"><?php echo $footer['phone_1']; ?></span></p>
				<?php endif; ?>

				<?php if($footer['phone_2']): ?>
					<p class="detail"><i class="fas fa-phone"></i><span class="var"><?php echo $footer['phone_2']; ?></span></p>
				<?php endif; ?>
				</div>
			</div>

		</div>
	
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
