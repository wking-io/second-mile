<?php
/**
 * Shortcodes
 *
 * @package second-mile
 */

// add_shortcode( 'tagline', 'secondmile_tagline_shortcode' );

function secondmile_tagline_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'theme' => 'none',
	), $atts );

	if ( $a['theme'] === 'people-red' ) :
		$people = __( '<span class="text-primary">People.</span>', THEME_NAME );
		$passion = __( 'Passion.', THEME_NAME ); 
		$purpose = __( 'Purpose.', THEME_NAME );
	elseif ( $a['theme'] === 'stack' ) :
		$people = __( '<span class="block">People.</span>', THEME_NAME );
		$passion = __( '<span class="block">Passion.</span>', THEME_NAME ); 
		$purpose = __( '<span class="block">Purpose.</span>', THEME_NAME );
	else :
		$people = __( 'People.', THEME_NAME );
		$passion = __( 'Passion.', THEME_NAME );
		$purpose = __( 'Purpose.', THEME_NAME );
	endif;

	$words = array(
		$people,
		$passion,
		$purpose,
	);
	return implode( ' ', $words );
}

add_shortcode( 'name', 'secondmile_name_shortcode');

function secondmile_name_shortcode( $atts = array() ) {

	$a = shortcode_atts( array(
		'classname' => '',
		'color' => '#273444'
	), $atts );

	$color = empty( $a['color'] ) ? '#273444' : $a['color'];

	ob_start(); ?>

	<div class="<?php echo $a['classname']; ?>">
		<h1 class="visually-hidden">Second Mile</h1>
		<svg class="w-full h-full block" viewBox="0 0 165 20" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M7.97661 0C4.8655 0 1.68421 2.2924 1.68421 5.89474C1.68421 7.90643 3.04094 9.7076 5.35672 10.8538C7.64912 12 9.7076 12.6316 9.7076 14.0351C9.7076 15.8363 7.88304 15.9298 6.92398 15.9298C4.77193 15.9298 2.19883 13.7544 2.19883 13.7544L0 17.4503C0 17.4503 2.73684 20 7.25146 20C11.0175 20 14.5263 18.386 14.5263 13.7778C14.5263 11.2515 12.1637 9.4269 10.0117 8.51462C7.81287 7.57895 5.9883 6.80702 5.9883 5.73099C5.9883 4.67836 6.78363 4 8.2807 4C10.269 4 12.1871 5.33333 12.1871 5.33333L13.9649 1.82456C13.9649 1.82456 11.4854 0 7.97661 0Z" fill="<?php echo $color; ?>"/>
			<path d="M27.6228 0.350877H16.5819V19.6491H27.6228V15.7895H20.9795V11.9064H27.3421V8.04678H20.9795V4.21053H27.6228V0.350877Z" fill="<?php echo $color; ?>"/>
			<path d="M40.42 15.6725C35.9989 15.6725 34.0574 12.5848 34.0574 9.98831C34.0574 7.41521 35.9989 4.32749 40.42 4.32749C42.6656 4.32749 44.2094 5.52047 44.2094 5.52047L46.0808 1.77778C46.0808 1.77778 43.9287 0 39.7416 0C34.2679 0 29.2855 4.49123 29.2855 10.0351C29.2855 15.5556 34.2913 20 39.7416 20C43.9287 20 46.0808 18.2222 46.0808 18.2222L44.2094 14.4795C44.2094 14.4795 42.6656 15.6725 40.42 15.6725Z" fill="<?php echo $color; ?>"/>
			<path d="M46.8978 9.98831C46.8978 15.6257 50.9212 20 56.6288 20C62.1727 20 66.3364 15.6257 66.3364 9.98831C66.3364 4.35088 61.9856 0 56.6288 0C51.3189 0 46.8978 4.35088 46.8978 9.98831ZM51.6464 9.98831C51.6464 7.11111 53.237 4.23392 56.6288 4.23392C60.044 4.23392 61.5879 7.11111 61.5879 9.98831C61.5879 12.8655 60.1376 15.7427 56.6288 15.7427C53.0265 15.7427 51.6464 12.8655 51.6464 9.98831Z" fill="<?php echo $color; ?>"/>
			<path d="M72.6745 7.67251H72.7213L80.3938 19.6491H84.7915V0.350877H80.3938V12.3275H80.347L72.6745 0.350877H68.2769V19.6491H72.6745V7.67251Z" fill="<?php echo $color; ?>"/>
			<path d="M87.6025 0.350877V19.6491H93.1932C98.5031 19.6491 102.924 15.6257 102.924 9.98831C102.924 4.37427 98.4797 0.350877 93.1932 0.350877H87.6025ZM92.0002 15.7193V4.2807H92.6785C95.9534 4.2807 98.1756 6.78363 98.1756 10.0117C98.1522 13.2398 95.93 15.7193 92.6785 15.7193H92.0002Z" fill="<?php echo $color; ?>"/>
			<path d="M127.222 19.6491H131.619L129.888 0.350877H125.21L120.929 11.4854L116.649 0.350877H111.97L110.239 19.6491H114.637L115.549 8.21053H115.666L119.619 19.5322H122.239L126.192 8.21053H126.309L127.222 19.6491Z" fill="<?php echo $color; ?>"/>
			<path d="M137.802 0.350877H133.404V19.6491H137.802V0.350877Z" fill="<?php echo $color; ?>"/>
			<path d="M144.997 0.350877H140.6V19.6491H151.641V15.7895H144.997V0.350877Z" fill="<?php echo $color; ?>"/>
			<path d="M164.867 0.350877H153.826V19.6491H164.867V15.7895H158.224V11.9064H164.586V8.04678H158.224V4.21053H164.867V0.350877Z" fill="<?php echo $color; ?>"/>
		</svg>
	</div>
		
	<?php return ob_get_clean();
}

add_shortcode( 'logo', 'secondmile_logo_shortcode');

function secondmile_logo_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'classname' => '',
		'color' => '#273444'
	), $atts );

	$color = empty( $a['color'] ) ? '#273444' : $a['color'];

	ob_start(); ?>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1080 1080" class="<?php echo $a['classname']; ?>">
		<polyline points="621.27 428.98 714.34 530.1 621.27 631.22 746.72 631.22 746.72 766.9 310.28 766.9 621.27 428.98" fill="<?php echo $color; ?>" />
		<path d="M621.27,429a71,71,0,1,0-141.9,0H353.92c0-108.46,87.93-196.39,196.4-196.39S746.72,320.52,746.72,429Z" fill="<?php echo $color; ?>" />
		<path d="M540,1080C242.25,1080,0,837.75,0,540S242.25,0,540,0s540,242.25,540,540S837.76,1080,540,1080Zm0-963.75c-233.65,0-423.75,190.09-423.75,423.75S306.35,963.75,540,963.75,963.75,773.66,963.75,540,773.66,116.25,540,116.25Z" fill="<?php echo $color; ?>" />
	</svg>
		
	<?php return ob_get_clean();
}

// add_shortcode( 'slider_nav', 'secondmile_slider_nav_shortcode');

function secondmile_slider_nav_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'large' => 'false',
		'type' => 'prev',
		'vertical' => 'false',
		'secondary' => 'false',
	), $atts );

	
	$is_large = $a['large'] === 'true';
	$is_vertical = $a['vertical'] === 'true';
	$is_secondary = $a['secondary'] === 'true';

	ob_start(); ?>

	<button class="button-slider button-slider-<?php echo $a['type']; ?><?php echo $is_large ? ' button-slider-large' : ''; ?><?php echo $is_vertical ? ' button-slider-vertical' : ''; ?><?php echo $is_secondary ? ' button-slider-secondary' : ''; ?>" data-slider-<?php echo $a['type']; ?>>
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 18" class="button-slider-arrow">
			<path class="button-slider-arrow-fill" fill-rule="evenodd" d="M10.886 2.4L4.286 9l6.6 6.6L9 17.485.515 9 9 .515 10.886 2.4z"/>
		</svg>
	</button>
		
	<?php return ob_get_clean();
}

// add_shortcode( 'loader', 'secondmile_loader_shortcode');

function secondmile_loader_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'dark' => 'false',
	), $atts );

	
	$color = $a['dark'] === 'true' ? '#3F4243' : '#FFFFFF';

	ob_start(); ?>

	<svg class="loader" width="57" height="57" viewBox="0 0 57 57" xmlns="http://www.w3.org/2000/svg" stroke="<?php echo $color; ?>">
			<g fill="none" fill-rule="evenodd">
					<g transform="translate(1 1)" stroke-width="2">
							<circle cx="5" cy="50" r="5">
									<animate attributeName="cy"
											begin="0s" dur="2.2s"
											values="50;5;50;50"
											calcMode="linear"
											repeatCount="indefinite" />
									<animate attributeName="cx"
											begin="0s" dur="2.2s"
											values="5;27;49;5"
											calcMode="linear"
											repeatCount="indefinite" />
							</circle>
							<circle cx="27" cy="5" r="5">
									<animate attributeName="cy"
											begin="0s" dur="2.2s"
											from="5" to="5"
											values="5;50;50;5"
											calcMode="linear"
											repeatCount="indefinite" />
									<animate attributeName="cx"
											begin="0s" dur="2.2s"
											from="27" to="27"
											values="27;49;5;27"
											calcMode="linear"
											repeatCount="indefinite" />
							</circle>
							<circle cx="49" cy="50" r="5">
									<animate attributeName="cy"
											begin="0s" dur="2.2s"
											values="50;50;5;50"
											calcMode="linear"
											repeatCount="indefinite" />
									<animate attributeName="cx"
											from="49" to="49"
											begin="0s" dur="2.2s"
											values="49;5;27;49"
											calcMode="linear"
											repeatCount="indefinite" />
							</circle>
					</g>
			</g>
	</svg>
		
	<?php return ob_get_clean();
}