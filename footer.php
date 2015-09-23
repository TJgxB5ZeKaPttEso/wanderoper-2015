<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Wanderoper Brandenburg 2015
 */

?>

	</div><!-- #content -->
<!-- livereload -->
<script src="//localhost:35729/livereload.js"></script>


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'wanderoper-2015' ) ); ?>"><?php printf( esc_html__( 'Proudly powered by %s', 'wanderoper-2015' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( esc_html__( 'Theme: %1$s by %2$s.', 'wanderoper-2015' ), 'wanderoper-2015', '<a href="http://johanneskrohn.de" rel="designer">Johannes Krohn</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
