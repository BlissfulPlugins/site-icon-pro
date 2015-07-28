<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since 1.0.0
 * @package Site_Icon_Pro
 */

namespace Site_Icon_Pro;

/**
 * The frontend-specific functionality of the plugin.
 *
 * @since 1.0.0
 */
class Frontend {

	/**
	 * Register frontend hooks.
	 *
	 * @since 1.0.0
	 */
	public function register() {

		// Remove the 'site icon' renderer in WP 4.3+ - on older versions this has
		// no affect.
		remove_action( 'wp_head', 'wp_site_icon', 99 );

		// Add our renderer.
		add_action( 'wp_head', array( $this, 'render' ), 99 );

	}

	/**
	 * Render the site icon in the frontend.
	 *
	 * @since    1.0.0
	 */
	function render() {

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
}

?>
