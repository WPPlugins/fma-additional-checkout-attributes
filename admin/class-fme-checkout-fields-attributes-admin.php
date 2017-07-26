<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists( 'FME_Checkout_Fields_Attributes_Admin' ) ) { 

	class FME_Checkout_Fields_Attributes_Admin extends FME_Checkout_Fields_Attributes {


		public function __construct() {
			add_action( 'wp_loaded', array( $this, 'admin_init' ) );
			$this->module_settings = $this->get_module_settings();
			
			add_action('wp_ajax_update_additional_sortorder', array($this, 'update_additional_sortorder')); 
			add_action('wp_ajax_insert_additional_field', array($this, 'insert_additional_field')); 
			add_action('wp_ajax_del_additional_field', array($this, 'del_additional_field'));
			
			add_action('wp_ajax_save_all_data', array($this, 'save_all_data')); 
			

	       
		}

		public function admin_init() {
			add_action( 'admin_menu', array( $this, 'create_admin_menu' ) );
			add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );	
		}

		public function admin_scripts() {	
            
        	wp_enqueue_style( 'fmecfa-admin-css', plugins_url( '/css/fmecfa_style.css', __FILE__ ), false );
        	wp_enqueue_script( 'jquery-ui-draggable');
        	wp_enqueue_script( 'jquery-ui-dropable');
        	wp_enqueue_script( 'jquery-ui-sortable');
        	
        }

		public function create_admin_menu() {	
			add_menu_page('Checkout Fields Attributes', __( 'Checkout Fields Attributes', 'fmecfa' ), apply_filters( 'fmecfa_capability', 'manage_options' ), 'fme-checkout-fields-attributes', array( $this, 'fmecfa_chekout_fields_module' ) ,plugins_url( 'images/fma.jpg', dirname( __FILE__ ) ), apply_filters( 'fmecfa_menu_position', 7 ) );
			add_submenu_page( 'fme-checkout-fields-attributes', __( 'Settings', 'fmecfa' ), __( 'Settings', 'fmecfa' ), 'manage_options', 'fmecfa_settings', array( $this, 'fme_mdoule_settings' ) );	

	        register_setting( 'fmecfa_settings', 'fmecfa_settings', array( $this, 'fmecfa_settings' ) );

	    }

	    public function fme_mdoule_settings() {
			require  FMECFA_PLUGIN_DIR . 'admin/view/settings.php';
		}

		function fmecfa_chekout_fields_module()
	    {
	    	require_once( FMECFA_PLUGIN_DIR . 'admin/view/view.php' );
	    }

		public function fmecfa_settings() { 

			$def_data = $this->get_module_default_settings();

			

			if ($_POST['fmecfa_module']['additional_title'] )  {
				$output['additional_title'] = sanitize_text_field($_POST['fmecfa_module']['additional_title']);
			} else {
				$output['additional_title'] = $def_data['additional_title'];
			}

			

			return $output;

		}


	   
        public function get_additional_fields() {
            
             global $wpdb;
             
             $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->fmecfa_fields." WHERE field_type!='' AND type = %s ORDER BY length(sort_order), sort_order", 'additional'));      

             return $result;
        }

        


		function update_additional_sortorder()
		{
			global $wpdb;
			$ids = $_POST['ids'];

			
				
				$counter = 1;
				foreach ($ids as $id) {
					$did = intval($id);
					$wpdb->query($wpdb->prepare( 
				            "
				    UPDATE " .$wpdb->fmecfa_fields." SET sort_order = %d WHERE field_id = %d
				    ",
					    $counter,
					    $did
					));

					$counter = $counter + 1;	
				}	
			

		}


		


		function insert_additional_field()
		{
			global $wpdb;
			$last1 = $wpdb->get_row("SHOW TABLE STATUS LIKE '$wpdb->fmecfa_fields'");
        	$a = ($last1->Auto_increment);
        	if(isset($_POST['fieldtype']) && $_POST['fieldtype']!='') {
				$fieldtype = sanitize_text_field($_POST['fieldtype']);
			} else { $fieldtype = '';}
			if(isset($_POST['type']) && $_POST['type']!='') {
				$type = sanitize_text_field($_POST['type']);
			} else { $type = ''; }
			if(isset($_POST['label']) && $_POST['label']!='') {
				$label = sanitize_text_field($_POST['label']);
			} else { $label = ''; }
			$name = 'additional_field_'.$a;
			if(isset($_POST['mode']) && $_POST['mode']!='') {
				$mode = sanitize_text_field($_POST['mode']);
			} else { $mode = ''; }
			if($fieldtype!='' && $type!='' && $label!='') {
				$wpdb->query($wpdb->prepare( 
	            "
	            INSERT INTO $wpdb->fmecfa_fields
	            (field_name, field_label, field_type, type, field_mode)
	            VALUES (%s, %s, %s, %s, %s)
	            ",
	            $name,
	            $label, 
	            $fieldtype,
	            $type,
	            $mode
	            
	            
	            ) );
			}
			
			$last = $wpdb->get_row("SHOW TABLE STATUS LIKE '$wpdb->fmecfa_fields'");
        	echo json_encode(($last->Auto_increment)-1);
			exit();


		}


		

		function del_additional_field()
		{
			$field_id = intval($_POST['field_id']);
			global $wpdb;
			$wpdb->query( $wpdb->prepare( "DELETE FROM ".$wpdb->fmecfa_fields . " WHERE field_id = %d", $field_id ) );
			die();
			return true;
		}

		function save_all_data()
		{ 
			global $wpdb;
			if(isset($_POST['option_field_ids']) && $_POST['option_field_ids']!='') {
				$option_field_ids = $_POST['option_field_ids']; 			
			} else {$option_field_ids = array();}
			if(isset($_POST['option_value']) && $_POST['option_value']!='') {
				$option_value = $_POST['option_value'];	
			} else {$option_value = array();}
			if(isset($_POST['option_text']) && $_POST['option_text']!='') {
				$option_text = $_POST['option_text'];			
			} else { $option_text = array(); }


			if(isset($_POST['fieldids']) && $_POST['fieldids']!='') {
				$fieldids = $_POST['fieldids'];			
			} else { $fieldids = array(); }
			if(isset($_POST['fieldlabel']) && $_POST['fieldlabel']!='') {
				$fieldlabel = $_POST['fieldlabel'];			
			} else { $fieldlabel = array(); }
			if(isset($_POST['fieldplaceholder']) && $_POST['fieldplaceholder']!='') {
				$fieldplaceholder = $_POST['fieldplaceholder'];			
			} else { $fieldplaceholder = array(); }
			if(isset($_POST['fieldrequired']) && $_POST['fieldrequired']!='') {
				$fieldrequired = $_POST['fieldrequired'];			
			} else { $fieldrequired = array(); }
			if(isset($_POST['fieldhidden']) && $_POST['fieldhidden']!='') {
				$fieldhidden = $_POST['fieldhidden'];			
			} else { $fieldhidden = array(); }
			if(isset($_POST['fieldwidth']) && $_POST['fieldwidth']!='') {
				$fieldwidth = $_POST['fieldwidth'];			
			} else { $fieldwidth = array(); }

			$combined_array1 = array_map(function($a, $b, $c) { 
				return $a.'-_-'.$b.'-_-'.$c; }, 
				$option_field_ids, 
				$option_value, 
				$option_text
			);

			
			$wpdb->query("DELETE FROM ".$wpdb->fmecfa_meta );
			if($combined_array1!='') {
				foreach ($combined_array1 as $value) {

					$data = explode('-_-', $value);

				    $wpdb->query($wpdb->prepare( 
		            "
		            INSERT INTO $wpdb->fmecfa_meta
		            (field_id, meta_key, meta_value)
		            VALUES (%s, %s, %s)
		            ",
		            intval($data[0]),
		            sanitize_text_field($data[1]), 
		            sanitize_text_field($data[2])
		            
		            ) );

				} 
			}

			$combined_array = array_map(function($a, $b, $c, $d, $e, $f) { return $a.'-_-'.$b.'-_-'.$c.'-_-'.$d.'-_-'.$e.'-_-'.$f; }, $fieldids, $fieldlabel, $fieldplaceholder, $fieldrequired, $fieldhidden, $fieldwidth);
			
			if($combined_array!='') {
				foreach ($combined_array as $value) {
					
					$data = explode('-_-', $value);
					$field_id = intval($data[0]);
					$field_label = sanitize_text_field($data[1]);
					$field_placeholder = sanitize_text_field($data[2]);
					$field_required = sanitize_text_field($data[3]);
					$field_hide = sanitize_text_field($data[4]);
					$field_width = sanitize_text_field($data[5]);

					$wpdb->query($wpdb->prepare(
						"UPDATE " .$wpdb->fmecfa_fields." SET field_label = %s, field_placeholder = %s, 
						is_required = %d, is_hide = %d, width = %s WHERE field_id = %d",
					    $field_label,
					    $field_placeholder,
					    $field_required,
					    $field_hide,
					    $field_width,
					    $field_id
					));
				}
			}

			die();
			return true;
		}


		public function getOptions($id)
		{
			global $wpdb;
             
             $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->fmecfa_meta." WHERE field_id = %d", $id));      

             return $result;
		}


		




		function getSelectOptions($id)
		{
			global $wpdb;
             
            $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->fmecfa_meta." WHERE field_id = %d", $id));      
            return $result;

		}



		

		



	}


	new FME_Checkout_Fields_Attributes_Admin();
}

?>