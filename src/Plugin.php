<?php

namespace Wooves\ProductHealth;

use Wooves\ProductHealth\WooCommerce\RegisterMenu;

/**
 * Plugin God class.
 */
class Plugin {

	/**
	 * Runs when the plugin is first activated.
	 */
	public function install(): void {
	}

	/**
	 * Call all classes needed for the custom functionality.
	 */
	public function init(): void {

        ( new RegisterMenu )->register_hooks();
	}
}
