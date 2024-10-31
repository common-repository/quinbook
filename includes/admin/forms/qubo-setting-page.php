<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

global $qubo_options;

if( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] == 'true' )
{
    echo '<div class="updated" id="message" style="margin-left:0px; margin-top:20px;">
        <p><strong>' . esc_html( 'Changes Saved Successfully' ) . '</strong></p>
    </div>';
}

?>

<div class="wrap">
    <form method="post" action="options.php">
        <?php
        settings_fields( 'qubo_settings' ); 
        ?>
        <div id="qubo_settings" class="post-box-container">
            <div class="metabox-holder">
                <div class="meta-box-sortables ui-sortable">
                    <div id="settings" class="postbox">
                        <div class="handlediv" title="<?php echo esc_html( 'Quinbook' ); ?>"><br /></div>
                        <h3 class="hndle">					
							<span style="vertical-align: top;"><?php echo esc_html( 'Quinbook' ); ?></span>
						</h3>
                        <div class="inside">
                            <table class="form-table">
                                <tbody>

                                    <tr>
                                        <th scope="row">
                                            <label><strong><?php echo esc_html( 'Shop ID' ); ?></strong></label>
                                        </th>
                                        <td>
                                            <input type="text" name="qubo_options[qubo_script]" class="regular-text" value="<?php echo isset( $qubo_options['qubo_script'] ) ? esc_html( $qubo_options['qubo_script'] ) : '';?>">
                                        </td>    
                                    </tr>

                                    <tr>
                                        <td colspan="2" class="qubo_options_save_wrap">
                                            <input type="submit"  id="save" class="button-primary" name="qubo_options_save" value="<?php echo esc_html( 'Save Changes' ); ?>"/>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>