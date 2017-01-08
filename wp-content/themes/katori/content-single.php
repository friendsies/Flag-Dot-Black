<?php
/**
 * @package Katori
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() && !get_theme_mod( 'katori_thumb_single_post' ) ) : ?>
		<div class="single-thumb">
			<?php the_post_thumbnail(); ?>
		</div>	
	<?php endif; ?>

	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php if ( get_theme_mod('katori_single_date') != 1 ) : ?>
			<div class="entry-meta">
				<?php katori_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
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
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'katori' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'katori' ) );

			if ( ! katori_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list && get_theme_mod('katori_single_tags') != 1 ) {
					$meta_text = '<i class="fa fa-tag"></i> %2$s';
				}

			} else {
				// If the blog has more categories, check for user display options
				if ( '' != $tag_list && ( get_theme_mod('katori_single_cats') != 1 ) && ( get_theme_mod('katori_single_tags') != 1 ) ) {
					$meta_text = '<span><i class="fa fa-folder"></i> %1$s</span>' . '<span><i class="fa fa-tag"></i> %2$s</span>';
				} elseif ( ( get_theme_mod('katori_single_cats') != 1 ) && ( get_theme_mod('katori_single_tags') == 1 ) ) {
					$meta_text = '<span><i class="fa fa-folder"></i> %1$s</span>';
				} elseif ( '' != $tag_list && ( get_theme_mod('katori_single_cats') == 1 ) && ( get_theme_mod('katori_single_tags') != 1 ) ) {
					$meta_text = '<i class="fa fa-tag"></i> %2$s';
				} else {
					$meta_text = '';
				}
			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list
			);
		?>

		<?php edit_post_link( __( 'Edit', 'katori' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
