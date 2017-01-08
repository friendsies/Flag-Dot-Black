<?php
/**
 * @package Katori
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if ( has_post_thumbnail() && !get_theme_mod( 'katori_thumb_index' ) ) : ?>
		<div class="entry-thumb">
			<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" >
				<?php the_post_thumbnail( ); ?>
			</a>	
		</div>		
	<?php endif; ?>
	
	<header class="entry-header">
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>

		<?php if ( 'post' == get_post_type() && (get_theme_mod('katori_date') != 1) ) : ?>
		<div class="entry-meta">
			<?php katori_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php if ( (get_theme_mod('katori_full_content') == 1) && is_home() ) : ?>
			<?php the_content(); ?>
		<?php else : ?>
			<?php the_excerpt(); ?>
		<?php endif; ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'katori' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
			<?php
				/* translators: used between list items, there is a space after the comma */
				$categories_list = get_the_category_list( __( ', ', 'katori' ) );
				if ( $categories_list && katori_categorized_blog() && get_theme_mod('katori_cats') != 1 ) :
			?>
			<span class="cat-links">
				<?php echo '<i class="fa fa-folder"></i>&nbsp;' . $categories_list; ?>
			</span>
			<?php endif; // End if categories ?>

			<?php
				/* translators: used between list items, there is a space after the comma */
				$tags_list = get_the_tag_list( '', __( ', ', 'katori' ) );
				if ( $tags_list && get_theme_mod('katori_tags') != 1 ) :
			?>
			<span class="tags-links">
				<?php echo '<i class="fa fa-tag"></i>&nbsp;' . $tags_list; ?>
			</span>
			<?php endif; // End if $tags_list ?>
		<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) && get_theme_mod('katori_comm') != 1 ) : ?>
			<span class="comments-link"><i class="fa fa-comment"></i>&nbsp;<?php comments_popup_link( __( 'Leave a comment', 'katori' ), __( '1 Comment', 'katori' ), __( '% Comments', 'katori' ) ); ?></span>
		<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'katori' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->