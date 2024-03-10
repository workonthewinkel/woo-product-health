<?php

namespace MindBlown\ProductHealth;

use MindBlown\ProductHealth\WordPress\Assets;
use MindBlown\ProductHealth\WordPress\RegisterMenu;
use Illuminate\Database\Capsule\Manager as Capsule;
use MindBlown\ProductHealth\Queue\Register as Queue;
use MindBlown\ProductHealth\Models\Schema\AddIssuesTable;

/**
 * Plugin God class.
 */
class Plugin {

	/**
	 * Runs when the plugin is first activated.
	 */
	public function install(): void 
    {
        ( new AddIssuesTable() )->maybe_run();
	}

    
    /**
	 * Call all classes needed for the custom functionality.
	 */
	public function init(): void {

        ( new Assets )->register_hooks();
        ( new RegisterMenu )->register_hooks();
        ( new Queue )->register_hooks();

	}


    /**
     * Boot the plugin
     *
     * @return void
     */
    public function boot() : void
    {
        $capsule = new Capsule;
        $capsule->addConnection([
            'driver'    => 'mysql',
            'host'      => DB_HOST,
            'database'  => DB_NAME,
            'username'  => DB_USER,
            'password'  => DB_PASSWORD,
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);


        // Make this Capsule instance available globally via static methods... (optional)
        $capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $capsule->bootEloquent();
    }


}
