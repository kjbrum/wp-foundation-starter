<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package wordpress-starter
 */

get_header(); ?>

	<?php /* Check if there is a sidebar */
	$contentSize = (is_active_sidebar('sidebar-1')) ? 'small-12 medium-9 column' : 'small-12 column'; ?>

	<section id="primary" class="content-area <?php echo $contentSize; ?>">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( __( 'Search Results for: %s', 'wordpress-starter' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'search' ); ?>

			<?php endwhile; ?>

			<?php wordpress_starter_paging_nav(); ?>

		<?php else : ?>

			<?php get_template_part( 'content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
