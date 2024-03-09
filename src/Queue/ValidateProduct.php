<?php

namespace Wooves\ProductHealth\Queue;

use Wooves\ProductHealth\Contracts\Queueable;

class ValidateProduct extends Queueable{

    /**
     * Hook on which this job runs
     *
     * @var string
     */
    protected $hook = 'ph_validate_product';

    
    /**
     * Run this validator
     *
     * @return void
     */
    public function run( $product_id )
    {
        $product = \wc_get_product( $product_id );
        $validators = $this->validators();

        foreach( $validators as $validator ){

            $instance = new $validator( $product );
            
            //we have a failed test:
            if( $instance->test() == false ){

                //log the message somewhere:
                error_log( $instance->message() );

            }
        }
    }

    /**
     * Returns all validator classes
     *
     * @return array
     */
    public function validators() : array
    {
        $response = [];
        $dir = PRODUCTHEALTH_PATH .'/src/Validators';
        $namespace = '\\Wooves\\ProductHealth\\Validators\\';


        $files = scandir( $dir );
        $not_allowed = ['.', '..', '.DS_Store' ];
        
        foreach( $files as $file ){
            if( !in_array( $file, $not_allowed ) ){
                
                $class = str_replace( '.php', '', $file );
                $response[] = $namespace . $class;
            } 
        }

        return $response;
    }
}
