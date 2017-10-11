<?php
/**
 * Add theme dashboard page
 */

add_action('admin_menu', 'codilight_lite_theme_info');
function codilight_lite_theme_info() {
	$theme_data = wp_get_theme();
	add_theme_page( sprintf( esc_html__( '%s Theme Dashboard', 'codilight-lite' ), $theme_data->Name ), sprintf( esc_html__('%s', 'codilight-lite'), $theme_data->Name), 'edit_theme_options', 'codilight-lite', 'codilight_lite_theme_info_page');
}

function codilight_lite_theme_info_page() {

	$theme_data = wp_get_theme();
	// Check for current viewing tab
	$tab = null;
	if ( isset( $_GET['tab'] ) ) {
		$tab = $_GET['tab'];
	} else {
		$tab = null;
	}
	?>

	<div class="wrap about-wrap theme_info_wrapper">
		<h1><?php printf(esc_html__('Welcome to %1s - Version %2s', 'codilight-lite'), $theme_data->Name, $theme_data->Version ); ?></h1>
		<div class="about-text"><?php esc_html_e( 'Codilight Lite is a news magazine style WordPress theme from FameThemes which is a perfect option to create any kind of magazine or blog websites.', 'codilight-lite' ) ?></div>
		<a target="_blank" href="<?php echo esc_url('https://www.famethemes.com/?utm_source=theme_dashboard_page&utm_medium=badge_link&utm_campaign=codilight-lite'); ?>" class="famethemes-badge wp-badge"><span><?php _e( 'FameThemes', 'codilight-lite' ); ?></span></a>
		<h2 class="nav-tab-wrapper">
			<a href="?page=codilight-lite" class="nav-tab nav-tab-active"><?php echo $theme_data->Name; ?></a>
            <a href="<?php echo esc_url( add_query_arg( array( 'page'=>'codilight-lite', 'tab' => 'demo-data-importer' ), admin_url( 'themes.php' ) ) ); ?>" class="nav-tab<?php echo $tab == 'demo-data-importer' ? ' nav-tab-active' : null; ?>"><?php esc_html_e( 'One Click Demo Import', 'codilight-lite' ); ?></span></a>
		</h2>

		<?php if ( is_null($tab) ) { ?>
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
							<a href="http://docs.famethemes.com/category/111-codilight-lite" target="_blank" class="button button-secondary"><?php esc_html_e('Online Documentation', 'codilight-lite'); ?></a>
						</p>
					</div>
					<div class="theme_link">
						<h3><?php esc_html_e( 'Having Trouble, Need Support?', 'codilight-lite' ); ?></h3>
						<p class="about"><?php printf(esc_html__('Support for %s WordPress theme is conducted through the WordPress free theme support forum.', 'codilight-lite'), $theme_data->Name); ?></p>
						<p>
							<a href="https://wordpress.org/support/theme/codilight-lite" target="_blank" class="button button-secondary"><?php echo sprintf( esc_html__('Go To %s Support Forum', 'codilight-lite'), $theme_data->Name); ?></a>
						</p>
					</div>
				</div>

				<div class="theme_info_right">
					<img src="<?php echo get_template_directory_uri(); ?>/screenshot.png" alt="<?php esc_attr_e( 'Theme Screenshot', 'codilight-lite' ); ?>" />
				</div>
			</div>
		</div>
        <?php } ?>


		<?php if ( $tab == 'demo-data-importer' ) { ?>
            <div class="demo-import-tab-content theme_info">
				<?php if ( has_action( 'codilight-lite_demo_import_content_tab' ) ) {
					do_action( 'codilight-lite_demo_import_content_tab' );
				} else { ?>
                    <div id="plugin-filter" class="demo-import-boxed">
						<?php
						$plugin_name = 'famethemes-demo-importer';
						$status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_name );
						$button_class = 'install-now button';
						$button_txt = esc_html__( 'Install Now', 'codilight-lite' );
						if ( ! $status ) {
							$install_url = wp_nonce_url(
								add_query_arg(
									array(
										'action' => 'install-plugin',
										'plugin' => $plugin_name
									),
									network_admin_url( 'update.php' )
								),
								'install-plugin_'.$plugin_name
							);
						} else {
							$install_url = add_query_arg(array(
								'action' => 'activate',
								'plugin' => rawurlencode( $plugin_name . '/' . $plugin_name . '.php' ),
								'plugin_status' => 'all',
								'paged' => '1',
								'_wpnonce' => wp_create_nonce('activate-plugin_' . $plugin_name . '/' . $plugin_name . '.php'),
							), network_admin_url('plugins.php'));
							$button_class = 'activate-now button-primary';
							$button_txt = esc_html__( 'Active Now', 'codilight-lite' );
						}
						$detail_link = add_query_arg(
							array(
								'tab' => 'plugin-information',
								'plugin' => $plugin_name,
								'TB_iframe' => 'true',
								'width' => '772',
								'height' => '349',
							),
							network_admin_url( 'plugin-install.php' )
						);
						echo '<p>';
						printf( esc_html__(
							'Hey, you will need to install and activate the %1$s plugin first.', 'codilight-lite' ),
							'<a class="thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'FameThemes Demo Importer', 'codilight-lite' ).'</a>'
						);
						echo '</p>';
						echo '<p class="plugin-card-'.esc_attr( $plugin_name ).'"><a href="'.esc_url( $install_url ).'" data-slug="'.esc_attr( $plugin_name ).'" class="'.esc_attr( $button_class ).'">'.$button_txt.'</a></p>';
						?>
                    </div>
				<?php } ?>
            </div>
		<?php } ?>
        
	</div> <!-- END .theme_info -->

<?php
}
?>
