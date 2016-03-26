<?php
/**
 * Landing page countdown template part.
 *
 * This template part is called by template-landing-page.php.
 *
 *
 * @package		Mosalon WordPress Theme
 * @copyright	Copyright (c) 2016, ThemesBros.com, distributed under the terms of the GNU GPL
 * @license		http://www.gnu.org/licenses/quick-guide-gplv3.html  GNU Public License
 * @author		ThemesBros <www.themesbros.com/contact/>
 */

if ( 0 == absint( get_theme_mod( 'display_countdown', 1 ) ) )
	return;
?>
<div id="mosalon-countdown" class="wrap">

	<?php
	wp_enqueue_script( 'mosalon-countdown' );
	$day   = (int) get_theme_mod( 'cd_day', date( 'd' ) );
	$month = esc_attr( get_theme_mod( 'cd_month', 'Jan' ) );
	$year  = (int) get_theme_mod( 'cd_year', date( 'Y' ) + 1 );
	$hour  = zeroise( get_theme_mod( 'cd_hour', date( 'G' ) ), 2 );
	$min   = zeroise( get_theme_mod( 'cd_min', date( 'i' ) ), 2 );
	$date  = $day . ' ' . $month . ' ' . $year . ' ' . $hour . ':' . $min;

	wp_localize_script(
		'mosalon-custom-js',
		'cdVars',
		array(
			'countDown' => true,
			'date'      => $date,
			'day_s'     => __( 'Day', 'mosalon' ),
			'day_m'     => __( 'Days', 'mosalon' ),
			'hour_s'    => __( 'Hour', 'mosalon' ),
			'hour_m'    => __( 'Hours', 'mosalon' ),
			'min_s'     => __( 'Minute', 'mosalon' ),
			'min_m'     => __( 'Minutes', 'mosalon' ),
			'sec_s'     => __( 'Second', 'mosalon' ),
			'sec_m'     => __( 'Seconds', 'mosalon' ),
		)
	);

 	?>

	<div class="ct-col text-center">
		<span class="ct-numbers days">00</span>
		<span class="ct-text timeRefDays"></span>
	</div>
	<div class="ct-col text-center">
		<span class="ct-numbers hours">00</span>
		<span class="ct-text timeRefHours"></span>
	</div>
	<div class="ct-col text-center">
		<span class="ct-numbers minutes">00</span>
		<span class="ct-text timeRefMinutes"></span>
	</div>
	<div class="ct-col text-center">
		<span class="ct-numbers seconds">00</span>
		<span class="ct-text timeRefSeconds"></span>
	</div>

</div><!-- #mosalon-countdown -->