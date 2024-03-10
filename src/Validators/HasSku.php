<?php

namespace MindBlown\ProductHealth\Validators;

use MindBlown\ProductHealth\Contracts\Validator;

class HasSku extends Validator{

    /**
     * Does this product have a SKU?
     *
     * @return boolean
     */
    public function test() : bool
    {
        $sku = $this->product->get_sku();

        if( $sku === false || is_null( $sku ) || $sku === '' ){
            return false;
        }

        return true;
    }
 
    /**
     * Actionable message / advice
     *
     * @return string
     */
    public function message() : string
    {
        return sprintf(
            __( '<a href="[link]">%s</a> doesn\'t have a SKU.', 'product-health' ),
            $this->product->get_title()
        );
    }
}
