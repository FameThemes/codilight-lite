<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Codilight_Lite
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'codilight-lite' ); ?></a>
	<?php do_action( 'codilight_lite_before_topbar' ); ?>
	<div id="topbar" class="site-topbar">
		<div class="container">
			<div class="topbar-left pull-left">
				<nav id="site-navigation" class="main-navigation" >
					<span class="home-menu"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><i class="fa fa-home"></i></a></span>
					<span class="nav-toggle"><a href="#0" id="nav-toggle"><?php esc_html_e( 'Menu', 'codilight-lite' ); ?><span></span></a></span>
					<ul class="ft-menu">
						<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'codilight_lite_link_to_menu_editor' ) ); ?>
					</ul>
				</nav><!-- #site-navigation -->
			</div>
			<div class="topbar-right pull-right">
				<ul class="topbar-elements">
					<?php do_action( 'codilight_lite_before_topbar_search' ); ?>
					<li class="topbar-search">
						<a href="javascript:void(0)"><i class="search-icon fa fa-search"></i><span><?php esc_html_e( 'Search', 'codilight-lite' ); ?></span></a>
						<div class="dropdown-content dropdown-search">
							<?php get_search_form( true ); ?>
						</div>
					</li>
					<?php do_action( 'codilight_lite_after_topbar_search' ); ?>
					<div class="clear"></div>
				</ul>
			</div>
		</div>
	</div><!--#topbar-->
	<?php do_action( 'codilight_lite_after_topbar' ); ?>

	<div class="mobile-navigation">
		<?php do_action( 'codilight_lite_before_mobile_navigation' ); ?>
		<ul>
			<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => '', 'items_wrap' => '%3$s', 'fallback_cb' => 'codilight_lite_link_to_menu_editor' ) ); ?>
		</ul>
		<?php do_action( 'codilight_lite_after_mobile_navigation' ); ?>
	</div>

	<?php do_action( 'codilight_lite_lite_before_site_header' ); ?>
	<header id="masthead" class="site-header" >
		<div class="container">
			<div class="site-branding">
				<?php
				$codilight_lite_site_logo = get_theme_mod( 'codilight_lite_site_logo', apply_filters('customizer_default_logo', '' ) );
				if ( isset( $codilight_lite_site_logo ) && $codilight_lite_site_logo != '' ) {
					echo '<a title="'. get_bloginfo( 'name' ) .'" class="site-logo" href="' . esc_url( home_url( '/' ) ) . '" rel="home"><img src="'. esc_url( $codilight_lite_site_logo ) .'" alt="'. get_bloginfo( 'name' ) .'"></a>';
				} else {
					if ( is_front_page() && is_home() ) :
						echo '<h1 class="site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></h1>';
					else :
						echo '<p class="site-title"><a href="' .esc_url( home_url( '/' ) ) . '" rel="home">' . get_bloginfo( 'name' ) . '</a></p>';
					endif;
					echo '<p class="site-description">'. get_bloginfo( 'description' ) .'</p>';
				}

				?>
			</div><!-- .site-branding -->
		</div>
	</header><!-- #masthead -->
	<?php do_action( 'codilight_lite_after_site_header' ); ?>
