<?php
/**
 * Codilight Lite Theme Customizer.
 *
 * @package Codilight_Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function codilight_lite_customize_register( $wp_customize ) {

	// Load custom controls
	require_once get_template_directory() . '/inc/customizer-controls.php';

	// Remove default sections
	$wp_customize->remove_section('colors');
	$wp_customize->remove_section('background_image');

	// Remove default control.

	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	/*------------------------------------------------------------------------*/
    /*  Site Identity
    /*------------------------------------------------------------------------*/

    	$wp_customize->add_setting( 'codilight_lite_site_logo',
			array(
				'sanitize_callback' => 'codilight_lite_sanitize_file_url',
				'default'           => esc_url( get_template_directory_uri() . '/assets/images/logo.png' )
			)
		);
    	$wp_customize->add_control( new WP_Customize_Image_Control(
            $wp_customize,
            'codilight_lite_site_logo',
				array(
					'label' 		=> __('Site Logo', 'codilight-lite'),
					'section' 		=> 'title_tagline',
					'description'   => esc_html__('Your site logo', 'codilight-lite'),
				)
			)
		);

	/*------------------------------------------------------------------------*/
    /*  Site Options
    /*------------------------------------------------------------------------*/
		$wp_customize->add_panel( 'codilight_lite_options',
			array(
				'priority'       => 22,
			    'capability'     => 'edit_theme_options',
			    'theme_supports' => '',
			    'title'          => __( 'Site Options', 'codilight-lite' ),
			    'description'    => '',
			)
		);

		/* Global Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'codilight_lite_global_settings' ,
			array(
				'priority'    => 3,
				'title'       => __( 'Global', 'codilight-lite' ),
				'description' => '',
				'panel'       => 'codilight_lite_options',
			)
		);

		/* Social Settings
		----------------------------------------------------------------------*/
		$wp_customize->add_section( 'codilight_lite_social' ,
			array(
				'priority'    => 6,
				'title'       => __( 'Social Profiles', 'codilight-lite' ),
				'description' => '',
				'panel'       => 'codilight_lite_options',
			)
		);

			// Order & Stlying
			$wp_customize->add_setting( 'codilight_lite_social_footer_guide',
				array(
					'sanitize_callback' => 'codilight_lite_sanitize_text'
				)
			);
			$wp_customize->add_control( new Codilight_Lite_Misc_Control( $wp_customize, 'codilight_lite_social_footer_guide',
				array(
					'section'     => 'codilight_lite_social',
					'type'        => 'custom_message',
					'description' => __( 'These social profiles setting below will display at the footer of your site.', 'codilight-lite' )
				)
			));
			// Footer Social Title
			$wp_customize->add_setting( 'codilight_lite_social_footer_title',
				array(
					'sanitize_callback' => 'sanitize_text_field',
					'default'           => __( 'Keep Updated', 'codilight-lite' ),
				)
			);
			$wp_customize->add_control( 'codilight_lite_social_footer_title',
				array(
					'label'       => __('Social Footer Title', 'codilight-lite'),
					'section'     => 'codilight_lite_social',
					'description' => ''
				)
			);

			// Twitter
			$wp_customize->add_setting( 'codilight_lite_social_twitter',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => 'https://twitter.com/famethemes',
				)
			);
			$wp_customize->add_control( 'codilight_lite_social_twitter',
				array(
					'label'       => __('Twitter URL', 'codilight-lite'),
					'section'     => 'codilight_lite_social',
					'description' => ''
				)
			);
			// Facebook
			$wp_customize->add_setting( 'codilight_lite_social_facebook',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => 'https://www.facebook.com/famethemes/',
				)
			);
			$wp_customize->add_control( 'codilight_lite_social_facebook',
				array(
					'label'       => __('Faecbook URL', 'codilight-lite'),
					'section'     => 'codilight_lite_social',
					'description' => ''
				)
			);
			// Facebook
			$wp_customize->add_setting( 'codilight_lite_social_google',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => '#',
				)
			);
			$wp_customize->add_control( 'codilight_lite_social_google',
				array(
					'label'       => __('Google Plus URL', 'codilight-lite'),
					'section'     => 'codilight_lite_social',
					'description' => ''
				)
			);
			// Instagram
			$wp_customize->add_setting( 'codilight_lite_social_instagram',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => '#',
				)
			);
			$wp_customize->add_control( 'codilight_lite_social_instagram',
				array(
					'label'       => __('Instagram URL', 'codilight-lite'),
					'section'     => 'codilight_lite_social',
					'description' => ''
				)
			);
			// RSS
			$wp_customize->add_setting( 'codilight_lite_social_rss',
				array(
					'sanitize_callback' => 'esc_url',
					'default'           => get_bloginfo('rss2_url'),
				)
			);
			$wp_customize->add_control( 'codilight_lite_social_rss',
				array(
					'label'       => __('RSS URL', 'codilight-lite'),
					'section'     => 'codilight_lite_social',
					'description' => ''
				)
			);


}
add_action( 'customize_register', 'codilight_lite_customize_register' );


/*------------------------------------------------------------------------*/
/*  OnePress Sanitize Functions.
/*------------------------------------------------------------------------*/

function codilight_lite_sanitize_file_url( $file_url ) {
	$output = '';
	$filetype = wp_check_filetype( $file_url );
	if ( $filetype["ext"] ) {
		$output = esc_url( $file_url );
	}
	return $output;
}

function codilight_lite_sanitize_number( $input ) {
    return force_balance_tags( $input );
}

function codilight_lite_sanitize_hex_color( $color ) {
	if ( $color === '' ) {
		return '';
	}
	if ( preg_match('|^#([A-Fa-f0-9]{3}){1,2}$|', $color ) ) {
		return $color;
	}
	return null;
}

function codilight_lite_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
		return 1;
    } else {
		return 0;
    }
}

function codilight_lite_sanitize_text( $string ) {
	return wp_kses_post( force_balance_tags( $string ) );
}

function codilight_lite_sanitize_html_input( $string ) {
	return wp_kses_allowed_html( $string );
}


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function codilight_lite_customize_preview_js() {
	wp_enqueue_script( 'codilight_lite_customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'codilight_lite_customize_preview_js' );
