<?php
/**
 * Template Name: Left Sidebar
 *
 * @package yourweblayout
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<div class="row">
				<div class="col-md-3">
					<?php get_sidebar(1); ?>
				</div><!-- .col -->

				<div class="col-md-9">
					<?php while ( have_posts() ) : the_post(); ?>
						<?php get_template_part( 'content', 'page' ); ?>
					<?php endwhile; // end of the loop. ?>
				</div><!-- .col -->
			</div><!-- .row -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>
