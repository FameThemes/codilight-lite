<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Codilight_Lite
 */

get_header(); ?>
	<div id="content" class="site-content container <?php echo codilight_lite_sidebar_position(); ?>">
		<div class="content-inside">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				if ( have_posts() ) : $count = 0; ?>

					<header class="page-header">
						<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="taxonomy-description">', '</div>' );
						?>
					</header><!-- .page-header -->

					<?php
					$layout_archive_posts = get_theme_mod( 'layout_archive_posts', 'grid' );
					if ( $layout_archive_posts == 'grid' ) {
						echo '<div class="block1 block1_grid">';
						echo '<div class="row">';
							while ( have_posts() ) : the_post();
							$count++;
								get_template_part( 'template-parts/content-grid' );
							if ( $count % 2 == 0 ) {
								echo '</div>';
								echo '<div class="row">';
							}
							endwhile;
						echo '</div>';
						echo '</div>';
						codilight_lite_custom_paginate();

					} else {
						echo '<div class="block1 block1_list">';
							while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content-list' );
							endwhile;
						codilight_lite_custom_paginate();
						echo '</div>';
					}
					?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
