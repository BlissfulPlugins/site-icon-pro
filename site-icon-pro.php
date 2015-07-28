<?php
/**
 * Main entry point to plugin
 *
 * @since             1.0.0
 * @package           Site_Icon_Pro
 *
 * @wordpress-plugin
 * Plugin Name:       Site Icon Pro
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
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

		// Admin hooks to add our menus.
		add_action( 'admin_init', 'site_icon_pro_admin_init' );
		add_action( 'admin_menu', 'site_icon_pro_admin_menu' );

	} else {
		// Remove the 'site icon' renderer in WP 4.3+ - on older versions this has
		// no affect.
		remove_action( 'wp_head', 'wp_site_icon', 99 );

		// Add our renderer.
		add_action( 'wp_head', 'site_icon_pro_render', 99 );
	}

	// Register a hook to remove the default Site Icon editor in Customizer.
	// Although this is an backend method, it is not triggered under `is_admin`.
	// That seems like a bug, so let's leave it here incase that changes!
	add_action( 'customize_register', 'site_icon_pro_customize_register', 99 );
}

/**
 * Admin init.
 *
 * @since 1.0.0
 */
function site_icon_pro_admin_init() {

	wp_enqueue_style( 'site-icon-pro-admin-css', plugin_dir_url( __FILE__ ) . 'css/site-icon-pro-admin.css' );

	register_setting( 'site_icon_pro_options', 'site_icon_pro_html' );

}

/**
 * Add admin menu options.
 *
 * @since    1.0.0
 */
function site_icon_pro_admin_menu() {

	add_theme_page( __( 'Site Icon Pro', 'site-icon-pro' ), __( 'Site Icon Pro', 'site-icon-pro' ), 'edit_theme_options', 'site_icon_pro_options', 'site_icon_pro_render_options' );

}

/**
 * Replaces the site icon control in the Customizer.
 *
 * @since    1.0.0
 *
 * @param object $wp_customize Instance of Customizer.
 */
function site_icon_pro_customize_register( $wp_customize ) {

	/**
	 * Custom Customizer control to display a hint telling users where to manage
	 * their site icon.
	 *
	 * We need the class defined in this function as WP_Customize_Control isn't
	 * loaded unless you are in the Customizer context.
	 *
	 * @since    1.0.0
	 */
	class Site_Icon_Pro_Customize_Control extends WP_Customize_Control {

		/**
		 * Render action.
		 *
		 * @since    1.0.0
		 */
		public function render_content() {
?>
	<label>
		<span class="customize-control-title">
			<?php esc_html_e( 'Site Icon' ); // We use the Wordpress context for this. ?>
		</span>
		<span class="description customize-control-description">
			<?php echo wp_kses_data( __( 'Please manage your site icon through <a href="themes.php?page=site_icon_pro_options">Appearance -> Site Icon Pro</a>.', 'site-icon-pro' ) ); ?>
		</span>
	</label>
<?php
		}
	}

	// Remove the default site icon control.
	$wp_customize->remove_control( 'site_icon' );

	// Replace it with ours.
	$wp_customize->add_control( new Site_Icon_Pro_Customize_Control( $wp_customize, 'site_icon', array(
		'section'  => 'title_tagline',
		'priority' => 60,
	) ) );

}

/**
 * Render admin options page
 *
 * @since    1.0.0
 */
function site_icon_pro_render_options() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Site Icon Pro Options', 'site-icon-pro' ); ?></h1>
		<form method="post" action="options.php" id="site-icon-pro">

			<h3><?php esc_html_e( 'Site Icon HTML', 'site-icon-pro' ); ?></h3>
			<p><?php echo wp_kses_data( __( "Here you can specify the exact HTML that is used to display favicon and app icons on your site. If you haven't already, please upload your icons into the <code>wp-content</code> folder of your Wordpress installation via FTP / SSH / etc.", 'site-icon-pro' ) ); ?></p>
			<textarea cols="70" rows="10" id="site_icon_pro_html" name="site_icon_pro_html"><?php echo( // WPCS: XSS OK.
				esc_textarea( get_option( 'site_icon_pro_html' ) )
			); ?></textarea>

			<?php submit_button(); ?>

			<h3><?php esc_html_e( 'Example HTML', 'site-icon-pro' ); ?></h3>

			<pre><code>&lt;link rel=&quot;icon&quot; type=&quot;image/x-icon&quot; href=&quot;/wp-content/favicon.ico&quot; /&gt;
&lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; href=&quot;/wp-content/favicon.png&quot; /&gt;
&lt;link rel=&quot;icon&quot; type=&quot;image/gif&quot; href=&quot;/wp-content/favicon.gif&quot; /&gt;</code></pre>
		</form>
	</div>
<?php
}

/**
 * Render the HTML editor.
 *
 * @since    1.0.0
 */
function site_icon_pro_options_html_callback() {

	$html = get_option( 'site_icon_pro_html' );

	echo( // WPCS: XSS OK.
		'<textarea cols="70" rows="10" id="site_icon_pro_html" name="site_icon_pro_html">' .
		esc_textarea( $html ) .
		'</textarea>'
	);
}

/**
 * Render the site icon in the frontend.
 *
 * @since    1.0.0
 */
function site_icon_pro_render() {

	$html = get_option( 'site_icon_pro_html' );

	if ( isset( $html ) ) {

		// Allow only link (standard favicon) and meta (browserconfig.xml) tags.
		$allowed_tags = '<link><link/><meta><meta/>';

		// Filter unwanted HTML tags to prevent people doing stupid things.
		$safe_html = strip_tags( $html, $allowed_tags );

		// Check that we have something left to render, and do it...
		if ( '' !== trim( $safe_html ) ) {

			echo( // WPCS: XSS OK.
				$safe_html
			);

		}
	}
}

run_site_icon_pro();
