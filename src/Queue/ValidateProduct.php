<?php

namespace MindBlown\ProductHealth\Queue;

use MindBlown\ProductHealth\Contracts\Queueable;

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
                $instance->to_issue()->save();
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
        $namespace = '\\MindBlown\\ProductHealth\\Validators\\';


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
