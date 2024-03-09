<?php

namespace MindBlown\ProductHealth\Contracts;

class Controller{
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setup();
    }


    /**
     * Run this at setup
     *
     * @return void
     */
    public function setup() : void 
    {
        
    }
}
