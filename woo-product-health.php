<?php
/**
 * Plugin Name: Woocommerce Product Health
 * Description: Adds a product health checker
 * Author: Luc Princen
 * Author URI: https://workonthewinkel.nl
 * Version: 1.0.0
 */


use MindBlown\ProductHealth\Plugin;

define( 'PRODUCTHEALTH_FILE', __FILE__ );
define( 'PRODUCTHEALTH_PATH', dirname( PRODUCTHEALTH_FILE ) );

if ( !file_exists( PRODUCTHEALTH_PATH . '/vendor/autoload.php' ) ) {
    return;
}

require PRODUCTHEALTH_PATH . '/vendor/autoload.php';

// Upon activation check if the data model is in order.
register_activation_hook( PRODUCTHEALTH_FILE, function() {
	( new Plugin() )->install();
} );

/**
 * Bootstrap the Giro555 plugin.
 */
function product_health_plugin() : Plugin {
	static $plugin;

	if ( is_object( $plugin ) ) {
		return $plugin;
	}

	$plugin = new Plugin();
    $plugin->boot();
	$plugin->init();

	return $plugin;
}

add_action( 'plugins_loaded', 'product_health_plugin' );
