<?php
/**
 * Debug Bar Cookies Panel
 */
class Debug_Bar_Cookies extends Debug_Bar_Panel {
	protected $cookies = array();

	function init() {
		$this->title( 'Cookies' );
	}

	function prerender() {
		$this->set_visible( true );
	}

	function debug_bar_classes( $classes ) {
		return $classes;
	}

	function render() {
		$this->cookies = $_COOKIE;
		echo '<div id="debug-bar-cookies">';
		echo '<table>';
		echo '<thead>';
		echo '<tr>';
		echo '<th>Type</th>';
		echo '<th>Path</th>';
		echo '<th>Name</th>';
		echo '<th>Value</th>';
		echo '</tr>';
		echo '</thead>';
		echo '<tbody>';
		foreach ( $this->cookies as $key => $value ) {
			echo '<tr>';
			echo '<td>Server</td>';
			echo '<td>/</td>';
			echo '<td>' . esc_html( $key ) . '</td>';
			echo '<td>' . esc_html( $value ) . '</td>';
			echo '</tr>';
		}
		echo '</tbody>';
		echo '</table>';
		echo '</div>';

		echo <<<HTML
<script>
	dbCookiesTable = document.getElementById('debug-bar-cookies').getElementsByTagName('tbody')[0];
	var cookieRow = dbCookiesTable.insertRow();
	var cookieType = cookieRow.insertCell();
	var cookiePath = cookieRow.insertCell();
	var cookieName = cookieRow.insertCell();
	var cookieValue = cookieRow.insertCell();
	cookieType.innerHTML = "Client";
	cookiePath.innerHTML = "/";
	cookieName.innerHTML = "TestCookie";
	cookieValue.innerHTML = "It works!";
</script>
HTML;
	}
}
