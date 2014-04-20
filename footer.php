<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wordpress-starter
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer row" role="contentinfo">
		<div class="site-info small-12">
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wordpress-starter' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'wordpress-starter' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
      &copy; <?php echo date('Y'); ?>. Kyle Brumm. All Rights Reserved.
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
