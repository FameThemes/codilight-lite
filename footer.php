<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Codilight_Lite
 */
?>
		</div> <!--#content-inside-->
	</div><!-- #content -->
	<div class="footer-shadow container">
		<div class="row">
			<div class="col-md-12">
				<img src="<?php echo get_template_directory_uri().'/assets/images/footer-shadow.png' ?>" alt="" />
			</div>
		</div>
	</div>
	<footer id="colophon" class="site-footer" >
		<div class="container">

			<?php if ( has_nav_menu( 'footer' ) ): ?>
			<div class="footer-navigation">
				<?php wp_nav_menu( array('theme_location' => 'footer', 'container' => 'footer-menu', 'fallback_cb' => false ) ); ?>
			</div>
			<?php endif; ?>

			<div class="site-info">
				<p>
					<?php printf( esc_html__( 'Copyright &copy; %1$s %2$s. All Rights Reserved.', 'codilight-lite' ), date('Y'), get_bloginfo( 'name' ) ); ?>
				</p>
				<?php printf( esc_html__( 'Codilight Theme by %1$s', 'codilight-lite' ), '<a href="'. esc_url( 'http://www.famethemes.com/themes' ) .'">FameThemes</a>' ); ?>
			</div><!-- .site-info -->

		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
