<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
require_once FMECFA_PLUGIN_DIR . 'admin/class-fme-checkout-fields-attributes-admin.php';
$manage_fields = new FME_Checkout_Fields_Attributes_Admin();

$additional_fields = $manage_fields->get_additional_fields();

?>
<div class="wrap">
	<h2><?php _e('Checkout Fields Attributes','fmecfa'); ?></h2>
	
		<ul id="info-nav">
			<li><a href="#additional-info"><span>Additional Information</span></a></li>
			<li><a href="#billing-info"><span>Billing Information</span></a></li>
			<li><a href="#shipping-info"><span>Shipping Information</span></a></li>
            
        </ul>
        <div id="info">
            


            <div id="additional-info" class="hide">
            	


            	<div class="div.widget-liquid-left">
            		<div class="form-left">
            			<h3>Form Fields</h3>
            			<div class="shop-container" id="adrag">
						    <ul>
						    	<li id="af" class="bf ui-state-default widget draggable">
								  	<div id="awt" class="widget-top">
								  		<div class="widget-title-action">
											<a href="#available-widgets" class="widget-action"></a>
										</div>
								  		<div class="widget-title ui-sortable-handle"><h4>Text<span class="in-widget-title"></span></h4></div>
								  		<input type="hidden" name="fieldtype" value="text" id="fieldtype" />
								  		<input type="hidden" name="type" value="additional" id="type" />
								  		<input type="hidden" name="label" value="Text" id="label" />
								  		<input type="hidden" name="name" value="additional_text" id="name" />
								  		<input type="hidden" name="mode" value="additional_additional" id="mode" />
								  	</div>
								  	<div id="aw" class="widget-inside win">

								  		<p><label for="label">Label:</label>
								  		<input type="text" value="" name="fieldlabel[]" class="widefat"></p>

								  		<p><label for="required">Required:</label>
								  		<input type="checkbox" value="1" name="fieldrequired[]" class="widefat"></p>

								  		<p><label for="hide">Hide:</label>
								  		<input  type="checkbox" value="1" name="fieldhide[]" class="widefat"></p>

								  		<p><label for="placeholder">Placeholder:</label>
								  		<input type="text" value="" name="fieldplaceholder[]" class="widefat"></p>

								  		<p><label for="width">Field Width:</label> 
								  			<select name="fieldwidth[]" class="widefat">
								  				<option  value="full">Full Width</option>
								  				<option  value="half">Half Width</option>
								  			</select>
								  		</p>

								  		<p id="textapp"></p>
								  		<input type="hidden" name="fieldids[]" value="" id="fieldids" />

								  		

								  	</div>
								 </li>

								 <li id="af" class="bf ui-state-default widget draggable">
								  	<div id="awt" class="widget-top">
								  		<div class="widget-title-action">
											<a href="#available-widgets" class="widget-action"></a>
										</div>
								  		<div class="widget-title ui-sortable-handle"><h4>Textarea<span class="in-widget-title"></span></h4></div>
								  		<input type="hidden" name="fieldtype" value="textarea" id="fieldtype" />
								  		<input type="hidden" name="type" value="additional" id="type" />
								  		<input type="hidden" name="label" value="Textarea" id="label" />
								  		<input type="hidden" name="name" value="additional_textarea" id="name" />
								  		<input type="hidden" name="mode" value="additional_additional" id="mode" />
								  	</div>
								  	<div id="aw" class="widget-inside win">

								  		<p><label for="label">Label:</label>
								  		<input type="text" value="" name="fieldlabel[]" class="widefat"></p>

								  		<p><label for="required">Required:</label>
								  		<input type="checkbox" value="1" name="fieldrequired[]" class="widefat"></p>

								  		<p><label for="hide">Hide:</label>
								  		<input  type="checkbox" value="1" name="fieldhide[]" class="widefat"></p>

								  		<p><label for="placeholder">Placeholder:</label>
								  		<input type="text" value="" name="fieldplaceholder[]" class="widefat"></p>

								  		<p><label for="width">Field Width:</label> 
								  			<select name="fieldwidth[]" class="widefat">
								  				<option  value="full">Full Width</option>
								  				<option  value="half">Half Width</option>
								  			</select>
								  		</p>

								  		<p id="textapp"></p>
								  		<input type="hidden" name="fieldids[]" value="" id="fieldids" />

								  		

								  	</div>
								 </li>


								 <li id="af" class="bf ui-state-default widget draggable">
								  	<div id="awt" class="widget-top">
								  		<div class="widget-title-action">
											<a href="#available-widgets" class="widget-action"></a>
										</div>
								  		<div class="widget-title ui-sortable-handle"><h4>Select Box<span class="in-widget-title"></span></h4></div>
								  		<input type="hidden" name="fieldtype" value="select" id="fieldtype" />
								  		<input type="hidden" name="type" value="additional" id="type" />
								  		<input type="hidden" name="label" value="Select Box" id="label" />
								  		<input type="hidden" name="name" value="additional_select" id="name" />
								  		<input type="hidden" name="mode" value="additional_additional" id="mode" />
								  	</div>
								  	<div id="aw" class="widget-inside win">

								  		<p><label for="label">Label:</label>
								  		<input type="text" value="" name="fieldlabel[]" class="widefat"></p>

								  		<p><label for="required">Required:</label>
								  		<input type="checkbox" value="1" name="fieldrequired[]" class="widefat"></p>

								  		<p><label for="hide">Hide:</label>
								  		<input  type="checkbox" value="1" name="fieldhide[]" class="widefat"></p>

								  		<p>
								  		<label for="options">Options:</label>

								  		<div class="field_wrapper">
											<div>
										    	<input class="opval" placeholder="Option Value" type="text" name="option_value[]" value=""/>
										    	<input class="opval" placeholder="Option Text" type="text" name="option_text[]" value=""/>
										    	<input id="option_field_ids" class="opval" placeholder="" type="hidden" name="option_field_ids[]" value=""/>
										        <a href="javascript:void(0);"  title="Add Option">
										        <img onClick="" class="add_button" src="<?php echo FMECFA_URL; ?>images/add-icon.png"/></a>
										    </div>
										</div>

								  		
								  		</p>

								  		<p><label for="width">Field Width:</label> 
								  			<select name="fieldwidth[]" class="widefat">
								  				<option  value="full">Full Width</option>
								  				<option  value="half">Half Width</option>
								  			</select>
								  		</p>

								  		<p id="textapp"></p>
								  		<input type="hidden" value="" name="fieldplaceholder[]" class="widefat"></p>
								  		<input type="hidden" name="fieldids[]" value="" id="fieldids" />

								  		

								  	</div>
								 </li>


								 <li id="af" class="bf ui-state-default widget">
								  	
								  	<div><h4 style="width:50%; float: left;">Multi Select Box<span class="in-widget-title"></span></h4>
									 <span style="width:35%; float: right; margin-top:16px; font-weight: bold; text-decoration: none;">
									 	<a href="https://www.fmeaddons.com/woocommerce-plugins-extensions/additional-checkout-fields.html" target="_blank">Upgrade to Premium</a>
									 </span>
								  	</div>
								 </li>

								 <li id="af" class="bf ui-state-default widget draggable">
								  	<div id="awt" class="widget-top">
								  		<div class="widget-title-action">
											<a href="#available-widgets" class="widget-action"></a>
										</div>
								  		<div class="widget-title ui-sortable-handle"><h4>Checkbox<span class="in-widget-title"></span></h4></div>
								  		<input type="hidden" name="fieldtype" value="checkbox" id="fieldtype" />
								  		<input type="hidden" name="type" value="additional" id="type" />
								  		<input type="hidden" name="label" value="Checkbox" id="label" />
								  		<input type="hidden" name="name" value="additional_checkbox" id="name" />
								  		<input type="hidden" name="mode" value="additional_additional" id="mode" />
								  	</div>
								  	<div id="aw" class="widget-inside win">

								  		<p><label for="label">Label:</label>
								  		<input type="text" value="" name="fieldlabel[]" class="widefat"></p>

								  		<p><label for="required">Required:</label>
								  		<input type="checkbox" value="1" name="fieldrequired[]" class="widefat"></p>

								  		<p><label for="hide">Hide:</label>
								  		<input  type="checkbox" value="1" name="fieldhide[]" class="widefat"></p>


								  		<p><label for="width">Field Width:</label> 
								  			<select name="fieldwidth[]" class="widefat">
								  				<option  value="full">Full Width</option>
								  				<option  value="half">Half Width</option>
								  			</select>
								  		</p>

								  		<p id="textapp"></p>
								  		<input type="hidden" value="" name="fieldplaceholder[]" class="widefat"></p>
								  		<input type="hidden" name="fieldids[]" value="" id="fieldids" />

								  		

								  	</div>
								 </li>


								 <li id="af" class="bf ui-state-default widget draggable">
								  	<div id="awt" class="widget-top">
								  		<div class="widget-title-action">
											<a href="#available-widgets" class="widget-action"></a>
										</div>
								  		<div class="widget-title ui-sortable-handle"><h4>Radio Select<span class="in-widget-title"></span></h4></div>
								  		<input type="hidden" name="fieldtype" value="radioselect" id="fieldtype" />
								  		<input type="hidden" name="type" value="additional" id="type" />
								  		<input type="hidden" name="label" value="Radio Select" id="label" />
								  		<input type="hidden" name="name" value="additional_radio_select" id="name" />
								  		<input type="hidden" name="mode" value="additional_additional" id="mode" />
								  	</div>
								  	<div id="aw" class="widget-inside win">

								  		<p><label for="label">Label:</label>
								  		<input type="text" value="" name="fieldlabel[]" class="widefat"></p>

								  		<p><label for="required">Required:</label>
								  		<input type="checkbox" value="1" name="fieldrequired[]" class="widefat"></p>

								  		<p><label for="hide">Hide:</label>
								  		<input  type="checkbox" value="1" name="fieldhide[]" class="widefat"></p>

								  		<p>
							  				<label for="options">Options:</label>
							  				<div class="field_wrapper">
												<div style="width:100%; float:left">
								  					<input class="opval" placeholder="Option Value" type="text" name="option_value[]" value=""/>
											    	<input class="opval" placeholder="Option Text" type="text" name="option_text[]" value=""/>
											    	<input id="option_field_ids" class="opval" placeholder="" type="hidden" name="option_field_ids[]" value=""/>
								  				</div>
								  				<div style="width:100%; float:left">
								  					<input class="opval" placeholder="Option Value" type="text" name="option_value[]" value=""/>
											    	<input class="opval" placeholder="Option Text" type="text" name="option_text[]" value=""/>
											    	<input id="option_field_ids" class="opval" placeholder="" type="hidden" name="option_field_ids[]" value=""/>
								  				</div>

							  				</div>
							  			</p>


								  		<p><label for="width">Field Width:</label> 
								  			<select name="fieldwidth[]" class="widefat">
								  				<option  value="full">Full Width</option>
								  				<option  value="half">Half Width</option>
								  			</select>
								  		</p>

								  		<p id="textapp"></p>
								  		<input type="hidden" value="" name="fieldplaceholder[]" class="widefat"></p>
								  		<input type="hidden" name="fieldids[]" value="" id="fieldids" />

								  		

								  	</div>
								 </li>


								 <li id="af" class="bf ui-state-default widget">
								  	<div><h4 style="width:50%; float: left">Date Picker<span class="in-widget-title"></span></h4>
									 <span style="width:35%; float: right; margin-top:16px; font-weight: bold; color: mediumvioletred;">
									 	<a href="https://www.fmeaddons.com/woocommerce-plugins-extensions/additional-checkout-fields.html" target="_blank">Upgrade to Premium</a>
									 </span>
								  	</div>
								 </li>


								 <li id="af" class="bf ui-state-default widget">
								  	<div><h4 style="width:50%; float: left">Time Picker<span class="in-widget-title"></span></h4>
									 <span style="width:35%; float: right; margin-top:16px; font-weight: bold; color: mediumvioletred;">
									 	<a href="https://www.fmeaddons.com/woocommerce-plugins-extensions/additional-checkout-fields.html" target="_blank">Upgrade to Premium</a>
									 </span>
								  	</div>
								 </li>


								 <li id="af" class="bf ui-state-default widget">
								  	<div><h4 style="width:50%; float: left">Password<span class="in-widget-title"></span></h4>
									 <span style="width:35%; float: right; margin-top:16px; font-weight: bold; color: mediumvioletred;">
									 	<a href="https://www.fmeaddons.com/woocommerce-plugins-extensions/additional-checkout-fields.html" target="_blank">Upgrade to Premium</a>
									 </span>
								  	</div>
								 </li>


								 

						    </ul>

						</div>


            		</div>

            		<div class="form-right">
            			<h3>Additional Form Fields</h3>
            			<div id="afields">
            				<form method="post" action="" id="asavefields" accept-charset="utf-8">
	            			<ul id="asortable" class="sortable">
	            				<?php foreach ($additional_fields as $additional_field) { ?>
							  	
							  <li id="<?php echo $additional_field->field_id; ?>" class="ui-state-default widget">
							  	<div id="awt<?php echo $additional_field->field_id; ?>" class="widget-top">
							  		<div class="widget-title-action">
										<a href="#available-widgets" class="widget-action"></a>
									</div>
							  		<div class="widget-title ui-sortable-handle"><h4><?php echo $additional_field->field_label; ?><span class="in-widget-title"></span></h4></div>
							  	</div>
							  	<div id="aw<?php echo $additional_field->field_id; ?>" class="widget-inside win">

							  		<p><label for="label">Label:</label>
							  		<input type="text" value="<?php echo $additional_field->field_label; ?>" name="fieldlabel[]" class="widefat"></p>

							  		<p><label for="required">Required:</label>
							  		<input <?php checked($additional_field->is_required,1); ?> type="checkbox" value="1" name="fieldrequired[]" class="widefat"></p>

							  		<p><label for="hide">Hide:</label>
							  		<input <?php checked($additional_field->is_hide,1); ?> type="checkbox" value="1" name="fieldhidden[]" class="widefat"></p>

							  		<?php if(($additional_field->field_type == 'select') && ($additional_field->field_mode == 'additional_additional')) { ?>
							  		
							  			<p>
								  		<label for="options">Options:</label>
								  		<div class="field_wrapper">
											<div style="width:100%; float:left">

										        <a href="javascript:void(0);"  title="Add Option">
										        <img style="float:right; clear:both" onClick="getdata('<?php echo $additional_field->field_id; ?>')" id="<?php echo $additional_field->field_id; ?>" class="add_button" src="<?php echo FMECFA_URL; ?>images/add-icon.png"/></a>
										    </div>

												<?php 
													$options = $manage_fields->getOptions($additional_field->field_id);
													$a = 1;
													foreach ($options as $option) {
														

												?>
										  		 <div style="width:100%; float:left" id="b<?php echo $a; ?>">
										    	<input class="opval" placeholder="Option Value" type="text" name="option_value[]" value="<?php echo $option->meta_key; ?>"/>
										    	<input class="opval" placeholder="Option Text" type="text" name="option_text[]" value="<?php echo $option->meta_value; ?>"/>
										    	<input id="option_field_ids" class="opval" placeholder="" type="hidden" name="option_field_ids[]" value="<?php echo $additional_field->field_id; ?>"/>
										        <a href="javascript:void(0);" class="remove_bt"  title="Remove Option">
										        <img onClick="deldata('b<?php echo $a; ?>')"  class="remove_button" src="<?php echo FMECFA_URL; ?>images/remove-icon.png"/></a>
										        </div>
										        <?php $a++;  } ?>
										    
										</div>
								  		</p>
								  		<input type="hidden" value="" name="fieldplaceholder[]" class="widefat"></p>

							  		<?php } else if($additional_field->field_type == 'radioselect' && $additional_field->field_mode == 'additional_additional') { ?>

							  			<p>
							  				<label for="options">Options:</label>
							  				<div class="field_wrapper">
							  					<?php 
													$options = $manage_fields->getOptions($additional_field->field_id);
													$a = 1;
													foreach ($options as $option) {
														

												?>
												<div style="width:100%; float:left">
								  					<input class="opval" placeholder="Option Value" type="text" name="option_value[]" value="<?php echo $option->meta_key; ?>"/>
											    	<input class="opval" placeholder="Option Text" type="text" name="option_text[]" value="<?php echo $option->meta_value; ?>"/>
											    	<input id="option_field_ids" class="opval" placeholder="" type="hidden" name="option_field_ids[]" value="<?php echo $additional_field->field_id; ?>"/>
								  				</div>
								  				<?php } ?>
								  				
							  				</div>
							  			</p>

							  		<?php } else { ?>

							  			<p><label for="placeholder">Placeholder:</label>
							  			<input type="text" value="<?php echo $additional_field->field_placeholder; ?>" name="fieldplaceholder[]" class="widefat"></p>

							  		<?php } ?>


							  		<p><label for="width">Field Width:</label> 
							  			<select name="fieldwidth[]" class="widefat">
							  				<option <?php selected($additional_field->width,'full'); ?> value="full">Full Width</option>
							  				<option <?php selected($additional_field->width,'half'); ?> value="half">Half Width</option>
							  			</select>
							  		</p>


							  		<p>
							  			<?php if($additional_field->field_mode == 'additional_additional') { ?>
							  			<a onClick="deleteAdditionalDiv('<?php echo $additional_field->field_id; ?>','<?php echo $additional_field->field_label; ?>')" class="widget-control-remove" href="javascript:void(0)">Delete</a>
											|
										<?php } ?>
										<a onClick="closeAdditionalDiv('<?php echo $additional_field->field_id; ?>')" class="widget-control-close" href="javascript:void(0)">Close</a>
							  		</p>

							  		<input type="hidden" value="<?php echo $additional_field->field_id; ?>" name="fieldids[]" class="widefat"></p>
							  		

							  	</div>
							  </li>
							  <?php } ?>
	            			</ul>
	            			</form>
            			</div>
            			
            		</div>

            	</div>

            	<div class="savebt">
					<input type="button" onClick="savedata()" value="Save Changes" class="button button-primary widget-control-save right" id="widget-archives-2-savewidget" name="savewidget">			<span class="spinner"></span>
				</div>


            </div>
            <!-- End Additional-->

            


			<div id="billing-info" class="hide">
            	
	            <div class="upgrade_block">
					 <div class="inner_top_container">
					 <div class="logo">
					   <img src="<?php echo  FMECFA_URL ?>/images/fme-addons.png" alt="">
					 </div>
					<h2>Upgrade to <span>Premium</span></h2>
					<p>To get access to enhanced customization, improved experience and the ability to manage your tasks better, upgrade to the premium version now.</p>
					</div>
					<div class="buttonss"><a <a href="https://www.fmeaddons.com/woocommerce-plugins-extensions/additional-checkout-fields.html" target="_blank">Upgrade</a></div>
				</div>

            </div>

            <!-- End Billing -->
            
            <div id="shipping-info" class="hide">
            	
				<div class="upgrade_block">
					 <div class="inner_top_container">
					 <div class="logo">
					   <img src="<?php echo  FMECFA_URL ?>/images/fme-addons.png" alt="">
					 </div>
					<h2>Upgrade to <span>Premium</span></h2>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper.</p>
					</div>
					<div class="buttonss"><a <a href="https://www.fmeaddons.com/woocommerce-plugins-extensions/additional-checkout-fields.html" target="_blank">Upgrade</a></div>
				</div>
	

            </div>
            <!-- End Shipping -->


        </div>

        

	
</div>

<script type="text/javascript">
	jQuery(document).ready(function($){
	  $( '#info #shipping-info' ).hide();
	  $( '#info #billing-info' ).hide();
	  
	  $('#info-nav li').click(function(e) {
	    $('#info .hide').hide();
	    $('#info-nav .current').removeClass("current");
	    $(this).addClass('current');
	    
	    var clicked = $(this).find('a:first').attr('href');
	    $('#info ' + clicked).fadeIn('fast');
	    e.preventDefault();
	  }).eq(0).addClass('current');
	});
</script>


 <script>



jQuery(document).ready(function($){
        

			$( "#asortable" ).sortable({ revert: true, update: function( event, ui ) {


			var ajaxurl = "<?php echo admin_url( 'admin-ajax.php'); ?>";
			var order = $(this).sortable('toArray');
			jQuery.ajax({
			type: 'POST',   // Adding Post method
			url: ajaxurl, // Including ajax file
			data: {"action": "update_additional_sortorder","ids":order}, // Sending data dname to post_word_count function.
			success: function(data){ 

			}
			});                                                            

			}                                

			});

			

        $( "#adrag .draggable" ).draggable({ 
            connectToSortable: "#asortable",
            helper: "clone",
            revert: "invalid",

            

            stop: function(event, ui) { 
            	$("#asortable .draggable").attr( "style", "" );
            	$("#asortable .draggable").attr( "id", "anewfield" );

            	$('#anewfield #af').removeClass('ui-state-default widget').addClass('ui-state-default widget open');
			    $("#anewfield  #aw").slideDown('slow');
            	$('#anewfield #awt').toggle(function(){
			       $('#anewfield #af').removeClass('ui-state-default widget').addClass('ui-state-default widget open');
			       $("#anewfield  #aw").slideDown('slow');
			   },function(){
			   	$('#anewfield  #af').removeClass('ui-state-default widget open').addClass('ui-state-default widget');
			       $("#anewfield  #aw").slideUp('slow');
			   });

            	var ajaxurl = "<?php echo admin_url( 'admin-ajax.php'); ?>";
				var fieldtype = $("#anewfield #fieldtype").val();
				var type = $("#anewfield #type").val();
				var label = $("#anewfield #label").val();
				var name = $("#anewfield #name").val();
				var mode = $("#anewfield #mode").val();
				jQuery.ajax({
				type: 'POST',   // Adding Post method
				url: ajaxurl, // Including ajax file
				data: {"action": "insert_additional_field","fieldtype":fieldtype,"type":type,"label":label,"name":name,"mode":mode}, // Sending data dname to post_word_count function.
				dataType: 'json',
				success: function(data) {

					if($("#asortable .draggable").attr( "id" ) == 'anewfield') {
						$('#asortable #anewfield').attr( 'id', data );
					}
					$('#asortable #'+data).attr('class', '');
					$('#asortable #'+data).attr('class', 'ui-state-default widget ui-sortable-handle');
					$('#asortable #'+data+' #textapp').html('');
					$('#asortable #'+data+' #textapp').append("<a onClick='deleteAdditionalDiv("+data+","+data+")' class='widget-control-remove' href='javascript:void(0)'>Delete</a> | <a onClick='closeBillingDiv("+data+")' class='widget-control-close' href='javascript:void(0)'>Close</a>");
					$('#asortable #'+data+' #awt').attr('id','awt'+data);
					$('#asortable #'+data+' #aw').attr('id','aw'+data);
					$('#asortable #'+data+' img').attr('id','ai'+data);
					$('#asortable #'+data+' img').attr('onClick','getdata('+data+')');
					$('#asortable #'+data+' #option_field_ids').val(data);
					$('#asortable #'+data+' #fieldids').val(data);


					$('#awt'+data).toggle(function(){ 
				       $('#'+data).removeClass('ui-state-default widget').addClass('ui-state-default widget open');
				       $("#aw"+data).slideDown('slow');
				       
				   },function(){
				   	$('#'+data).removeClass('ui-state-default widget open').addClass('ui-state-default widget');
				       $("#aw"+data).slideUp('slow');
				   });




				}
				});


		    }

        });
       

        

        
    });


jQuery(document).ready(function($){ 
  	<?php foreach ($additional_fields as $additional_field) { ?>
   $('#awt<?php echo $additional_field->field_id; ?>').toggle(function(){ 
       $('#<?php echo $additional_field->field_id; ?>').removeClass('ui-state-default widget').addClass('ui-state-default widget open');
       $("#aw<?php echo $additional_field->field_id; ?>").slideDown('slow');
       
   },function(){
   	$('#<?php echo $additional_field->field_id; ?>').removeClass('ui-state-default widget open').addClass('ui-state-default widget');
       $("#aw<?php echo $additional_field->field_id; ?>").slideUp('slow');
   });

   <?php } ?>

   
    
});

function deleteAdditionalDiv(field_id,field_label) { 
	var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';
	if(confirm("Are you sure to delete "+field_label+" field?"))
		{
			jQuery.ajax({
			type: "POST",
			url: ajaxurl,
			data: {"action": "del_additional_field", "field_id":field_id},
			success: function() {

				jQuery("#"+field_id).fadeOut('slow');
				jQuery("#"+field_id).remove();

			}
			});

		}
	return false;
}

function closeAdditionalDiv(field_id) { 

	jQuery('#'+field_id).removeClass('ui-state-default widget open').addClass('ui-state-default widget');
    jQuery("#aw"+field_id).slideUp('slow');
}
//End Additional






function savedata() { 
jQuery('#asavefields').find(':checkbox:not(:checked)').attr('value', '0').prop('checked', true);
var data2 = jQuery('#asavefields').serialize();
var ajaxurl = '<?php echo admin_url( 'admin-ajax.php'); ?>';

jQuery.ajax({
    type: 'POST',
    url: ajaxurl,
    data: data2 + '&action=save_all_data',
    success: function() {
        window.location.reload(true);

    }
});
}
</script>

<script type="text/javascript">
function getdata(id) {
	var maxField = 10000; //Input fields increment limitation
	
	
	var x = 1; //Initial field counter is 1
	 //Once add button is clicked
		//var id = this.id; alert(id);
		var wrapper = jQuery('#'+id+' .field_wrapper'); //Input field wrapper
		var fieldHTML = '<div><input class="opval" placeholder="Option Value" type="text" name="option_value[]" value=""/><input class="opval opval2" placeholder="Option Text" type="text" name="option_text[]" value=""/><a href="javascript:void(0);" class="remove_bt"  title="Remove Option"><input class="opval" placeholder="" type="hidden" name="option_field_ids[]" value="'+id+'"/><img class="remove_button" src="<?php echo FMECFA_URL; ?>images/remove-icon.png"/></a></div>'; //New input field html 
		if(x < maxField){ //Check maximum number of input fields
			x++; //Increment field counter
			jQuery(wrapper).append(fieldHTML); // Add field html
		}
		jQuery(wrapper).on('click', '.remove_bt', function(e){ //Once remove button is clicked
		e.preventDefault();
		jQuery(this).parent('div').remove(); //Remove field html
		x--; //Decrement field counter
	});
		

}


function deldata(id) {
	
	jQuery("#"+id).remove();	

}
</script>



