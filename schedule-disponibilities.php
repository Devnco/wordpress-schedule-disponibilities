<?php
/**
 * Plugin Name: Schedule Disponibilities
 * Plugin URI: http://www.hellomoon.be
 * Description: This plugin adds a shortcut to display some schedule into your pages and posts.
 * Version: 1.0.3
 * Author: Jeremy Jamar
 * Author URI: http://www.hellomoon.be
 * License: GPL2
 */
	
require 'libs/schedule-disponibilities.class.php';

// Add a Shorcode to Wordpres
define('SD_TEXTDOMAIN','schedule-disponibilities');

function schedule_func( $atts ){

	$schedule = new ScheduleDisponibilities();

	$schedule->setDaysName(array(
		__('Monday',SD_TEXTDOMAIN),
		__('Tuesday',SD_TEXTDOMAIN),
		__('Wednsday',SD_TEXTDOMAIN),
		__('Thursday',SD_TEXTDOMAIN),
		__('Friday',SD_TEXTDOMAIN),
		__('Saturday',SD_TEXTDOMAIN),
		__('Sunday',SD_TEXTDOMAIN)
	));

	$settings = shortcode_atts( array(
        'show-all-days' => null,
        'show-week-days' => null,
        'color' => null,
        'mo' => null,
        'tu' => null,
        'we' => null,
        'th' => null,
        'fr' => null,
        'sa' => null,
        'su' => null
    ), $atts );

	if( $settings['show-all-days'] === 'true' ){
		$schedule->displayAllDays();
	}	
	if( $settings['show-week-days'] === 'true' ){
		$schedule->displayWeekDays();
	}
	if( $settings['color'] != null ){
		$schedule->setColor($settings['color']);
	}
	foreach($schedule->getDaysShorcuts() as $day){
		if( $settings[$day] ){
			$schedule->setSchedule($day,$settings[$day]);
		}	
	}
	return $schedule->getSchedule();
}
add_shortcode( 'schedule', 'schedule_func' );

// Add Button to toolbar TinyMCE
add_action( 'init', 'schedule_init' );

function schedule_init() {
    add_filter( "mce_external_plugins", "schedule_add_buttons" );
    add_filter( 'mce_buttons', 'schedule_register_buttons' );
	load_plugin_textdomain(SD_TEXTDOMAIN,false,'schedule-disponibilities/languages/');
}

function schedule_add_buttons( $plugin_array ) {
    $plugin_array['ScheduleDisponibilities'] =  plugin_dir_url( __FILE__ ) . '/admin/assets/js/schedule-tinymce.js';
    return $plugin_array;
}
function schedule_register_buttons( $buttons ) {
    array_push( $buttons, 'AddSchedule' );
    return $buttons;
}
