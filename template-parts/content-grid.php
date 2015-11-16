<?php
/**
 * Template part for displaying posts with grid style.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Codilight_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6 col-sm-12' ); ?>>
    <div class="entry-thumb">
        <a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title(); ?>">
			<?php
			if ( has_post_thumbnail( ) ) {
				the_post_thumbnail( 'block_2_medium' );
			} else {
				echo '<img alt="'. esc_html( get_the_title() ) .'" src="'. esc_url( get_template_directory_uri() . '/assets/images/blank325_170.png' ) .'">';
			}
			?>
		</a>
    </div>
    <div class="entry-detail">
        <header class="entry-header">
    		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
    		<?php if ( 'post' === get_post_type() ) codilight_lite_meta_1();?>
    	</header><!-- .entry-header -->

    	<div class="entry-excerpt">
    		<?php echo codilight_lite_excerpt(120); ?>
    	</div><!-- .entry-content -->
    </div>
</article><!-- #post-## -->
