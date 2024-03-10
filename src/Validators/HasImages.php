<?php

namespace MindBlown\ProductHealth\Validators;

use MindBlown\ProductHealth\Contracts\Validator;

class HasImages extends Validator{

    protected $importance = 'medium';

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
            __( '<a href="[link]">%s</a> doesn\'t seem to have images.', 'product-health' ),
            $this->product->get_title()
        );
    }
}
