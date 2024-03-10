<?php

namespace MindBlown\ProductHealth\WordPress;

use MindBlown\ProductHealth\Models\Issue;
use MindBlown\ProductHealth\Contracts\View;
use MindBlown\ProductHealth\Controllers\ProductScanController;

class AdminPage extends View{

    protected $template = 'admin-page';
    
    /**
     * Before we render this page
     *
     * @return void
     */
    public function pre_render()
    {
        if( 
            isset( $_POST['trigger_form_nonce'] ) && 
            wp_verify_nonce( $_POST['trigger_form_nonce'], 'ph_scan_products' ) 
        ){
            $controller = new ProductScanController();
            $controller->scan_all();
        }
    }

    /**
     * Data array
     *
     * @return array
     */
    public function data() : array
    {
        return [
            'issues' => Issue::where('cleaned_at', null )->get()
        ];
    }

}
