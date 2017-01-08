<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Katori
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php if ( get_theme_mod('katori_site_favicon') ) : ?>
	<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('katori_site_favicon')); ?>" />
<?php endif; ?>

<?php if ( get_theme_mod('katori_apple_touch_144') ) : ?>
	<link rel="apple-touch-icon" sizes="144x144" href="<?php echo esc_url(get_theme_mod('katori_apple_touch_144')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('katori_apple_touch_114') ) : ?>
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo esc_url(get_theme_mod('katori_apple_touch_114')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('katori_apple_touch_72') ) : ?>
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo esc_url(get_theme_mod('katori_apple_touch_72')); ?>" />
<?php endif; ?>
<?php if ( get_theme_mod('katori_apple_touch_57') ) : ?>
	<link rel="apple-touch-icon" href="<?php echo esc_url(get_theme_mod('katori_apple_touch_57')); ?>" />
<?php endif; ?>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'katori' ); ?></a>


	<?php if ( is_front_page() && get_theme_mod('katori_slider_display') ) : ?>
		<?php echo katori_slider_template(); ?>
		<?php $active_slider = "active-slider"; ?>
	<?php else : ?>
		<?php $active_slider = ""; ?>
	<?php endif; ?>	

	<header id="masthead" class="site-header clearfix <?php echo $active_slider; ?>" role="banner">
		<div class="container">
			<div class="site-branding col-md-5 col-sm-6 col-xs-6">
				<?php if ( get_theme_mod('katori_site_logo') ) : ?>
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><img class="site-logo" src="<?php echo esc_url(get_theme_mod('katori_site_logo')); ?>" alt="<?php bloginfo('name'); ?>" /></a>
				<?php else : ?>
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
				<?php endif; ?>
			</div>

			<nav id="site-navigation" class="main-navigation col-md-7 col-sm-6 col-xs-6" role="navigation">
				<?php if ( is_active_sidebar(1) && !is_page_template( 'page_front-page.php' ) ) : //Check if the sidebar has any widgets and display the toggle button ?>
					<button class="sidebar-toggle"><i class="fa fa-toggle-off"></i></button>
				<?php endif; ?>				
				<button class="menu-toggle"><i class="fa fa-bars"></i></button>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->
		</div>

	<?php if ( is_front_page() && get_theme_mod('katori_wcm_title') ) : //Display the welcome area on the front page?>	
		<div class="welcome">
			<div class="container">
				<?php if ( get_theme_mod('katori_wcm_photo') ) : ?>
					<div class="wcm-photo col-md-3 col-sm-3">
						<?php echo '<img src="' . esc_url(get_theme_mod('katori_wcm_photo')) . '">';  ?>
					</div>
				<?php endif; ?>
				<?php if ( get_theme_mod('katori_wcm_title') ) : ?>
					<h2 class="wcm-title col-md-9 col-sm-9">
						<?php echo html_entity_decode( esc_html( get_theme_mod('katori_wcm_title') ) );  ?>
					</h2>
				<?php endif; ?>	
				<?php if ( get_theme_mod('katori_wcm_textarea') ) : ?>
					<div class="wcm-text col-md-9 col-sm-9">
						<?php echo html_entity_decode(esc_textarea( get_theme_mod('katori_wcm_textarea') ));  ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	<?php endif; ?>	
	</header><!-- #masthead -->

	<?php if ( !is_page_template( 'page_front-page.php' ) ) : ?>
		<div id="content" class="site-content container clearfix">
	<?php else : ?>
		<div id="content" class="site-content clearfix">
	<?php endif; ?>
