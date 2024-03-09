<?php

namespace Wooves\ProductHealth\Contracts;


abstract class Validator{

    /**
     * Product class to test
     *
     * @var WC_Product
     */
    protected $product;

    /**
     * Constructor
     *
     * @param WC_Product $product
     */
    public function __construct( $product )
    {
        $this->product = $product;
    }


    /**
     * Is this validator valid?
     *
     * @return boolean
     */
    public function test() : bool
    {
        return true;
    }


    /**
     * Returns an actionable message or advice,
     * if the validator fails.
     *
     * @return string
     */
    public function message() : string 
    {
        return '';
    }
}
