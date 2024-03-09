<?php

namespace Wooves\ProductHealth\WooCommerce;

use Wooves\ProductHealth\Contracts\View;
use Wooves\ProductHealth\Controllers\ProductController;

class AdminPage extends View{

    protected $template = 'admin-page';
    
    public function data() : array
    {
        $controller = new ProductController;
        $controller->scan();

        return [
          //  'products' => $controller->get_batch()
        ];
    }

}
