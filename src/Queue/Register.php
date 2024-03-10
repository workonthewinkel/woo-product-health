<?php

namespace MindBlown\ProductHealth\Queue;

class Register{

    public function register_hooks()
    {
        //get all classes in this folder:
        $queueables = $this->queueables();
        foreach( $queueables as $queueable ){

            //loop through each instance and listen for their events:
            $instance = '\\MindBlown\\ProductHealth\\Queue\\'.$queueable;
            ( new $instance )->register_hooks();
        }

        //register any recurring jobs:
        add_action( 'init', [ $this, 'register_recurring' ]);
    }


    /**
     * Register any recurring jobs for this plugin
     *
     * @return void
     */
    public function register_recurring() : void
    {
        //daily check if our updates are out of date
        as_schedule_recurring_action( 
            time(),
            DAY_IN_SECONDS,
            'ph_update_issues', 
        );
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
