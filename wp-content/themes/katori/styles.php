<?php


//Dynamic styles
function katori_custom_styles($custom) {
	//Primary color
	$katori_primary_color = esc_html(get_theme_mod( 'katori_primary_color' ));
	if ( isset($katori_primary_color) && ( $katori_primary_color != '#FF4040' ) ) {
		$custom = ".site-main .comment-navigation a, .site-main .paging-navigation a, .site-main .post-navigation a, .widget-title, .widgettitle, .site-title a, .social-navigation li a, .wcm-title span, .wcm-text span, .portfolio-title span { color: {$katori_primary_color}; }"."\n";
		$custom .= ".menu-toggle, #filter .active, .item-overlay, .icon-left, .icon-right, .sidebar-toggle { background-color: {$katori_primary_color}; }"."\n";
		$custom .= "#filter a, .welcome .container, .widget-title, .widgettitle, .home.page .menu-toggle, .comment-navigation .nav-previous, .paging-navigation .nav-previous, .post-navigation .nav-previous, .comment-navigation .nav-next, .paging-navigation .nav-next, .post-navigation .nav-next { border-color: {$katori_primary_color}; }"."\n";
	}
	//Secondary color
	$katori_secondary_color = esc_html(get_theme_mod( 'katori_secondary_color' ));
	if ( isset($katori_secondary_color) && ( $katori_secondary_color != '#292c32' ) ) {
		$custom .= ".site-header, .main-navigation li, .site-footer, .overlay, .portfolio-title, #filter, .widget-area { background-color: {$katori_secondary_color}; }"."\n";
		$custom .= ".home .type-jetpack-portfolio, .small-thumb { border-color: {$katori_secondary_color}; }"."\n";
	}
	//Portfolio color
	$katori_portfolio_color = esc_html(get_theme_mod( 'katori_portfolio_color' ));
	if ( isset($katori_portfolio_color) && ( $katori_portfolio_color != '#FFB340' ) ) {
		$custom .= ".item-overlay, .icon-left, .icon-right { background-color: {$katori_portfolio_color}; }"."\n";
	}	
	//Site title
	$site_title = esc_html(get_theme_mod( 'katori_site_title_color' ));
	if ( isset($site_title) && ( $site_title != '#FF4040' )) {
		$custom .= ".site-title a { color: {$site_title}; }"."\n";
	}
	//Site description
	$site_desc = esc_html(get_theme_mod( 'katori_site_desc_color' ));
	if ( isset($site_desc) && ( $site_desc != '#fff' )) {
		$custom .= ".site-description { color: {$site_desc}; }"."\n";
	}	
	//Entry title
	$entry_title = esc_html(get_theme_mod( 'katori_entry_title_color' ));
	if ( isset($entry_title) && ( $entry_title != '#505050' )) {
		$custom .= ".entry-title, .entry-title a { color: {$entry_title}; }"."\n";
	}
	//Body text
	$body_text = esc_html(get_theme_mod( 'katori_body_text_color' ));
	if ( isset($body_text) && ( $body_text != '#838383' )) {
		$custom .= "body { color: {$body_text}; }"."\n";
	}

	//Welcome area border
	if ( get_theme_mod( 'katori_wcm_border' )) {
		$custom .= ".welcome .container { border: 0; }"."\n";
	}
	//Welcome area padding
	$katori_wcm_padding = get_theme_mod( 'katori_wcm_padding' );
	if ( get_theme_mod( 'katori_wcm_padding' )) {
		$custom .= ".welcome .container { padding:" . intval($katori_wcm_padding) . "px; }"."\n";
	}
	
	
	//Fonts
	$headings_font = esc_html(get_theme_mod('katori_headings_fonts'));	
	$body_font = esc_html(get_theme_mod('katori_body_fonts'));	
	
	if ( $headings_font ) {
		$font_pieces = explode(":", $headings_font);
		$custom .= "h1, h2, h3, h4, h5, h6 { font-family: {$font_pieces[0]}; }"."\n";
	}
	if ( $body_font ) {
		$font_pieces = explode(":", $body_font);
		$custom .= "body { font-family: {$font_pieces[0]}; }"."\n";
	}
	//H1 size
	$katori_h1_size = get_theme_mod( 'katori_h1_size' );
	if ( get_theme_mod( 'katori_h1_size' )) {
		$custom .= "h1 { font-size:" . intval($katori_h1_size) . "px; }"."\n";
	}
    //H2 size
    $katori_h2_size = get_theme_mod( 'katori_h2_size' );
    if ( get_theme_mod( 'katori_h2_size' )) {
        $custom .= "h2 { font-size:" . intval($katori_h2_size) . "px; }"."\n";
    }
    //H3 size
    $katori_h3_size = get_theme_mod( 'katori_h3_size' );
    if ( get_theme_mod( 'katori_h3_size' )) {
        $custom .= "h3 { font-size:" . intval($katori_h3_size) . "px; }"."\n";
    }
    //H4 size
    $katori_h4_size = get_theme_mod( 'katori_h4_size' );
    if ( get_theme_mod( 'katori_h4_size' )) {
        $custom .= "h4 { font-size:" . intval($katori_h4_size) . "px; }"."\n";
    }
    //H5 size
    $katori_h5_size = get_theme_mod( 'katori_h5_size' );
    if ( get_theme_mod( 'katori_h5_size' )) {
        $custom .= "h5 { font-size:" . intval($katori_h5_size) . "px; }"."\n";
    }
    //H6 size
    $katori_h6_size = get_theme_mod( 'katori_h6_size' );
    if ( get_theme_mod( 'katori_h6_size' )) {
        $custom .= "h6 { font-size:" . intval($katori_h6_size) . "px; }"."\n";
    }
    //Body size
    $katori_body_size = get_theme_mod( 'katori_body_size' );
    if ( get_theme_mod( 'katori_body_size' )) {
        $custom .= "body { font-size:" . intval($katori_body_size) . "px; }"."\n";
    }   
	//Output all the styles
	wp_add_inline_style( 'katori-style', $custom );	
}
add_action( 'wp_enqueue_scripts', 'katori_custom_styles' );