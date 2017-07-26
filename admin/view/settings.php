<?php if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly ?>
<div id="fmecfa-wrap" class="wrap fmecfa-settings">
    <h2><?php _e( 'Chekout Field Attribute Settings', 'fmecfa' ); ?></h2>
    <?php 
        global $wpdb;
        settings_errors();

        //print_r($this->module_settings);
    ?>

    <form id="fmecfa-settings-form" method="post" action="options.php" accept-charset="utf-8">
        <h2></h2>
        
        <div id="info">
            <div id="general" class="hide">
                <br /><br />
                <?php _e('Enter your settings below:', 'fmecfa'); ?>

                <table class="form-table">
                    <tbody>
                        

                        <tr>
                            <th scope="row">
                                <?php _e('Additional Title:','fmecfa'); ?>
                                <p class="description">(<?php _e('Main heading of the additional section.', 'fmecfa'); ?>)</p>
                            </th>
                            <td>
                                <input type="text" value="<?php echo esc_attr( $this->module_settings['additional_title'] ); ?>" name="fmecfa_module[additional_title]" placeholder="<?php _e( 'Additional Title', 'fmecfa' ); ?>" class="textinput" id="fmecfa-additional-title" />
                            </td>
                        </tr> 

                        

                    </tbody>
                </table>
            </div>
            
            <p class="submit">
                <input type="submit" value="<?php _e( 'Save Changes', 'fmecfa' ); ?>" class="button-primary" name="fmecfa-save-settings" id="fmecfa-save-settings">
            <?php settings_fields( 'fmecfa_settings' ); ?>
            </p>
        </div>
    </form>


</div>


