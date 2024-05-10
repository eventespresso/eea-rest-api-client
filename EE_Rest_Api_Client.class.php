<?php

if (! defined('EVENT_ESPRESSO_VERSION')) {
exit();
}
/**
 * ------------------------------------------------------------------------
 *
 * Class  EE_Rest_Api_Client
 *
 * @package         Event Espresso
 * @subpackage      eea-rest-api-client
 * @author              Brent Christensen
 * @ version            $VID:$
 *
 * ------------------------------------------------------------------------
 */
// define the plugin directory path and URL
define('EE_REST_API_CLIENT_BASENAME', plugin_basename(EE_REST_API_CLIENT_PLUGIN_FILE));
define('EE_REST_API_CLIENT_PATH', plugin_dir_path(__FILE__));
define('EE_REST_API_CLIENT_URL', plugin_dir_url(__FILE__));
define('EE_REST_API_CLIENT_ADMIN', EE_REST_API_CLIENT_PATH . 'admin' . DS . 'rest_api_client' . DS);
class EE_Rest_Api_Client extends EE_Addon
{
    /**
     * class constructor
     */
    public function __construct()
    {
    }

    public static function register_addon()
    {
        // register addon via Plugin API
        EE_Register_Addon::register(
            'Rest_Api_Client',
            array(
                'version'                   => EE_REST_API_CLIENT_VERSION,
                'min_core_version' => '4.8.29.dev.000',
                'main_file_path'                => EE_REST_API_CLIENT_PLUGIN_FILE,
                'autoloader_paths' => array(
                    'EE_Rest_Api_Client'                        => EE_REST_API_CLIENT_PATH . 'EE_Rest_Api_Client.class.php',
                ),
                'shortcode_paths'   => array( EE_REST_API_CLIENT_PATH . 'EES_Rest_Api_Client.shortcode.php' ),
            )
        );
    }
}
// End of file EE_Rest_Api_Client.class.php
// Location: wp-content/plugins/eea-rest-api-client/EE_Rest_Api_Client.class.php
