<?php
/**
 * Main entry point to plugin
 *
 * @since             1.0.0
 * @package           Site_Icon_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       Site Icon Pro
 * Description:       Full control over the HTML used to display the favicon and app icons on your site.
 * Version:           1.0.0
 * Author:            Luca Spiller
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       site-icon-pro
 * Domain Path:       /languages
 *
 * Copyright (C) 2015 Blissful Systems Limited
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */
function run_site_icon_pro() {

	if ( is_admin() ) {

		// Load the admin class.
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-admin.php';

		$admin = new Site_Icon_Pro\Admin();
		$admin->register();

	} else {

		// Load the frontend class.
		require_once plugin_dir_path( __FILE__ ) . 'includes/class-frontend.php';

		$frontend = new Site_Icon_Pro\Frontend();
		$frontend->register();

	}

	// Register a hook to remove the default Site Icon editor in Customizer.
	// Although this is an backend method, it is not triggered under `is_admin`.
	// That seems like a bug, so let's leave it here incase that changes!
	add_action( 'customize_register', 'site_icon_pro_customize_register', 99 );
}

/**
 * Replaces the site icon control in the Customizer.
 *
 * @since    1.0.0
 *
 * @param object $wp_customize Instance of Customizer.
 */
function site_icon_pro_customize_register( $wp_customize ) {

	// Load the class and call its register action.
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-customize-control.php';

	Site_Icon_Pro\Customize_Control::register( $wp_customize );

}

run_site_icon_pro();

?>
