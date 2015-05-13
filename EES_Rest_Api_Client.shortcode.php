<?php if ( ! defined( 'EVENT_ESPRESSO_VERSION' )) { exit(); }
/*
 * ------------------------------------------------------------------------
 *
 * Event Espresso
 *
 * Event Registration and Management Plugin for WordPress
 *
 * @ package			Event Espresso
 * @ author				Seth Shoultes
 * @ copyright		(c) 2008-2014 Event Espresso  All Rights Reserved.
 * @ license			http://eventespresso.com/support/terms-conditions/   * see Plugin Licensing *
 * @ link					http://www.eventespresso.com
 * @ version		 	EE4
 *
 * ------------------------------------------------------------------------
 *
 * EES_Rest_Api_Client
 *
 * @package			Event Espresso
 * @subpackage		eea-rest-api-client
 * @author 				Brent Christensen
 * @ version		 	$VID:$
 *
 * ------------------------------------------------------------------------
 */
class EES_Rest_Api_Client  extends EES_Shortcode {



	/**
	 * 	set_hooks - for hooking into EE Core, modules, etc
	 *
	 *  @access 	public
	 *  @return 	void
	 */
	public static function set_hooks() {
	}



	/**
	 * 	set_hooks_admin - for hooking into EE Admin Core, modules, etc
	 *
	 *  @access 	public
	 *  @return 	void
	 */
	public static function set_hooks_admin() {
	}



	/**
	 * 	run - initial shortcode module setup called during "wp_loaded" hook
	 * 	this method is primarily used for loading resources that will be required by the shortcode when it is actually processed
	 *
	 *  @access 	public
	 *  @param 	 WP $WP
	 *  @return 	void
	 */
	public function run( WP $WP ) {
		wp_enqueue_script( 'ae-angular', '//ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js', array( ), '', true );
		// Load custom app script
		wp_enqueue_script( 'espresso_rest_api_client', EE_REST_API_CLIENT_URL . 'scripts/espresso_rest_api_client.js', array( 'jquery' ), EE_REST_API_CLIENT_VERSION, TRUE );
		// Variables for app script
		wp_localize_script( 'espresso_rest_api_client', 'espresso_rest_api_client_data',
			array(
				'api_endpoint' => get_bloginfo( 'wpurl' ) . '/wp-json/',
			)
		);
	}



	/**
	 *    process_shortcode
	 *
	 *    [ESPRESSO_REST_API_CLIENT]
	 *
	 * @access 	public
	 * @param 	array $attributes
	 * @return 	void
	 */
	public function process_shortcode( $attributes = array() ) {
		// make sure $attributes is an array
		$attributes = array_merge(
			// defaults
			array(),
			(array)$attributes
		);
		EE_Registry::instance()->load_helper( 'Template' );
		return EEH_Template::locate_template( EE_REST_API_CLIENT_PATH . '/templates/shortcode_body.template.php', array(), true, true);
	}


}
// End of file EES_Rest_Api_Client.shortcode.php
// Location: /wp-content/plugins/eea-rest-api-client/EES_Rest_Api_Client.shortcode.php