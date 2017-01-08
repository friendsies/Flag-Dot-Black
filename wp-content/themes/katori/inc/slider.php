<?php
/**
 * Slider template
 *
 * @package Katori
 */

//Load the script for the slider
function katori_slider_scripts() {
	if ( is_front_page() && get_theme_mod('katori_slider_display') ) {
			
		wp_enqueue_script( 'katori-superslides', get_template_directory_uri() . '/js/jquery.superslides.min.js', array(), true );

		wp_enqueue_script( 'katori-slides-init', get_template_directory_uri() . '/js/slides-init.js', array('jquery'), true );
					
	}		
}
add_action( 'wp_enqueue_scripts', 'katori_slider_scripts' );

//Slider template
function katori_slider_template() { ?>
	<div class="overlay"></div>
	<div class="slides-wrapper">
		<div id="slides">
		    <div class="slides-container">
			    <?php
			    	if ( get_theme_mod('katori_slider_random') ) {

			    		if ( get_theme_mod('katori_slider_image_1') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_1')) . '">';
						}
					    if ( get_theme_mod('katori_slider_image_2') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_2')) . '">';
						}			
					    if ( get_theme_mod('katori_slider_image_3') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_3')) . '">';
						}
					    if ( get_theme_mod('katori_slider_image_4') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_4')) . '">';
						}
					    if ( get_theme_mod('katori_slider_image_5') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_5')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_6') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_6')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_7') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_7')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_8') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_8')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_9') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_9')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_10') ) {
							$images[] = '<img src="' . esc_url(get_theme_mod('katori_slider_image_10')) . '">';
						}

						shuffle($images);
						foreach ($images as $image) {
	    					echo "$image";
	    				}
			    	}

			    	else {

			    		if ( get_theme_mod('katori_slider_image_1') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_1')) . '">';
						}
					    if ( get_theme_mod('katori_slider_image_2') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_2')) . '">';
						}			
					    if ( get_theme_mod('katori_slider_image_3') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_3')) . '">';
						}
					    if ( get_theme_mod('katori_slider_image_4') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_4')) . '">';
						}
					    if ( get_theme_mod('katori_slider_image_5') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_5')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_6') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_6')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_7') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_7')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_8') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_8')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_9') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_9')) . '">';
						}
						if ( get_theme_mod('katori_slider_image_10') ) {
							echo '<img src="' . esc_url(get_theme_mod('katori_slider_image_10')) . '">';
						}
			    	}

				?>	
		    </div>
		</div>
	</div>
	<?php	
}