<?php

namespace MindBlown\ProductHealth\WordPress;

use MindBlown\ProductHealth\Contracts\Hookable;
use MindBlown\ProductHealth\WordPress\AdminPage;

class RegisterMenu extends Hookable{

    public function register_hooks() : void 
    {
        //register the menu item
        add_action( 'admin_menu', [ $this, 'register' ] );
    }

    /**
     * Registers a submenu in WP Admin, under the Woocommerce nav-item  
     *
     * @return void
     */
    public function register() : void
    {
        add_submenu_page(
            'woocommerce', 
            __( 'Product Health', 'product-health' ),
            __( 'Product Health', 'product-health' ),
            'manage_options', //temp capability; maybe something custom?
            'product-health',
            [ new AdminPage(), 'render' ]
        );
    }
}
