<?php

namespace MindBlown\ProductHealth\Contracts;

class Schema{

    /**
     * Constructor
     */
    public function __construct()
    {
        global $wpdb;
        $this->table_name = $wpdb->prefix . $this->table_name;
    }
}
