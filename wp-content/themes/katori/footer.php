<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Katori
 */
?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav class="social-navigation clearfix">
			<?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'container_class' => 'container', 'menu_class' => 'social-menu clearfix', 'fallback_cb' => false ) ); ?>
		</nav>
	<?php endif; ?>		
		<div class="container">
			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'katori' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'katori' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %2$s by %1$s', 'katori' ), 'aThemes', '<a href="http://athemes.com/theme/katori" rel="designer">Katori</a>' ); ?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
