<?php
/**
 * Add theme dashboard page
 */

add_action('admin_menu', 'codilight_lite_theme_info');
function codilight_lite_theme_info() {
	$theme_data = wp_get_theme();
	add_theme_page( sprintf( esc_html__( '%s Theme Dashboard', 'codilight-lite' ), $theme_data->Name ), sprintf( esc_html__('%s', 'codilight-lite'), $theme_data->Name), 'edit_theme_options', 'ft_codilight_lite', 'codilight_lite_theme_info_page');
}

function codilight_lite_theme_info_page() {

	$theme_data = wp_get_theme(); ?>

	<div class="wrap about-wrap theme_info_wrapper">
		<h1><?php printf(esc_html__('Welcome to %1s - Version %2s', 'codilight-lite'), $theme_data->Name, $theme_data->Version ); ?></h1>
		<div class="about-text"><?php esc_html_e( 'Codilight Lite is a news magazine style WordPress theme from FameThemes which is a perfect option to create any kind of magazine or blog websites.', 'codilight-lite' ) ?></div>
		<a target="_blank" href="<?php echo esc_url('http://www.famethemes.com/?utm_source=theme_dashboard_page&utm_medium=badge_link&utm_campaign=theme_admin'); ?>" class="famethemes-badge wp-badge"><span><?php _e( 'FameThemes', 'codilight-lite' ); ?></span></a>
		<h2 class="nav-tab-wrapper">
			<a href="?page=ft_codilight_lite" class="nav-tab nav-tab-active"><?php echo $theme_data->Name; ?></a>
		</h2>

		<div class="theme_info">
			<div class="theme_info_column clearfix">
				<div class="theme_info_left">
					<div class="theme_link">
						<h3><?php esc_html_e( 'Theme Customizer', 'codilight-lite' ); ?></h3>
						<p class="about"><?php printf(esc_html__('%s supports the Theme Customizer for all theme settings. Click "Customize" to start customize your site.', 'codilight-lite'), $theme_data->Name); ?></p>
						<p>
							<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" class="button button-primary"><?php esc_html_e('Start Customize', 'codilight-lite'); ?></a>
						</p>
					</div>
					<div class="theme_link">
						<h3><?php esc_html_e( 'Theme Documentation', 'codilight-lite' ); ?></h3>
						<p class="about"><?php printf(esc_html__('Need any help to setup and configure %s? Please have a look at our documentations instructions.', 'codilight-lite'), $theme_data->Name); ?></p>
						<p>
							<a href="http://docs.famethemes.com/category/30-codilight-lite" target="_blank" class="button button-secondary"><?php esc_html_e('Online Documentation', 'codilight-lite'); ?></a>
						</p>
					</div>
					<div class="theme_link">
						<h3><?php esc_html_e( 'Having Trouble, Need Support?', 'codilight-lite' ); ?></h3>
						<p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through the WordPress free theme support forum.', 'codilight-lite'), $theme_data->Name); ?></p>
						<p>
							<a href="https://wordpress.org/support/theme/codilight-lite" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html('Go To %s Support Forum', 'codilight-lite'), $theme_data->Name); ?></a>
						</p>
					</div>
				</div>

				<div class="theme_info_right">
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_attr_e( 'Theme Screenshot', 'codilight-lite' ); ?>" />
				</div>
			</div>
		</div>

	</div> <!-- END .theme_info -->

<?php
}
?>
