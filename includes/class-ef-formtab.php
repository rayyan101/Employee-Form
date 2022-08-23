<?php
/**
 * Employee Form in Setting Tab
 *
 * @package Employee-Form
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! class_exists( 'EF_Employee_tab' ) ) {
	/**
	 * Class EF_Employee_tab
	 */
	class EF_Employee_tab {

		/**
		 * constructore
		 */
		public function __construct() { 
			$this->data_inseting_in_employee_table();
			$this->delete_employee();
			$this->update_employee();
			$this->data_updating_in_employee_table();
			add_action("admin_menu", array( $this, "ef_register_employee_form_tab"));
		}
		
		/**
		 * Creating Employee form submanu Page in Wordpress setting.
		 */
		function ef_register_employee_form_tab() {
		add_submenu_page(
				'options-general.php',
				'Employee Forms ',
				'Employee Form',
				'administrator',
				'ef-employee-form',
				array($this, 'employee_form_tab_details'), null );
		}

		/**
		 * Including template.
		 */
		function employee_form_tab_details() { 

			global $wpdb;    
			$table_name = $wpdb->prefix . 'employee';
			$results = $wpdb->get_results( "SELECT * FROM $table_name");

			include_once dirname( __DIR__ ).'/templates/employee-form.php';
			include_once dirname( __DIR__ ).'/templates/employee-data.php';
		}

		/**
		 * Inserting employee details in database
		 */
		function data_inseting_in_employee_table() {

			global $wpdb;
			$employees = $wpdb->prefix . 'employee';
		
		
			if ( isset( $_POST['employee_submit'] ) ){  
				$fname = $_POST['fname'];
				$lastname = $_POST['lastname'];
				$email = $_POST['email'];
				$image = $_FILES['image'];

				$jdate = $_POST['jdate'];
				$mobile = $_POST['mobile'];
				$designation = $_POST['designation'];
				$gender = $_POST['gender'];
				$check = $_POST['mode'];
				$skill =  $_POST['rangeInput']; 

				//For Image
				require_once( ABSPATH . '/wp-includes/pluggable.php' );
				require_once( ABSPATH . 'wp-admin/includes/file.php' );

				$upload = wp_handle_upload(
				$image,
				array( 'test_form' => false )
				);

				if( ! empty( $upload[ 'error' ] ) ) {
				wp_die( $upload[ 'error' ] );
				}

				// it is time to add our uploaded image into WordPress media library
				$attachment_id = wp_insert_attachment(
				array(
				'guid' => $upload[ 'url' ],
				'post_mime_type' => $upload[ 'type' ],
				'post_title' => basename( $upload[ 'file' ] ),
				'post_content' => '',
				'post_status' => 'inherit',
				),
				$upload[ 'file' ]
				);

				$profile = $upload[ 'url' ];

				if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
				wp_die( 'Upload error.' );
				}

				// update medatata, regenerate image sizes
				require_once( ABSPATH . 'wp-admin/includes/image.php' );

				wp_update_attachment_metadata(
				$attachment_id,
				wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
				);

				$wpdb->insert(
					$employees, array(
						'fname' 		=> $fname,
						'lname' 		=> $lastname,
						'email' 		=> $email,
						'img' 			=> $profile,
						'joining_date' 	=> $jdate,
						'phone_no' 		=> $mobile,
						'desgination' 	=> $designation,
						'gender' 		=> $gender,
						'checking' 		=> $check,
						'skill' 		=> $skill,
					)
				);
			}
		}

		/**
		 * Deleting employee details in database
		 */
		function delete_employee() {

			global $wpdb;
			if ( isset( $_POST['employee_delete'] ) ){    
				$table_name = $wpdb->prefix . 'employee';
				$hid = $_POST['emp_id'];
				$wpdb->delete( 
					$table_name, 
					array( 
						'id' => $hid
					) 
				);
			}
		}

		/**
		 * Retrive employee details from database for updating.
		 */
		function update_employee() {
			
			global $wpdb;
			if ( isset( $_POST['employee_update'] ) ){   
				$table_name = $wpdb->prefix . 'employee';
				$dlt = $_POST['emp_id2'];
				$res = $wpdb->get_results( "SELECT id, fname, lname, email, img, joining_date, phone_no, desgination, gender, checking, skill FROM $table_name where id = $dlt");
			include_once dirname( __DIR__ ).'/templates/employee-form.php';
			}
		}

		/**
		 * Updating employee details in database
		 */
		function data_updating_in_employee_table() { 

			global $wpdb;
			if ( isset( $_POST['employee_update_data'] ) ){    
				$table_name = $wpdb->prefix . 'employee';
				$id = $_POST['emp_id3'];
				$fname = $_POST['fname'];
				$lastname = $_POST['lastname'];
				$email = $_POST['email'];
				$image = $_FILES['image'];

				$jdate = $_POST['jdate'];
				$mobile = $_POST['mobile'];
				$designation = $_POST['designation'];
				$gender = $_POST['gender'];
				$check = $_POST['mode'];
				$skill = $_POST['rangeInput'];
		
				
				require_once( ABSPATH . '/wp-includes/pluggable.php' );
				require_once( ABSPATH . 'wp-admin/includes/file.php' );

				$upload = wp_handle_upload(
				$image,
				array( 'test_form' => false )
				);

				if( ! empty( $upload[ 'error' ] ) ) {
				wp_die( $upload[ 'error' ] );
				}

				// it is time to add our uploaded image into WordPress media library
				$attachment_id = wp_insert_attachment(
				array(
				'guid' => $upload[ 'url' ],
				'post_mime_type' => $upload[ 'type' ],
				'post_title' => basename( $upload[ 'file' ] ),
				'post_content' => '',
				'post_status' => 'inherit',
				),
				$upload[ 'file' ]
				);

				$profile = $upload[ 'url' ];

				if( is_wp_error( $attachment_id ) || ! $attachment_id ) {
				wp_die( 'Upload error.' );
				}

				// update medatata, regenerate image sizes
				require_once( ABSPATH . 'wp-admin/includes/image.php' );

				wp_update_attachment_metadata(
				$attachment_id,
				wp_generate_attachment_metadata( $attachment_id, $upload[ 'file' ] )
				);




				$wpdb->update(
					$table_name, 
					array(


						'fname' 		=> $fname,
						'lname' 		=> $lastname,
						'email' 		=> $email,
						'img' 			=> $profile,
						'joining_date' 	=> $jdate,
						'phone_no' 		=> $mobile,
						'desgination' 	=> $designation,
						'gender' 		=> $gender,
						'checking' 		=> $profile,
						'checking' 		=> $check,
						'skill' 		=> $skill,), 
						array('id'=>$id));
			}
		}

	}
}
new EF_Employee_tab();
