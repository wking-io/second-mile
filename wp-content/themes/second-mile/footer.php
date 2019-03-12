<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package second-mile
 */

?>
	<footer id="footer" class="footer py-8 text-white" role="contentinfo">
		<div class="footer__content wrapper flex flex-col lg:flex-row items-center justify-center py-4">
			<div class="flex items-center justify-start mb-8 md:pb-0">
				<?php echo do_shortcode( '[logo classname="footer__logo__icon mr-2 h-auto"]' ); ?>
				<?php echo do_shortcode( '[name classname="footer__logo__name" stacked="true" ]' ); ?>
			</div>
			
			<?php wp_nav_menu( array( 'theme_location' => 'menu-footer', 'menu_id' => 'footer-menu', 'menu_class' => 'footer-nav list-reset flex flex-col md:flex-row text-center md:text-left items-center justify-start md:justify-end', 'container_class' => '' ) ); ?>
	</div>
	<div class="flex flex-col lg:flex-row justify-center items-center mb-4" >
		<p class="mb-1 lg:mb-0"><?php the_field('company_address', 'options'); ?></p>
		<p class="footer__bar"></p>
		<p class="mb-4 lg:mb-0"><?php the_field('company_phone_number', 'options'); ?></p>
		<p class="footer__bar hidden lg:block"></p>
		<p class="w-3 lg:w-2">
			<a href="<?php the_field('company_facebook_page', 'options'); ?>">
				<svg viewBox="0 0 10 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M9.27537 6.57204H6.11039V4.49628C6.11039 3.71673 6.62706 3.53499 6.99096 3.53499C7.35403 3.53499 9.22445 3.53499 9.22445 3.53499V0.107953L6.14848 0.0959473C2.73387 0.0959473 1.9568 2.65194 1.9568 4.28763V6.57204H-0.0179443V10.1034H1.9568C1.9568 14.6354 1.9568 20.0959 1.9568 20.0959H6.11039C6.11039 20.0959 6.11039 14.5816 6.11039 10.1034H8.91313L9.27537 6.57204Z" fill="white"/>
				</svg>
			</a>
		</p>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>

</body>
</html>
