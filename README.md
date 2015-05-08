EE4 JSON REST API Client Addon
=========

An addon to Event Espresso 4 for demonstrating the use of the EE4 JSON REST API.

This plugin/addon needs to be uploaded to the "/wp-content/plugins/" directory on your server or installed using the WordPress plugins installer. In order to work, it requires the following plugins to be active:
<ol>
<li>Event Espresso 4.6.25+</li>
<li>WP JSON REST API 1.2</li>
<li>EE4 JSON REST API 2.0</li
</ol>

To use it, just add the shortcode [REST_API_CLIENT] onto a page, then we will enqueue the necessary javascript
files, and use the API to show the first 10 events and their description.s

