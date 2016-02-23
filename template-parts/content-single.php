<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Codilight_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header entry-header-single">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<?php codilight_lite_meta_1(); ?>
	</header><!-- .entry-header -->

	<?php if ( has_post_thumbnail() ) : ?>
	<div class="entry-thumb">
		<?php the_post_thumbnail( 'codilight_lte_codilight_lite_single_medium' ); ?>
	</div>
	<?php endif; ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'codilight-lite' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php codilight_lite_entry_footer(); ?>

		<?php
		$prev_link = get_previous_post_link( '%link', '%title', true );
		$next_link = get_next_post_link( '%link', '%title', true );
		?>
		<?php if ( $prev_link || $next_link ) : ?>
		<div class="post-navigation row">
			<div class="col-md-6">
				<?php if ( $prev_link ) { ?>
				<span><?php esc_html_e( 'Previous article', 'codilight-lite' ) ?></span>
				<h2 class="h5"><?php echo $prev_link; ?></h2>
				<?php } ?>
			</div>
			<div class="col-md-6 post-navi-next">
				<?php if ( $next_link ) { ?>
				<span><?php esc_html_e( 'Next article', 'codilight-lite' ) ?></span>
				<h2 class="h5"><?php echo $next_link; ?></h2>
				<?php } ?>
			</div>
		</div>
		<?php endif; ?>

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
