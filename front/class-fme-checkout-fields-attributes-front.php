<?php 
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( !class_exists( 'FME_Checkout_Fields_Attributes_Front' ) ) { 

	class FME_Checkout_Fields_Attributes_Front extends FME_Checkout_Fields_Attributes {

		public function __construct() {
			add_action( 'wp_loaded', array( $this, 'front_scripts' ) );
			$this->module_settings = $this->get_module_settings();
			add_action( 'woocommerce_after_order_notes', array($this, 'fme_additional_checkout_fields' ));
			add_action('woocommerce_checkout_process', array($this, 'fme_additional_checkout_field_process'));
			add_action('woocommerce_checkout_update_order_meta', array($this, 'fme_additional_checkout_field_update_order_meta' ));
			add_action( 'woocommerce_thankyou', array($this, 'fme_display_order_additioanl_data'), 20 );
			add_action( 'woocommerce_view_order', array($this, 'fme_display_order_additioanl_data'), 20 );
			
	       
	       add_action('wp_ajax_fme_additional_checkout_field_update_order_meta', array($this, 'fme_additional_checkout_field_update_order_meta')); 
		}

		

		public function front_scripts() {	
            
            

        	
        	wp_enqueue_script( 'jquery-ui');
        	wp_enqueue_script( 'fmecfa-front-jsssssss', plugins_url( '/js/script.js', __FILE__ ), array('jquery'), false );
        	wp_enqueue_style( 'fmecfa-front-css', plugins_url( '/css/fmecfa_style_front.css', __FILE__ ), false );
        	wp_enqueue_style( 'jquery-ui-css');
        	
        		
        }



		

		function getSelectOptions($id)
		{
			global $wpdb;
            $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->fmecfa_meta." WHERE field_id = %d", $id));      
            return $result;

		}

		function fme_additional_checkout_fields($checkout)
		{
			$add_fields = $this->getAdditionlFields();
			if($add_fields!='') {
				echo '<div class="fme_additional_checkout_field"><h3>' . esc_html__($this->module_settings['additional_title']) .'</h3>';
			}

			?>
		
			<div ><p style="
		    color: #9b9b9b;
		    cursor: auto;
		    font-family: Roboto,helvetica,arial,sans-serif;
		    font-size: 8px;
		    font-weight: 400;
		    margin-top: -125px;
		    padding-left: 235px;
		    position: absolute;
		    z-index: -1;
		">by <a style="color: #9b9b9b;" rel="nofollow" target="_Blank" href="https://www.fmeaddons.com/woocommerce-plugins-extensions/additional-checkout-fields.html">Fmeaddons</a></p>  </div>


			<?php 
			
			//print_r($add_fields);
			foreach ($add_fields as $bfield) {
				if($bfield->is_hide == 0) {

					if($bfield->field_type == 'select') {
				   		$opts = $this->getSelectOptions($bfield->field_id);
				   		foreach ($opts as $opt) {
				   			
				   			$options[$opt->meta_key] = $opt->meta_value;
				   		}
			   		}


			   		if($bfield->field_type == 'radioselect') {
				   		$opts = $this->getSelectOptions($bfield->field_id);
				   		foreach ($opts as $opt) {
				   			
				   			$options1[$opt->meta_key] = $opt->meta_value;
				   		}
			   		}


			   		if($bfield->field_type == 'radioselect') {
				   		
				   		woocommerce_form_field( $bfield->field_name, array(

					   'type' => 'radio',
					   'label'      => esc_html__($bfield->field_label, 'woocommerce'),
					   'placeholder'   => _x($bfield->field_placeholder, 'placeholder', 'woocommerce'),
					   'required'      => ($bfield->is_required == 0 ? false : true),
					   'class'         => array(($bfield->width == 'full' ? 'full' : 'half')),
					   'clear'     => false,
					   'options' => $options1,
					       ), $checkout->get_value( $bfield->field_name ));
			   		}

			   		else if($bfield->field_type == 'select') {  
				   		
				   		woocommerce_form_field( $bfield->field_name, array(

					   'type' => 'select',
					   'label'      => esc_html__($bfield->field_label, 'woocommerce'),
					   'placeholder'   => _x($bfield->field_placeholder, 'placeholder', 'woocommerce'),
					   'required'      => ($bfield->is_required == 0 ? false : true),
					   'class'         => array(($bfield->width == 'full' ? 'full' : 'half')),
					   'clear'     => false,
					   'options' => $options,
					       ), $checkout->get_value( $bfield->field_name ));
			   		} else {

						woocommerce_form_field( $bfield->field_name, array(

					   'type' => $bfield->field_type,
					   'label'      => esc_html__($bfield->field_label, 'woocommerce'),
					   'placeholder'   => _x($bfield->field_placeholder, 'placeholder', 'woocommerce'),
					   'required'      => ($bfield->is_required == 0 ? false : true),
					   'class'         => array(($bfield->width == 'full' ? 'full' : 'half')),
					   'clear'     => false,
					       ), $checkout->get_value( $bfield->field_name ));
					}
					
					}
			}
			echo "</div>";
		}


		function getAdditionlFields()
		{
			global $wpdb;
             
            $result = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM ".$wpdb->fmecfa_fields." WHERE field_type!='' AND type = %s ORDER BY length(sort_order), sort_order", 'additional'));      
            return $result;
		}

		function fme_additional_checkout_field_process()
		{ 
			foreach ($_POST as $key => $value) { 
				$er = $this->getRequired($key);
				if($er!='') {
					if ( $_POST[$key] == '' && $er->is_required == 1 ) {
	       				wc_add_notice( __( $er->field_label.' is a required field' ), 'error' );
	       			}
       			}
			}


			$add_fields = $this->getAdditionlFields();
			    foreach ($add_fields as $add_field) {
		    	$er = $this->getRequired($add_field->field_name);

		    	if($er!='') { 
			    	if(!array_key_exists($add_field->field_name, $_POST)) {
			    		if($er->is_required == 1 && $er->is_hide == 0) {
			    			wc_add_notice( __( $add_field->field_label.' is a required field' ), 'error' );
			    		}
			    	}
		    	}
		    }
		}

		function getRequired($name)
		{
			global $wpdb;

           	$result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$wpdb->fmecfa_fields." WHERE field_mode!='default' AND field_name = '%s'", $name));      
            return $result;
		}

		function getAdditional($name)
		{
			global $wpdb;

           	$result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$wpdb->fmecfa_fields." WHERE field_name = '%s'", $name));      
            return $result;
		}

		function getAdditionalBylabel($name)
		{
			global $wpdb;

           	$result = $wpdb->get_row( $wpdb->prepare( "SELECT * FROM ".$wpdb->fmecfa_fields." WHERE field_label = '%s'", $name));      
            return $result;
		}

		function fme_additional_checkout_field_update_order_meta($order_id)
		{
			
			foreach ($_POST as $key => $value) {
				$er = $this->getAdditional($key);
				if($er!='') {
					if ($er->field_mode == 'additional_additional' ) {
						if($er->field_type == 'multiselect')
						{ 	$prefix = '';
							foreach ($_POST[$key] as $value) {
								$multi .= $prefix.$value;
	    						$prefix = ', ';
							}
							
							update_post_meta( $order_id, $er->field_label, sanitize_text_field($multi) );
							
						} else {

							update_post_meta( $order_id, $er->field_label, sanitize_text_field($_POST[$key]) );
						}

						
					}
				}
					

			}
		}

		

		function fme_display_order_additioanl_data($order_id) { ?> 
		

			<h2><?php echo esc_html__($this->module_settings['additional_title']); ?></h2>
		    <table class="shop_table shop_table_responsive additional_info">
		        <tbody>
		        <?php 
		        	$add_fields = $this->getAdditionlFields();

		        	foreach ($add_fields as $add_field) {

		        	$check = get_post_meta( $order_id, $add_field->field_label, true );
		        	$label = $this->getAdditionalBylabel($add_field->field_label);
		        	if($check!='') {
		        		$value = get_post_meta( $order_id, $add_field->field_label, true )
		              ?>
		            <tr>
		                <th><?php echo esc_html__( $add_field->field_label.':' ); ?></th>
		                <td>
		                	<?php 
		                		if($label->field_type=='checkbox' && $value==1) {
		                			echo "Yes";
		                		} else if($label->field_type=='checkbox' && $value==0) {
		                			echo "No";
		                		}
		                		else {
		                			echo ($value);
		                		}
		                	?>
		                </td>
		            </tr>

		        <?php } } ?>
		            
		        </tbody>
		    </table>

		<?php }

			

				

				function fme_checkout_field_order_meta_keys($keys)
				{
					$add_fields = getAdditional();
					foreach ($add_fields as $add_field) {
						$keys[$add_field->field_label] = $add_field->field_label;
					}

					
					
				    return $keys;
				}

				



	}


	new FME_Checkout_Fields_Attributes_Front();
}

?>