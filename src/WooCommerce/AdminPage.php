<?php

namespace MindBlown\ProductHealth\WooCommerce;

use MindBlown\ProductHealth\Models\Issue;
use MindBlown\ProductHealth\Contracts\View;
use MindBlown\ProductHealth\Controllers\ProductController;

class AdminPage extends View{

    protected $template = 'admin-page';
    
    /**
     * Before we render this page
     *
     * @return void
     */
    public function pre_render()
    {
        //$controller = new ProductController();
        //$controller->scan( 5000 );
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
