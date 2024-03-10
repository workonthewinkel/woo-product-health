<?php

namespace MindBlown\ProductHealth\Controllers;

use MindBlown\ProductHealth\Contracts\Controller;

class ProductScanController extends Controller{


    /**
     * Trigger a scan for a batch of products
     *
     * @return void
     */
    public function scan( $limit = 10, $page = 0 ) : void
    {
        $products = $this->get_batch( $limit, $page );
        $this->trigger_scan( $products );
    }


    /**
     * Trigger a scan across all products
     *
     * @return void
     */
    public function scan_all() : void
    {
        $this->trigger_scan( \wc_get_products([]) );
    }

    /**
     * Trigger a health scan for all supplied products
     *
     * @param array $products
     * @return void
     */
    public function trigger_scan( $products ) : void
    {
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
    public function get_batch( $limit = 10, $page = 0 ) : array
    {
        return \wc_get_products([ 'limit' => $limit, 'page' => $page ]);
    }


}
