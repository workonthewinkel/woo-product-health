<?php

if( !function_exists( 'dd' ) ){
    function dd( $whatever ){
        echo '<pre>';
        print_r( $whatever );
        echo '</pre>';
        die();
    }
}
