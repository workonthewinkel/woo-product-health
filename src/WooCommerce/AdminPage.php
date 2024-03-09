<?php

namespace Wooves\ProductHealth\WooCommerce;

use Wooves\ProductHealth\Contracts\View;

class AdminPage extends View{

    protected $template = 'admin-page';
    
    public function data() : array
    {
        return [];
        /*$controller = new ProductController;
        return [
            'warnings' => $controller->get_warnings(),
            'improvements' => $controller->get_improvements()
        ];*/
    }

}
