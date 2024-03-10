<?php

namespace MindBlown\ProductHealth\Validators;

use MindBlown\ProductHealth\Contracts\Validator;

class HasEan extends Validator{

    protected $importance = 'critical';

    /**
     * Does this product have an EAN?
     *
     * @return boolean
     */
    public function test() : bool
    {
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
            __( '<a href="[link]">%s</a> doesn\'t have an EAN-number. EAN numbers are required by the European Union.', 'product-health' ),
            $this->product->get_title()
        );        
    }
}
