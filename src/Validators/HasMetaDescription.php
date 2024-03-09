<?php

namespace Wooves\ProductHealth\Validators;

use Wooves\ProductHealth\Contracts\Validator;

class HasMetaDescription extends Validator{

    /**
     * Does this product have stock left?
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
            __( '%s doesn\'t seem to have a meta description.', 'product-health' ),
            $this->product->get_title()
        );
    }
}
