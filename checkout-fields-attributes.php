<?php 

/*
 * Plugin Name:       Additional Checkout Attributes(Free)
 * Plugin URI:        https://www.fmeaddons.com/woocommerce-plugins-extensions/additional-checkout-fields.html
 * Description:       FME Checkout Fields Attributes provaide facility to manage checkout process fields on checkout page. By using this module you can gather extra valueable information from your customers.
 * Version:           1.0.1
 * Author:            FME Addons
 * Developed By:  	  Raja Usman Mehmood
 * Author URI:        http://fmeaddons.com/
 * Support URI:		  http://support.fmeaddons.com/
 * Text Domain:       checkout-fields-attributes
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Check if WooCommerce is active
 * if wooCommerce is not active FME Tabs module will not work.
 **/
if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	echo 'This plugin required woocommerce installed!';
}

if ( !class_exists( 'FME_Checkout_Fields_Attributes' ) ) { 

	class FME_Checkout_Fields_Attributes {

		public $module_settings = array();
		public $module_default_settings = array();


		function __construct() {

			$this->module_constants();
			$this->module_tables();

			if ( is_admin() ) {
				require_once( FMECFA_PLUGIN_DIR . 'admin/class-fme-checkout-fields-attributes-admin.php' );
				register_activation_hook( __FILE__, array( $this, 'install_module' ) );
				$this->module_default_settings = $this->get_module_default_settings();
				
			}

			else
			{
				require_once( FMECFA_PLUGIN_DIR . 'front/class-fme-checkout-fields-attributes-front.php' );
			}
			
		}


		public function module_constants() {
            
            if ( !defined( 'FMECFA_URL' ) )
                define( 'FMECFA_URL', plugin_dir_url( __FILE__ ) );

            if ( !defined( 'FMECFA_BASENAME' ) )
                define( 'FMECFA_BASENAME', plugin_basename( __FILE__ ) );

            if ( ! defined( 'FMECFA_PLUGIN_DIR' ) )
                define( 'FMECFA_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
        }


        public function install_module()
        {
        	$this->module_tables();
            $this->create_module_data();
        }

        private function module_tables() {
            
			global $wpdb;
		
			$wpdb->fmecfa_fields = $wpdb->prefix . 'fmecfa_fields';
			$wpdb->fmecfa_meta = $wpdb->prefix . 'fmecfa_meta';
		}

		public function create_module_data() {

			$this->set_module_default_settings();
            
            global $wpdb;   
            $this->create_tables();
            if ( $wpdb->get_var( "SHOW TABLES LIKE '.$wpdb->fmecfa_fields.'" ) == $wpdb->fmecfa_fields ) {

            $result = $wpdb->get_results( $wpdb->query( "SELECT * FROM ".$wpdb->fmecfa_fields) );      
	        count($result);   
	            if(count($result)==0) {
	            	$this->set_module_default_data();
	            }
            }
            
        }


        public function create_tables() {
            
			global $wpdb;
			
			$charset_collate = '';
		
			if ( !empty( $wpdb->charset ) )
				$charset_collate = "DEFAULT CHARACTER SET $wpdb->charset";
			if ( !empty( $wpdb->collate ) )
				$charset_collate .= " COLLATE $wpdb->collate";	
				
			if ( $wpdb->get_var( "SHOW TABLES LIKE '$wpdb->fmecfa_meta'" ) != $wpdb->fmecfa_meta ) {
				$sql1 = "CREATE TABLE " . $wpdb->fmecfa_meta . " (
									 meta_id int(25) NOT NULL auto_increment,
									 field_id varchar(255) NULL,
									 meta_key varchar(255) NULL,
									 meta_value text(255) NULL,
									 
									 PRIMARY KEY (meta_id)
									 ) $charset_collate;";
		
			
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
				dbDelta( $sql1 );
			}


			if ( $wpdb->get_var( "SHOW TABLES LIKE '$wpdb->fmecfa_fields'" ) != $wpdb->fmecfa_fields ) {
				$sql = "CREATE TABLE " . $wpdb->fmecfa_fields . " (
									 field_id int(25) NOT NULL auto_increment,
									 field_name varchar(255) NULL,
									 field_label varchar(255) NULL,
									 field_placeholder varchar(255) NULL,
									 is_required int(25) NOT NULL,
									 is_hide int(25) NOT NULL,
									 width varchar(255) NULL,
									 sort_order int(25) NOT NULL,
									 field_type varchar(255) NULL,
									 type varchar(255) NULL,
									 options text NULL,
									 value varchar(255) NULL,
									 field_mode varchar(255) NULL,
									 
									 PRIMARY KEY (field_id)
									 ) $charset_collate;";
		
			
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
				dbDelta( $sql );
			}



		}


		function set_module_default_data()
		{
			global $wpdb;

            
            
		}

		public function set_module_default_settings() {
            
			$module_settings = get_option( 'fmecfa_settings' );
			if ( !$module_settings ) {
                update_option( 'fmecfa_settings', $this->module_default_settings );
			}
		}

		public function get_module_default_settings() {
            
            $module_default_settings = array (
                'additional_title'         => __( 'Additional Information', 'fmecfa' )
                
            ); 
            
            return $module_default_settings;
		}

		public function get_module_settings() {
            
            $module_settings = get_option( 'fmecfa_settings' );

            //print_r($module_settings);

            if ( !$module_settings ) {
                update_option( 'fmecfa_settings', $this->module_default_settings );
                $module_settings = $this->module_default_settings;
            }

            return $module_settings;
        } 

       
		
		


	}

	$fmecfa = new FME_Checkout_Fields_Attributes();

}

?>
