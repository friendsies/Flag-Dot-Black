<?php
/**
 *
 * @package Katori
 */
?>


<?php //Filter for the portfolio items data-groups
	$terms = get_the_terms( $post->ID, 'jetpack-portfolio-type' );					
	if ( $terms && ! is_wp_error( $terms ) ) : 
		$filters = array();
		foreach ( $terms as $term ) {
			$filters[] = '"' . $term->name . '"';
		}						
		$filter = join( ", ", $filters );
	else :
		$filter = null;
	endif;
?>

<article id="post-<?php the_ID(); ?>" data-groups='["all", <?php echo $filter; ?>]' <?php post_class('col-md-3 col-sm-4 col-xs-6'); ?>>

	<?php if ( has_post_thumbnail() ) : ?>
		<div class="entry-thumb">
			<?php the_post_thumbnail('katori-small'); ?>
		</div>
	<?php endif; ?>


	<div class="item-overlay"></div>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="small-thumb">
			<?php the_post_thumbnail('thumbnail'); ?>
		</div>
	<?php endif; ?>
	<?php 
		global $post;
		$url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
	?>
	<a class="icon-left" href="<?php echo esc_url($url); ?>" rel="prettyPhoto"><i class="fa fa-search"></i></a>
	<a class="icon-right" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-link"></i></a>

</article><!-- #post-## -->