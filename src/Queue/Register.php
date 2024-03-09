<?php

namespace MindBlown\ProductHealth\Queue;

class Register{

    public function register_hooks()
    {
        //get all classes in this folder:
        $queueables = $this->queueables();
        foreach( $queueables as $queueable ){

            //loop through each instance and register their hook
            $instance = '\\MindBlown\\ProductHealth\\Queue\\'.$queueable;
            ( new $instance )->register_hooks();
        }
    }


    /**
     * Return all files in this folder to queue them
     *
     * @return array 
     */
    public function queueables() : array
    {
        $response = [];
        $dir = PRODUCTHEALTH_PATH .'/src/Queue';
        $files = scandir( $dir );

        $not_allowed = ['.', '..', '.DS_Store', 'Register.php' ];
        
        foreach( $files as $file ){
            if( !in_array( $file, $not_allowed ) ){
                $response[] = str_replace( '.php', '', $file );
            } 
        }

        return $response;
    }
}
