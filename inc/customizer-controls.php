<?php
/*-----------------------------------------------------------------------------------*/
/*  Codilight Lite Customizer Controls
/*-----------------------------------------------------------------------------------*/

class Codilight_Lite_Misc_Control extends WP_Customize_Control {


	public $settings = 'blogname';
	public $description = '';
	public $group = '';

	/**
	 * Render the description and title for the sections
	 */
	public function render_content() {
		switch ( $this->type ) {
			default:

			case 'heading':
				echo '<span class="customize-control-title">' . $this->title . '</span>';
				break;

			case 'custom_message' :
				echo '<p class="description">' . $this->description . '</p>';
				break;

			case 'hr' :
				echo '<hr />';
				break;
		}
	}
}


class Codilight_Lite_Theme_Support extends WP_Customize_Control {
	public function render_content() {
		echo __( 'Upgrade to <a href="#">Codilight Premium</a> to be able to change the section order and styling!', 'codilight-lite' );
	}
}
