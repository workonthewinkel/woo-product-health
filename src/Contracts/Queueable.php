<?php

namespace MindBlown\ProductHealth\Contracts;

class Queueable extends Hookable{

    /**
     * Hook on which this queueable gets triggered
     *
     * @var string
     */
    protected $hook;


    /**
     * Register this job    
     *
     * @return void
     */
    public function register_hooks() : void 
    {
        //only hook into the hook, if we have a run action
        //we can't give a default for this function because of
        //how action scheduler deals with arguments.
        if( method_exists( $this, 'run' ) ){
            add_action( $this->hook, [ $this, 'run' ]);
        }
    }


}
