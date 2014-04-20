<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package wordpress-starter
 */
?>
	<div id="secondary" class="widget-area small-12 medium-3 column" role="complementary">
		<?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

			<aside id="search" class="widget widget_search">
				<?php get_search_form(); ?>
			</aside>

			<aside id="archives" class="widget">
				<h4 class="widget-title"><?php _e( 'Archives', 'wordpress-starter' ); ?></h4>
				<ul>
					<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
				</ul>
			</aside>

			<aside id="meta" class="widget">
				<h4 class="widget-title"><?php _e( 'Meta', 'wordpress-starter' ); ?></h4>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</aside>

		<?php endif; // end sidebar widget area ?>
	</div><!-- #secondary -->
