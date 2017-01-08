/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
	// Primary color
	wp.customize('katori_primary_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-main .comment-navigation a, .site-main .paging-navigation a, .site-main .post-navigation a, .widget-title, .widgettitle, .site-title a, .social-navigation li a, .wcm-title span, .wcm-text span, .portfolio-title span').css('color', newval );
			$('.menu-toggle, #filter .active, .sidebar-toggle').css('background-color', newval );
			$('#filter a, .welcome .container, .widget-title, .widgettitle, .home.page .menu-toggle, .comment-navigation .nav-previous, .paging-navigation .nav-previous, .post-navigation .nav-previous, .comment-navigation .nav-next, .paging-navigation .nav-next, .post-navigation .nav-next').css('border-color', newval );
		} );
	});
	// Secondary color
	wp.customize('katori_secondary_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-header, .main-navigation li, .site-footer, .overlay, .portfolio-title, #filter, .widget-area').css('background-color', newval );
			$('.home .type-jetpack-portfolio, .small-thumb').css('border-color', newval );
		} );
	});
	// Portfolio color
	wp.customize('katori_portfolio_color',function( value ) {
		value.bind( function( newval ) {
			$('.item-overlay, .icon-left, .icon-right').css('background-color', newval );
		} );
	});	
	// Site title
	wp.customize('katori_site_title_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-title a').css('color', newval );
		} );
	});
	// Site description
	wp.customize('katori_site_desc_color',function( value ) {
		value.bind( function( newval ) {
			$('.site-description').css('color', newval );
		} );
	});
	// Entry title
	wp.customize('katori_entry_title_color',function( value ) {
		value.bind( function( newval ) {
			$('.entry-title, .entry-title a').css('color', newval );
		} );
	});
	// Body text color
	wp.customize('katori_body_text_color',function( value ) {
		value.bind( function( newval ) {
			$('body').css('color', newval );
		} );
	});

	// Welcome area padding
	wp.customize('katori_wcm_padding',function( value ) {
		value.bind( function( newval ) {
			$('.welcome .container').css('padding', newval + 'px' );
		} );
	});
	// Font sizes
	wp.customize('katori_h1_size',function( value ) {
		value.bind( function( newval ) {
			$('h1').css('font-size', newval + 'px' );
		} );
	});	
    wp.customize('katori_h2_size',function( value ) {
        value.bind( function( newval ) {
            $('h2').css('font-size', newval + 'px' );
        } );
    });	
    wp.customize('katori_h3_size',function( value ) {
        value.bind( function( newval ) {
            $('h3').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('katori_h4_size',function( value ) {
        value.bind( function( newval ) {
            $('h4').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('katori_h5_size',function( value ) {
        value.bind( function( newval ) {
            $('h5').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('katori_h6_size',function( value ) {
        value.bind( function( newval ) {
            $('h6').css('font-size', newval + 'px' );
        } );
    });
    wp.customize('katori_body_size',function( value ) {
        value.bind( function( newval ) {
            $('body').css('font-size', newval + 'px' );
        } );
    });        
} )( jQuery );
