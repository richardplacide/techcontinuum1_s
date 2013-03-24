<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package techcontinuum1_s
 */
?>

	</div><!-- #main -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'techcontinuum1_s_credits' ); ?>
			<?php printf( __('Proudly powered by ')); ?><a href="http://wordpress.org/" title="<?php esc_attr_e( 'A Semantic Personal Publishing Platform', 'techcontinuum1_s' ); ?>" rel="generator"><?php printf( __( '%s', 'techcontinuum1_s' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s made by %2$s using the fantastic %3$s.', 'techcontinuum1_s' ), 'Techcontinuum _s', 'Richard Placide','<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>