<?php

namespace MindBlown\ProductHealth\Models\Schema;

use MindBlown\ProductHealth\Contracts\Schema;

class AddIssuesTable extends Schema {

    
	protected $table_name = 'ph_issues';


	/**
     * Check if our table exists, if not, run the schema
     *
     * @return void
     */
	public function maybe_run(): void {
		
        global $wpdb;
        $query = $wpdb->prepare( 'SHOW TABLES LIKE %s', $wpdb->esc_like( $this->table_name ) );

        if ( ! $wpdb->get_var( $query ) == $this->table_name ) {
            $this->run();
        }
	}

	/**
     * Run the query that will add our table
     *
     * @return void
     */
	public function run(): void {
        global $wpdb;
        $query = sprintf("
            CREATE TABLE `$this->table_name` (
            `id` int NOT NULL AUTO_INCREMENT,
            `product_id` int DEFAULT NULL,
            `message` varchar(255) DEFAULT NULL,
            `importance` int DEFAULT '0',
            `ignore` tinyint NOT NULL DEFAULT '0',
            `cleaned_at` datetime DEFAULT NULL,
            `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
            )");
		
        $wpdb->query( $query );
	}
}
