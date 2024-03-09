<?php

namespace Wooves\ProductHealth\Controllers;

use Wooves\ProductHealth\Contracts\Controller;

class ProductController extends Controller{


    /**
     * Trigger a scan for each product
     *
     * @return void
     */
    public function scan()
    {
        $products = $this->get_batch();
        
        //schedule a job for each product:
        foreach( $products as $product ){
            as_schedule_single_action( 
                time(),
                'ph_validate_product', 
                ['product_id' => $product->get_id() ]
            );
        }   
    }


    /**
     * Return all products 
     *
     * @return void
     */
    public function get_batch()
    {
        return \wc_get_products([ 'limit' => 3 ]);
    }


}
