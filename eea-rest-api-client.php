<?php
/*
  Plugin Name: Event Espresso - Rest Api Client (EE4.6.25)
  Plugin URI: http://www.eventespresso.com
  Description: The Event Espresso Rest Api Client adds a shortcode that uses the EE4 JSON REST API. Compatible with Event Espresso 4.6.25 or higher. Just add the shortcode [REST_API_CLIENT] and it will list events using angular.js
  Version: 1.0.0.dev.000
  Author: Event Espresso
  Author URI: http://www.eventespresso.com
  Copyright 2014 Event Espresso (email : support@eventespresso.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA02110-1301USA
 *
 * ------------------------------------------------------------------------
 *
 * Event Espresso
 *
 * Event Registration and Management Plugin for WordPress
 *
 * @ package		Event Espresso
 * @ author			Event Espresso
 * @ copyright	(c) 2008-2014 Event Espresso  All Rights Reserved.
 * @ license		http://eventespresso.com/support/terms-conditions/   * see Plugin Licensing *
 * @ link				http://www.eventespresso.com
 * @ version	 	EE4
 *
 * ------------------------------------------------------------------------
 */
define( 'EE_REST_API_CLIENT_VERSION', '1.0.0.dev.000' );
define( 'EE_REST_API_CLIENT_PLUGIN_FILE',  __FILE__ );
function load_espresso_rest_api_client() {
if ( class_exists( 'EE_Addon' )) {
	// rest_api_client version
	require_once ( plugin_dir_path( __FILE__ ) . 'EE_Rest_Api_Client.class.php' );
	EE_Rest_Api_Client::register_addon();
}
}
add_action( 'AHEE__EE_System__load_espresso_addons', 'load_espresso_rest_api_client' );

// End of file espresso_rest_api_client.php
// Location: wp-content/plugins/eea-rest-api-client/espresso_rest_api_client.php