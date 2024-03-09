<?php
namespace Wooves\ProductHealth\Contracts;

abstract class Hookable{

    /**
     * A hookable always has a register_hooks function.
     *
     * @return void
     */
    public function register_hooks() : void 
    {
        
    }
}
