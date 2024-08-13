<?php
/**
 * Cookie tracking extension for Debug Bar / Query Monitor
 *
 * Plugin Name:       Debug Bar Cookies
 * Description:       Adds a Debug Bar / Query Monitor menu for tracking cookies
 * Version:           0.1.0
 * Author:            Elliott Rhys @ WordPress VIP
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package           debug-bar-cookies
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once 'class-debug-bar-cookies.php';

add_filter( 'debug_bar_panels', 'qm_cookie_panel', 20, 1 );

function qm_cookie_panel( $panels ) {
	$panels[] = new Debug_Bar_Cookies();
	return $panels;
}