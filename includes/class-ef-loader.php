<?php
	/**
	 * Main Loader File.
	 *
	 * @package Employee-Form
	 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'EF_Loader' ) ) {

	/**
	 * Class EF_Loader
	 */
	class EF_Loader {

		/**
		 * Constructor.
		 */
		public function __construct() { 
			$this->includes();
			$this->Creating_employee_table();
			add_action( 'admin_enqueue_scripts', array( $this, 'EF_enqueue_scripts' ) );
		}

		/**
		 * Function for Enqueue Scripts and Style.
		 */
		public function EF_enqueue_scripts() {
			wp_enqueue_script( 'EF_script_js', plugin_dir_url( __DIR__ ) . '/assets/js/employee_pdf_script.js', array( 'jquery' ), wp_rand() );
			wp_localize_script( 'EF_script_js', 'ajax_object', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
			wp_enqueue_style( 'EF_plugin_style', plugin_dir_url( __DIR__ ) . '/assets/css/style.css', array(), '1.0' );
		}		

		/**
		 * Function for Creating Employee Table in Databse.
		 */
		function Creating_employee_table() {
			global $wpdb;
			$table_name = $wpdb->prefix . "employee";
			$charset_collate = $wpdb->get_charset_collate();
	
			$sql = "CREATE TABLE IF NOT EXISTS $table_name (
			  id int(20) NOT NULL AUTO_INCREMENT,
			  fname varchar(50) NOT NULL,
			  lname varchar(50) NOT NULL,
			  email varchar(50) NOT NULL,
			  img varchar(350) NOT NULL,
			  joining_date DATE NOT NULL,
			  phone_no BIGINT NOT NULL,
			  desgination varchar(150) NOT NULL,
			  gender varchar(50) NOT NULL,
			  checking varchar(20) NOT NULL,
			  skill int(100) NOT NULL,
			  PRIMARY KEY id (id)
			) $charset_collate;";
			require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
			dbDelta($sql);
		}    
		

		/**
		 * Function for Including Files and Classes.
		 */
		public function includes() {
			include_once 'class-ef-formtab.php';
	
		}

	}
}
new EF_Loader();

