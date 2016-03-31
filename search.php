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
					global $wp_query;
					$total_pages = $wp_query->max_num_pages;
					$current_page = max(1, get_query_var('paged'));

					echo '<div class="block1 block1_list">';
						while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content-search' );
						endwhile;
						/**
						 * Show pagination if more than 1 page.
						 */
						if (  $wp_query->max_num_pages > 1 ) {
							echo '<div class="ft-paginate">';
							the_posts_pagination(array(
								'prev_next' => True,
								'prev_text' => '<i class="fa fa-angle-left"></i>',
								'next_text' => '<i class="fa fa-angle-right"></i>',
								'before_page_number' => '<span class="screen-reader-text">' . __('Page', 'codilight-lite') . ' </span>',
							));
							printf( '<span class="total-pages">'. esc_html__( 'Page %1$s of %2$s', 'codilight-lite' ) .'</span>', $current_page, $total_pages );
							echo '</div>';
						}

					echo '</div>';
					?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

				</main><!-- #main -->
			</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
