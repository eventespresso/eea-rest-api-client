<?php if ( ! defined( 'EVENT_ESPRESSO_VERSION' )) { exit(); }
/**
 * ------------------------------------------------------------------------
 *
 * Class  EE_Rest_Api_Client
 *
 * @package			Event Espresso
 * @subpackage		eea-rest-api-client
 * @author			    Brent Christensen
 * @ version		 	$VID:$
 *
 * ------------------------------------------------------------------------
 */
// define the plugin directory path and URL
define( 'EE_REST_API_CLIENT_BASENAME', plugin_basename( EE_REST_API_CLIENT_PLUGIN_FILE ));
define( 'EE_REST_API_CLIENT_PATH', plugin_dir_path( __FILE__ ));
define( 'EE_REST_API_CLIENT_URL', plugin_dir_url( __FILE__ ));
define( 'EE_REST_API_CLIENT_ADMIN', EE_REST_API_CLIENT_PATH . 'admin' . DS . 'rest_api_client' . DS );
Class  EE_Rest_Api_Client extends EE_Addon {

	/**
	 * class constructor
	 */
	public function __construct() {
	}

	public static function register_addon() {
		// register addon via Plugin API
		EE_Register_Addon::register(
			'Rest_Api_Client',
			array(
				'version' 					=> EE_REST_API_CLIENT_VERSION,
				'min_core_version' => '4.6.26.dev.000',
				'main_file_path' 				=> EE_REST_API_CLIENT_PLUGIN_FILE,
				'autoloader_paths' => array(
					'EE_Rest_Api_Client' 						=> EE_REST_API_CLIENT_PATH . 'EE_Rest_Api_Client.class.php',
				),
				'shortcode_paths' 	=> array( EE_REST_API_CLIENT_PATH . 'EES_Rest_Api_Client.shortcode.php' ),
				// if plugin update engine is being used for auto-updates. not needed if PUE is not being used.
				'pue_options'			=> array(
					'pue_plugin_slug' => 'eea-rest-api-client',
					'plugin_basename' => EE_REST_API_CLIENT_BASENAME,
					'checkPeriod' => '24',
					'use_wp_update' => FALSE,
					)
			)
		);
	}



	/**
	 * 	additional_admin_hooks
	 *
	 *  @access 	public
	 *  @return 	void
	 */
	public function additional_admin_hooks() {
		// is admin and not in M-Mode ?
		if ( is_admin() && ! EE_Maintenance_Mode::instance()->level() ) {
			add_filter( 'plugin_action_links', array( $this, 'plugin_actions' ), 10, 2 );
		}
	}



	/**
	 * plugin_actions
	 *
	 * Add a settings link to the Plugins page, so people can go straight from the plugin page to the settings page.
	 * @param $links
	 * @param $file
	 * @return array
	 */
	public function plugin_actions( $links, $file ) {
		if ( $file == EE_REST_API_CLIENT_BASENAME ) {
			// before other links
			array_unshift( $links, '<a href="admin.php?page=espresso_rest_api_client">' . __('Settings') . '</a>' );
		}
		return $links;
	}






}
// End of file EE_Rest_Api_Client.class.php
// Location: wp-content/plugins/eea-rest-api-client/EE_Rest_Api_Client.class.php
