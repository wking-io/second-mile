<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package second-mile
 */

?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="Content-Language" content="en">
		<meta name="google" content="notranslate">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php if ( is_page( 'contact' ) ) {
			gravity_form_enqueue_scripts( 1, false );
		} ?>
		<?php wp_head(); ?>
	</head>

<body <?php body_class( 'font-sans text-black' ); ?> <?php echo secondmile_page_attributes(); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', THEME_NAME ); ?></a>

	<header id="masthead" class="header w-full flex justify-between items-center fixed z-50" role="banner" data-menu-open="false">
		<h1 class="branding relative z-50 h-6">
			<a class="flex items-center h-full" href="<?php echo home_url(); ?>">
				<?php echo do_shortcode( '[logo classname="h-full mr-6"]' ); ?>
				<?php echo do_shortcode( '[name classname="h-4"]' ); ?>
			</a>
		</h1>

		<nav class="nav z-50" role="navigation">
			<button class="menu-toggle z-40 w-6 relative cursor-pointer lg:hidden" aria-expanded="false" aria-controls="masthead">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
		
			<div class="menu-wrapper w-full flex flex-col lg:flex-row justify-end items-center fixed lg:static pin bg-black lg:bg-transparent p-8 lg:p-0 overflow-hidden lg:overflow-visible text-white lg:text-black text-right opacity-0 lg:opacity-100">
				<?php wp_nav_menu( array(
					'theme_location' => 'menu-main',
					'menu_id' => 'primary-menu',
					'menu_class' => 'list-reset flex flex-col lg:flex-row justify-center lg:justify-end items-between lg:items-center menu-item-list w-full h-full lg:h-auto p-4 sm:p-6 lg:p-0 m-0',
					'container' => false,
					'walker' => new Primary_Menu()
				) ); ?>
				<div class="menu-aside w-full text-white p-4 sm:p-6 m-0 lg:hidden">
					<p class="mb-4 leading-normal"><?php the_field('company_verse_text', 'options' ); ?></p>
					<p class="m-0"><strong><?php the_field('company_verse_location', 'options' ); ?></strong></p>
				</div>
			</div>

		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->