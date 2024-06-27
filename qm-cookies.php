<?php

/**
 * Cookie tracking extension for Query Monitor
 *
 * Plugin Name:       Query Monitor Cookies
 * Description:       Adds a Query Monitor menu for monitoring cookies
 * Version:           0.1.0
 * Author:            Elliott Rhys
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package           qm-cookies
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'plugins_loaded', 'load_qm_cookies_admin_menu' );

/**
 * Load cookies menu on Query Monitor
 */
function load_qm_cookies_admin_menu() {
	add_filter( 'qm/output/menus', 'register_qm_cookies_admin_menu', 1000, 1 );
	add_filter( 'qm/outputter/html', 'register_qm_output_html_cookies', 1001, 1 );
}

/**
 * Describe the QM Cookies admin menu item
 *
 * @param array $menu Array of menu items.
 */
function register_qm_cookies_admin_menu( $menu ) {
	$menu['qm-cookies'] = array(
		'id'    => 'query-monitor-cookies',
		'href'  => '#qm-cookies',
		'title' => 'Cookies',
	);
	return $menu;
}

/**
 * Describe the QM Cookies panel output
 *
 * @param string $output HTML to output.
 */
function register_qm_output_html_cookies( $output ) {
	$collector         = QM_Collectors::get( 'cookies' );
	$output['cookies'] = new QM_Output_Html_Cookies( $collector );
	return $output;
}

class QM_Output_Html_Cookies extends QM_Output_Html {
	public function __construct( $collector ) {
		parent::__construct( $collector );
	}

	public function name() {
		return 'Cookies';
	}

	public function output() {
		echo '<p>Hello!</p>';
	}
}

class QM_Collector_Cookies extends QM_DataCollector {
	public $id = 'cookies';
}

QM_Collectors::add( new QM_Collector_Cookies() );
