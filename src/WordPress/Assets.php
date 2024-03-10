<?php

namespace MindBlown\ProductHealth\WordPress;

use MindBlown\ProductHealth\Contracts\Hookable;

class Assets extends Hookable{

    public function register_hooks() : void
    {
        add_action( 'admin_enqueue_scripts', [ $this, 'enqueue' ]);
    }

    /**
     * Add our custom css and js
     *
     * @return void
     */
    public function enqueue()
    {
        if( isset( $_GET['page'] ) && $_GET['page'] == 'product-health' ){
            $url = plugin_dir_url( PRODUCTHEALTH_PATH );
            $url .= 'woo-product-health/assets/dist';

            wp_enqueue_script( 'product_health_js', $url . '/js/main.js' );
            wp_enqueue_style( 'product_health_style', $url .'/css/main.css' );
        }
    }

}
