<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Katori
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() && !get_theme_mod( 'katori_thumb_single_page' ) ) : ?>
		<div class="single-thumb">
			<?php the_post_thumbnail(); ?>
		</div>	
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'katori' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'katori' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
