<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 23/09/2019
 * Time: 10:08
 */

function ffl_options_menu_link()
{
    add_options_page(
        'Facebook Footer Link Options',
        'Facebook Footer Link',
        'manage_options',
        'ffl-options',
        'ffl_options_content'
    );
}

function ffl_options_content(){
    global $ffl_options;
    ob_start(); ?>
        <div class="wrap">
            <h2><?php _e('Facebook Footer Link Settings','ffl_domain'); ?></h2>
            <p><?php _e('Settings for the Facebook Footer Link Plugin','ffl_domain'); ?></p>
            <form method="post" action="options.php">
                <?php settings_fields('ffl_settings_group'); ?>
                <table class="form-table">
                    <tbody>
                        <tr>
                            <th scope="row"><label for="ffl_settings[enable]"><?php _e('Enable','ffl_domain'); ?></label></th>
                            <td>
                                <input name="ffl_settings[enable]" type="checkbox" id="ffl_settings[enable]" value="1" <?php checked('1',$ffl_options['enable']); ?>>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="ffl_settings[facebook_url]"><?php _e('Facebook Profile URL','ffl_domain'); ?></label></th>
                            <td>
                                <input name="ffl_settings[facebook_url]" type="text" id="ffl_settings[facebook_url]" value="<?php echo $ffl_options['facebook_url'];?>" class="regular-text ">
                                <p class="description"><?php _e('Enter your Facebook profile URL','ffl_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="ffl_settings[link_color]"><?php _e('Link Color','ffl_domain'); ?></label></th>
                            <td>
                                <input name="ffl_settings[link_color]" type="text" id="ffl_settings[link_color]" value="<?php echo $ffl_options['link_color'];?>" class="regular-text ">
                                <p class="description"><?php _e('Enter color HEX value','ffl_domain'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="ffl_settings[show_in_feed]"><?php _e('Show in posts feed','ffl_domain'); ?></label></th>
                            <td>
                                <input name="ffl_settings[show_in_feed]" type="checkbox" id="ffl_settings[show_in_feed]" value="1" <?php checked('1',$ffl_options['show_in_feed']); ?>>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="submit">
                    <input type="submit" name="Submit" id="submit" class="button-primary button" value="<?php _e('Save Changes','ffl_domain') ;?>">
                </p>
            </form>
        </div>
    <?php
    echo ob_get_clean();
}

add_action('admin_menu','ffl_options_menu_link');

function ffl_register_settings(){
    register_setting('ffl_settings_group','ffl_settings');
}

add_action('admin_init','ffl_register_settings');