<?php
/**
 * Hooks for the Customizer.
 *
 * @since 1.0.0
 * @package Site_Icon_Pro
 */

namespace Site_Icon_Pro;

/**
 * Custom Customizer control to display a hint telling users where to manage
 * their site icon.
 *
 * We need the class defined in this function as WP_Customize_Control isn't
 * loaded unless you are in the Customizer context.
 *
 * @since    1.0.0
 */
class Customize_Control extends \WP_Customize_Control {

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

	/**
	 * Hook into customize_register action.
	 *
	 * Replaces the site icon control in the Customizer.
	 *
	 * @since    1.0.0
	 *
	 * @param object $wp_customize Instance of Customizer.
	 */
	public static function register( $wp_customize ) {

		// Remove the default site icon control.
		$wp_customize->remove_control( 'site_icon' );

		// Replace it with ours.
		$wp_customize->add_control( new Customize_Control( $wp_customize, 'site_icon', array(
			'section'  => 'title_tagline',
			'priority' => 60,
		) ) );
	}
}

?>
