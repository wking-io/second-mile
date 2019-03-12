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
		'stacked' => false,
	), $atts );

	$is_stacked = $a['stacked'] == 'true';

	ob_start(); ?>

	<div class="<?php echo $a['classname']; ?>">
		<h1 class="visually-hidden">Second Mile</h1>

		<?php if ( $is_stacked ) : ?>
			<svg height="100%" viewBox="0 0 89 40" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M6.89749 0C4.20726 0 1.45636 1.99339 1.45636 5.12586C1.45636 6.87516 2.62954 8.44139 4.63204 9.43809C6.61431 10.4348 8.3943 10.984 8.3943 12.2044C8.3943 13.7707 6.81658 13.852 5.98726 13.852C4.12636 13.852 1.90136 11.9603 1.90136 11.9603L0 15.1742C0 15.1742 2.36659 17.3913 6.27044 17.3913C9.52703 17.3913 12.5611 15.9878 12.5611 11.9807C12.5611 9.78388 10.5182 8.19731 8.65726 7.40402C6.7559 6.59039 5.17817 5.91915 5.17817 4.98347C5.17817 4.06814 5.8659 3.47826 7.16044 3.47826C8.87976 3.47826 10.5384 4.63768 10.5384 4.63768L12.0757 1.58658C12.0757 1.58658 9.93157 0 6.89749 0Z" class="logo-name__fill"/>
				<path d="M23.8858 0.30511H14.3386V17.0862H23.8858V13.73H18.1413V10.3534H23.6431V6.9972H18.1413V3.66133H23.8858V0.30511Z" class="logo-name__fill"/>
				<path d="M34.9517 13.6283C31.1288 13.6283 29.4499 10.9433 29.4499 8.68548C29.4499 6.448 31.1288 3.76303 34.9517 3.76303C36.8935 3.76303 38.2285 4.80041 38.2285 4.80041L39.8467 1.54589C39.8467 1.54589 37.9858 0 34.3651 0C29.632 0 25.3235 3.90542 25.3235 8.72616C25.3235 13.5266 29.6522 17.3913 34.3651 17.3913C37.9858 17.3913 39.8467 15.8454 39.8467 15.8454L38.2285 12.5909C38.2285 12.5909 36.8935 13.6283 34.9517 13.6283Z" class="logo-name__fill"/>
				<path d="M40.5532 8.68548C40.5532 13.5876 44.0323 17.3913 48.9678 17.3913C53.7616 17.3913 57.3621 13.5876 57.3621 8.68548C57.3621 3.78337 53.5998 0 48.9678 0C44.3762 0 40.5532 3.78337 40.5532 8.68548ZM44.6594 8.68548C44.6594 6.18358 46.0348 3.68167 48.9678 3.68167C51.9209 3.68167 53.2559 6.18358 53.2559 8.68548C53.2559 11.1874 52.0019 13.6893 48.9678 13.6893C45.8528 13.6893 44.6594 11.1874 44.6594 8.68548Z" class="logo-name__fill"/>
				<path d="M62.8427 6.67175H62.8832L69.5177 17.0862H73.3204V0.30511H69.5177V10.7196H69.4772L62.8427 0.30511H59.04V17.0862H62.8427V6.67175Z" class="logo-name__fill"/>
				<path d="M75.7512 0.30511V17.0862H80.5855C85.177 17.0862 89 13.5876 89 8.68548C89 3.80371 85.1568 0.30511 80.5855 0.30511H75.7512ZM79.5539 13.669V3.72235H80.1405C82.9723 3.72235 84.8939 5.89881 84.8939 8.70582C84.8736 11.5128 82.952 13.669 80.1405 13.669H79.5539Z" class="logo-name__fill"/>
				<path d="M14.685 40H18.4877L16.9909 23.2189H12.9454L9.24384 32.9011L5.54227 23.2189H1.49682L0 40H3.80271L4.59158 30.0534H4.69273L8.11112 39.8983H10.3766L13.795 30.0534H13.8961L14.685 40Z" class="logo-name__fill"/>
				<path d="M23.8335 23.2189H20.0308V40H23.8335V23.2189Z" class="logo-name__fill"/>
				<path d="M30.0558 23.2189H26.253V40H35.8003V36.6438H30.0558V23.2189Z" class="logo-name__fill"/>
				<path d="M47.2374 23.2189H37.6901V40H47.2374V36.6438H41.4929V33.2672H46.9947V29.911H41.4929V26.5751H47.2374V23.2189Z" class="logo-name__fill"/>
			</svg>
		<?php else : ?>
			<svg class="logo-name w-full h-full block" viewBox="0 0 165 20" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path class="logo-name__fill" d="M7.97661 0C4.8655 0 1.68421 2.2924 1.68421 5.89474C1.68421 7.90643 3.04094 9.7076 5.35672 10.8538C7.64912 12 9.7076 12.6316 9.7076 14.0351C9.7076 15.8363 7.88304 15.9298 6.92398 15.9298C4.77193 15.9298 2.19883 13.7544 2.19883 13.7544L0 17.4503C0 17.4503 2.73684 20 7.25146 20C11.0175 20 14.5263 18.386 14.5263 13.7778C14.5263 11.2515 12.1637 9.4269 10.0117 8.51462C7.81287 7.57895 5.9883 6.80702 5.9883 5.73099C5.9883 4.67836 6.78363 4 8.2807 4C10.269 4 12.1871 5.33333 12.1871 5.33333L13.9649 1.82456C13.9649 1.82456 11.4854 0 7.97661 0Z" />
				<path class="logo-name__fill" d="M27.6228 0.350877H16.5819V19.6491H27.6228V15.7895H20.9795V11.9064H27.3421V8.04678H20.9795V4.21053H27.6228V0.350877Z" />
				<path class="logo-name__fill" d="M40.42 15.6725C35.9989 15.6725 34.0574 12.5848 34.0574 9.98831C34.0574 7.41521 35.9989 4.32749 40.42 4.32749C42.6656 4.32749 44.2094 5.52047 44.2094 5.52047L46.0808 1.77778C46.0808 1.77778 43.9287 0 39.7416 0C34.2679 0 29.2855 4.49123 29.2855 10.0351C29.2855 15.5556 34.2913 20 39.7416 20C43.9287 20 46.0808 18.2222 46.0808 18.2222L44.2094 14.4795C44.2094 14.4795 42.6656 15.6725 40.42 15.6725Z" />
				<path class="logo-name__fill" d="M46.8978 9.98831C46.8978 15.6257 50.9212 20 56.6288 20C62.1727 20 66.3364 15.6257 66.3364 9.98831C66.3364 4.35088 61.9856 0 56.6288 0C51.3189 0 46.8978 4.35088 46.8978 9.98831ZM51.6464 9.98831C51.6464 7.11111 53.237 4.23392 56.6288 4.23392C60.044 4.23392 61.5879 7.11111 61.5879 9.98831C61.5879 12.8655 60.1376 15.7427 56.6288 15.7427C53.0265 15.7427 51.6464 12.8655 51.6464 9.98831Z" />
				<path class="logo-name__fill" d="M72.6745 7.67251H72.7213L80.3938 19.6491H84.7915V0.350877H80.3938V12.3275H80.347L72.6745 0.350877H68.2769V19.6491H72.6745V7.67251Z" />
				<path class="logo-name__fill" d="M87.6025 0.350877V19.6491H93.1932C98.5031 19.6491 102.924 15.6257 102.924 9.98831C102.924 4.37427 98.4797 0.350877 93.1932 0.350877H87.6025ZM92.0002 15.7193V4.2807H92.6785C95.9534 4.2807 98.1756 6.78363 98.1756 10.0117C98.1522 13.2398 95.93 15.7193 92.6785 15.7193H92.0002Z" />
				<path class="logo-name__fill" d="M127.222 19.6491H131.619L129.888 0.350877H125.21L120.929 11.4854L116.649 0.350877H111.97L110.239 19.6491H114.637L115.549 8.21053H115.666L119.619 19.5322H122.239L126.192 8.21053H126.309L127.222 19.6491Z" />
				<path class="logo-name__fill" d="M137.802 0.350877H133.404V19.6491H137.802V0.350877Z" />
				<path class="logo-name__fill" d="M144.997 0.350877H140.6V19.6491H151.641V15.7895H144.997V0.350877Z" />
				<path class="logo-name__fill" d="M164.867 0.350877H153.826V19.6491H164.867V15.7895H158.224V11.9064H164.586V8.04678H158.224V4.21053H164.867V0.350877Z" />
			</svg>
		<?php endif; ?>
	</div>
		
	<?php return ob_get_clean();
}

add_shortcode( 'logo', 'secondmile_logo_shortcode');

function secondmile_logo_shortcode( $atts = array() ) {
	$a = shortcode_atts( array(
		'classname' => '',
	), $atts );

	ob_start(); ?>

	<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1080 1080" class="logo-icon <?php echo $a['classname']; ?>">
		<polyline class="logo-icon__fill" points="621.27 428.98 714.34 530.1 621.27 631.22 746.72 631.22 746.72 766.9 310.28 766.9 621.27 428.98" />
		<path class="logo-icon__fill" d="M621.27,429a71,71,0,1,0-141.9,0H353.92c0-108.46,87.93-196.39,196.4-196.39S746.72,320.52,746.72,429Z" />
		<path class="logo-icon__fill" d="M540,1080C242.25,1080,0,837.75,0,540S242.25,0,540,0s540,242.25,540,540S837.76,1080,540,1080Zm0-963.75c-233.65,0-423.75,190.09-423.75,423.75S306.35,963.75,540,963.75,963.75,773.66,963.75,540,773.66,116.25,540,116.25Z" />
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