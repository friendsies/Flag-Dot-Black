<?php
/*
Template Name: Front page
*/

get_header(); ?>

<div id="primary" class="portfolio-area fullwidth">

	<?php if (post_type_exists('jetpack-portfolio')) : ?>

		<?php if ( get_theme_mod('katori_portfolio_title') ) : ?>
			<h2 class="portfolio-title"><?php echo html_entity_decode(esc_attr( get_theme_mod('katori_portfolio_title') ));  ?></h2>
		<?php endif; ?>
			
		<div id="filter">
		<?php //Create portfolio filter from custom taxonomies
			$args = array(
				'taxonomy' => 'jetpack-portfolio-type',
			);
			$categories = get_categories($args);
				echo '<a href="#" data-group="all">' . __('All', 'katori') . '</a>';
				foreach($categories as $category) { 
					echo '<a href="#" data-group="' . $category->name . '">' . $category->name . '</a>';
				}
		?>
		</div>		
		<main id="main" class="portfolio-main" role="main">
			<?php
				$args = array(
					'post_type'      => 'jetpack-portfolio',
					'posts_per_page' => -1,
				);

				$query = new WP_Query ( $args );
			?>			

			<?php while ( $query->have_posts() ) : $query->the_post(); ?>
				<?php get_template_part( 'content-jetpack-portofolio' ); ?>
			<?php endwhile; ?>

		</main><!-- #main -->
	<?php endif; ?>
</div><!-- #primary -->

<?php get_footer(); ?>
