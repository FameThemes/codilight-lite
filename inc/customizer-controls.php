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

class Codilight_Lite_Textarea_Custom_Control extends WP_Customize_Control
{
	public function render_content() {
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<textarea class="large-text" cols="20" rows="5" <?php $this->link(); ?>>
				<?php echo esc_textarea( $this->value() ); ?>
			</textarea>
			<p class="description"><?php echo $this->description ?></p>
		</label>
		<?php
	}
}

class Codilight_Lite_Theme_Support extends WP_Customize_Control {
	public function render_content() {
		echo __( 'Upgrade to <a href="#">Codilight Premium</a> to be able to change the section order and styling!', 'codilight-lite' );
	}
}
