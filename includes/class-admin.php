<?php
/**
 * The admin-specific functionality of the plugin.
 *
 * @since 1.0.0
 * @package Site_Icon_Pro
 */

namespace Site_Icon_Pro;

/**
 * The admin-specific functionality of the plugin.
 *
 * @since 1.0.0
 */
class Admin {

	/**
	 * Register admin hooks.
	 *
	 * @since 1.0.0
	 */
	public function register() {

		// Admin hooks to add our menus.
		add_action( 'admin_init', array( $this, 'admin_init_callback' ) );
		add_action( 'admin_menu', array( $this, 'admin_menu_callback' ) );

	}

	/**
	 * Callbacks for the admin_init action.
	 *
	 * @since 1.0.0
	 */
	public function admin_init_callback() {

		wp_enqueue_style( 'site-icon-pro-admin-css', plugin_dir_url( __FILE__ ) . '../css/site-icon-pro-admin.css' );

		register_setting( 'site_icon_pro_options', 'site_icon_pro_html' );

	}

	/**
	 * Callbacks for the admin_menu action.
	 *
	 * @since 1.0.0
	 */
	public function admin_menu_callback() {

		add_theme_page( __( 'Site Icon Pro', 'site-icon-pro' ), __( 'Site Icon Pro', 'site-icon-pro' ), 'edit_theme_options', 'site_icon_pro_options', array( $this, 'render_options' ) );

	}

	/**
	 * Render admin options page
	 *
	 * @since    1.0.0
	 */
	function render_options() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Site Icon Pro Options', 'site-icon-pro' ); ?></h1>

		<?php settings_errors(); ?>
		<form method="post" action="options.php" id="site-icon-pro">
			<?php settings_fields( 'site_icon_pro_options' ); ?>

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
}

?>
