<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package typefocus
 */
?>

	</div><!-- #content -->
</div><!-- #page -->
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php do_action( 'typefocus_credits' ); ?>
			<?php if ( get_theme_mod(typefocus_copyright) ):  ?>
			<?php echo get_theme_mod(typefocus_copyright); ?>
			<?php else: ?>
			<a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by %s', 'typefocus' ), 'WordPress' ); ?></a>
			<span class="sep"> | </span>
			<?php printf( __( 'Theme: %1$s by %2$s.', 'typefocus' ), 'typefocus', '<a href="http://www.ajaysdesk.com" rel="designer">Ajay Divakaran</a>' ); ?>
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- #colophon -->


<?php wp_footer(); ?>

</body>
</html>

