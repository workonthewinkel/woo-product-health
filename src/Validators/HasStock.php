<?php

namespace Wooves\ProductHealth\Validators;

use Wooves\ProductHealth\Contracts\Validator;

class HasStock extends Validator{

    /**
     * Does this product have stock left?
     *
     * @return boolean
     */
    public function test() : bool
    {
        $threshold = get_option( 'woocommerce_notify_low_stock_amount', 2 );
        $quantity = $this->product->get_stock_quantity();

        if( $quantity <= $threshold ){
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
        $quantity = $this->product->get_stock_quantity();
        if( $quantity <= 0 ){
            return sprintf(
                __( '%s, has really no stock left.', 'product-health' ),
                $this->product->get_title()
            );
        }else{
            return sprintf( 
                __( '%s, has really low stock (%i)', 'product-health' ),
                $this->product->get_title(),
                $quantity
            );
        }
    }
}
