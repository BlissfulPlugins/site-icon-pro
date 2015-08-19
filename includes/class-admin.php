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

			<h3><?php esc_html_e( 'HTML Reference', 'site-icon-pro' ); ?></h3>

			<h4><?php esc_html_e( 'Browser Icons (Favicon)', 'site-icon-pro' ); ?></h4>

			<p>Desktop browsers and some mobile browsers will display the site icon in the address bar or tab bar of the browser, this is usually referred to as the favicon. To support this on the majority of browsers you should upload two icons:</p>

			<ul>
				<li>ICO - 16 x 16 pixels low resolution icon on a transparent background. Some tools let you combine multiple resolutions in a single file, in that case also add a 32x32px version which will be used on retina displays in some browsers.</li>
				<li>PNG - 32 x 32 pixels retina icon on a transparent background.</li>
			</ul>

			<p>You can also incude an animated icon in GIF format, but support on modern browsers is limited.</p>

			<pre><code>&lt;link rel=&quot;shortcut icon&quot; type=&quot;image/x-icon&quot; sizes=&quot;16x16 32x32&quot; href=&quot;/wp-content/favicon.ico&quot; /&gt;
&lt;link rel=&quot;icon&quot; type=&quot;image/png&quot; sizes=&quot;32x32&quot; href=&quot;/wp-content/favicon.png&quot; /&gt;
&lt;link rel=&quot;icon&quot; type=&quot;image/gif&quot; href=&quot;/wp-content/favicon.gif&quot; /&gt;</code></pre>

			<h4><?php esc_html_e( 'iOS Icons', 'site-icon-pro' ) ?></h4>

			<p>iOS lets you specify an icon that is displayed when a webpage is added to the favourites and the homescreen. This should be PNG format on a non-transparent background (transparent icons are displayed on a back background) which follows the <a href="https://developer.apple.com/library/ios/documentation/UserExperience/Conceptual/MobileHIG/AppIcons.html" target="_blank">Apple App Icon Guidelines</a>. To support the latest devices and version of iOS you should include the following sizes:</p>
	
			<ul>
				<li>180 x 180 pixels (iPhone 6 Plus)</li>
				<li>120 x 120 pixels (iPhone 6)</li>
				<li>152 x 152 pixels (iPad)</li>
			</ul>

			<p>On older devices the icons will be downsized automatically.</p>

			<pre><code>&lt;link rel=&quot;apple-touch-icon&quot; sizes=&quot;180x180&quot; href=&quot;/wp-content/ios-180.png&quot; /&gt;
&lt;link rel=&quot;apple-touch-icon&quot; sizes=&quot;120x120&quot; href=&quot;/wp-content/ios-120.png&quot; /&gt;
&lt;link rel=&quot;apple-touch-icon&quot; sizes=&quot;152x152&quot; href=&quot;/wp-content/ios-152.png&quot; /&gt;</pre></code>

			<p>Additionally you can control how a web page is displayed when being launched from the home screen, see the <a href="https://developer.apple.com/library/ios/documentation/AppleApplications/Reference/SafariWebContent/ConfiguringWebApplications/ConfiguringWebApplications.html#//apple_ref/doc/uid/TP40002051-CH3-SW2" target="_blank">Apple Guidelines</a> for the HTML to include for that.</p>

			<h4><?php esc_html_e( 'Android Icons', 'site-icon-pro' ) ?></h4>
			
			<p>Chrome on Android lets you specify an icon when the webpage is added to the homescreen. Icons should follow the <a href="https://stuff.mit.edu/afs/sipb/project/android/docs/design/style/iconography.html" target="_blank">Android Iconography Guidelines</a>. To support most modern devices you should include the following sizes:</p>

			<ul>
				<li>192 × 192 pixels (xxxhdpi / 4x devices)</li>
				<li>144 × 144 pixels (xxhdpi / 3x devices)</li>
			</ul>

			<p>On other devices the icons will be downsized automatically.</p>

			<pre><code>&lt;meta name=&quot;mobile-web-app-capable&quot; content=&quot;yes&quot; /&gt;
&lt;link rel=&quot;icon&quot; sizes=&quot;192x192&quot; href=&quot;/wp-content/android-192.png&quot; /&gt;
&lt;link rel=&quot;icon&quot; sizes=&quot;144x144&quot; href=&quot;/wp-content/android-144.png&quot; /&gt;</pre></code>

			<h4><?php esc_html_e( 'Windows Metro Tile Icons', 'site-icon-pro' ) ?></h4>
			<p>Windows 8.1+ and Windows Phone 8.1+ can display custom icons on tiles when web pages are pinned. Icons should follow the <a href="https://msdn.microsoft.com/en-us/library/windows/apps/hh465403.aspx" target="_blank">Microsoft Tile Guidelines</a>. As there are four different tile sizes, four different icons should be uploaded - the same are used on desktop and mobile devices:</p>

			<ul>
				<li>70 x 70 pixels (Small square tile)</li>
				<li>150 x 150 pixels (Medium square tile)</li>
				<li>310 x 150 pixels (Large wide tile)</li>
				<li>310 x 310 pixels (Large square tile)</li>
			</ul>

			<p>You should also specify the tile tite and background colour with meta tags:</p>

			<pre><code>&lt;meta name=&quot;application-name&quot; content=&quot;<?php echo esc_html( get_bloginfo( 'name' ) ); ?>&quot; /&gt;
&lt;meta name=&quot;msapplication-TileColor&quot; content=&quot;#009900&quot; /&gt;
&lt;meta name=&quot;msapplication-square70x70logo&quot; content=&quot;/wp-content/ms-square-70.png&quot; /&gt;
&lt;meta name=&quot;msapplication-square150x150logo&quot; content=&quot;/wp-content/ms-square-150.png&quot; /&gt;
&lt;meta name=&quot;msapplication-wide310x150logo&quot; content=&quot;/wp-content/ms-wide-310.png&quot; /&gt;
&lt;meta name=&quot;msapplication-square310x310logo&quot; content=&quot;/wp-content/ms-square-310.png&quot; /&gt;</code></pre>

		</form>
	</div>
<?php
	}
}

?>
