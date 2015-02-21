<?php

	/*

	Plugin Name: Bitcoin Calculator Widget

	Plugin URI: http://www.richardmacarthy.com/

	Description: A plugin which creates a sidebar widget to calculate your chosen currency to Bitcoin.

	Author: Richard Macarthy

	Version: 1.1

	Author URI: http://www.richardmacarthy.com/

	*/

	

	/************************************************

	* Global Variables

	/************************************************/

	

	global $wp_roles;

	

	register_activation_hook(__FILE__, 'plugin_install');

	register_deactivation_hook( __FILE__, 'plugin_unininstall' );

	

	/************************************************

	* Includes

	/************************************************/

	

	include('lib/install.php'); 

	include('lib/admin-page.php'); 

	include('lib/calculator-widget.php'); 

	

?>