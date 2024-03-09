<?php

namespace Wooves\ProductHealth\Contracts;

abstract class View{

    /**
     * Render this view
     *
     * @return void
     */
    public function render()
    {
        $template = $this->template();
        $data = $this->data();

        if( is_null( $template ) ){
            echo '<p>File not found: '.$this->template.'.php</p>';
            die();
        }

        // Extract args if there are any
        if ( is_array( $data ) && count( $data ) > 0 ) {
            extract( $data );
        }

        require( $template );

    }

    /**
     * Returns a template file
     *
     * @return string
     */
    public function template()
    {
        $file = PRODUCTHEALTH_PATH . '/templates/' . $this->template. '.php' ;
        if( file_exists( $file ) ){
            return $file;
        }
    }


    /**
     * Views require data
     *
     * @return array
     */
    public function data() : array
    {
        return [];
    }
}
