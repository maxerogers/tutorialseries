<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package typefocus
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php _e( 'These arent the droids you are looking for.', 'typefocus' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php _e( 'Actually, it looks like we just hit a 404. The page doesnt exist. Perhaps you wanna try the search function...', 'typefocus' ); ?></p>
					<br><br>
					<div class="full-width-search"><?php get_search_form(); ?></div>


				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>