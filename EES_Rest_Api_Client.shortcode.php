<?php

if (! defined('EVENT_ESPRESSO_VERSION')) {
    exit();
}

/*
 * EES_Rest_Api_Client
 *
 * @package			Event Espresso
 * @subpackage		eea-rest-api-client
 * @author 		Mike Nelson
 */

class EES_Rest_Api_Client extends EES_Shortcode
{
    /**
     *    set_hooks - for hooking into EE Core, modules, etc
     *
     * @access    public
     * @return    void
     */
    public static function set_hooks()
    {
    }


    /**
     *    set_hooks_admin - for hooking into EE Admin Core, modules, etc
     *
     * @access    public
     * @return    void
     */
    public static function set_hooks_admin()
    {
    }


    /**
     *    run - initial shortcode module setup called during "wp_loaded" hook
     *    this method is primarily used for loading resources that will be required by the shortcode when it is
     *    actually processed
     *
     * @access    public
     * @param WP $WP
     * @return    void
     */
    public function run(WP $WP)
    {
        wp_enqueue_script(
            'ae-angular',
            '//ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js',
            [],
            '',
            true
        );
        // Load custom app script
        wp_enqueue_script(
            'espresso_rest_api_client',
            EE_REST_API_CLIENT_URL . 'scripts/espresso_rest_api_client.js',
            ['jquery'],
            EE_REST_API_CLIENT_VERSION,
            true
        );
        // Variables for app script
        wp_localize_script(
            'espresso_rest_api_client',
            'espresso_rest_api_client_data',
            [
                'api_endpoint' => get_bloginfo('wpurl') . '/wp-json/',
            ]
        );
    }


    /**
     * [ESPRESSO_REST_API_CLIENT]
     *
     * @param array|string $attributes
     * @return string
     */
    public function process_shortcode($attributes = []): string
    {
        return EEH_Template::locate_template(
            EE_REST_API_CLIENT_PATH . '/templates/shortcode_body.template.php',
            []
        );
    }
}
