<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Codilight_Lite
 */

get_header(); ?>

	<div id="content" class="site-content container <?php echo codilight_lite_sidebar_position(); ?>">
		<div class="content-inside">
			<section id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'codilight-lite' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
					</header><!-- .page-header -->

					<?php
					echo '<div class="block1 block1_list">';
						while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content-search' );
						endwhile;
					codilight_lite_custom_paginate();
					echo '</div>';
					?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
