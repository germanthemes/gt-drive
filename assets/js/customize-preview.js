/**
 * Customizer Live Preview
 *
 * Reloads changes on Theme Customizer Preview asynchronously for better usability
 *
 * @package GT Drive
 */

( function( $ ) {

	// Site Title textfield.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );

	// Site Description textfield.
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Site Title checkbox.
	wp.customize( 'gt_drive_theme_options[site_title]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'site-title-hidden' );
			} else {
				$( 'body' ).removeClass( 'site-title-hidden' );
			}
		} );
	} );

	// Site Description checkbox.
	wp.customize( 'gt_drive_theme_options[site_description]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'site-description-hidden' );
			} else {
				$( 'body' ).removeClass( 'site-description-hidden' );
			}
		} );
	} );

	/* Phone Number textfield. */
	wp.customize( 'gt_drive_theme_options[header_phone]', function( value ) {
		value.bind( function( to ) {
			$( '.header-bar .header-bar-content .header-phone-text' ).text( to );
		} );
	} );

	/* Email address textfield. */
	wp.customize( 'gt_drive_theme_options[header_email]', function( value ) {
		value.bind( function( to ) {
			$( '.header-bar .header-bar-content .header-email-text' ).text( to );
		} );
	} );

	/* Location textfield. */
	wp.customize( 'gt_drive_theme_options[header_address]', function( value ) {
		value.bind( function( to ) {
			$( '.header-bar .header-bar-content .header-address-text' ).text( to );
		} );
	} );

	/* Header Search checkbox */
	wp.customize( 'gt_drive_theme_options[header_search]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'header-search-hidden' );
				$( 'body' ).removeClass( 'header-search-enabled' );
				$( 'body' ).removeClass( 'header-search-and-main-navigation-active' );
			} else {
				$( 'body' ).addClass( 'header-search-enabled' );
				$( 'body' ).removeClass( 'header-search-hidden' );

				if ( $( '.site-header .header-main .primary-navigation' ).length > 0 ) {
					$( 'body' ).addClass( 'header-search-and-main-navigation-active' );
				}
			}
		} );
	} );

	/* Scroll to Top checkbox */
	wp.customize( 'gt_drive_theme_options[scroll_to_top]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'scroll-to-top-hidden' );
			} else {
				$( 'body' ).removeClass( 'scroll-to-top-hidden' );
			}
		} );
	} );

	// Post Date checkbox.
	wp.customize( 'gt_drive_theme_options[meta_date]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'date-hidden' );
			} else {
				$( 'body' ).removeClass( 'date-hidden' );
			}
		} );
	} );

	// Post Author checkbox.
	wp.customize( 'gt_drive_theme_options[meta_author]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'author-hidden' );
			} else {
				$( 'body' ).removeClass( 'author-hidden' );
			}
		} );
	} );

	// Post Category checkbox.
	wp.customize( 'gt_drive_theme_options[meta_categories]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'categories-hidden' );
			} else {
				$( 'body' ).removeClass( 'categories-hidden' );
			}
		} );
	} );

	// Post Tags checkbox.
	wp.customize( 'gt_drive_theme_options[meta_tags]', function( value ) {
		value.bind( function( newval ) {
			if ( false === newval ) {
				$( 'body' ).addClass( 'tags-hidden' );
			} else {
				$( 'body' ).removeClass( 'tags-hidden' );
			}
		} );
	} );

	/* Background Color Option */
	wp.customize( 'background_color', function( value ) {
		value.bind( function( newval ) {
			var text_color, light_text_color, light_background_color, medium_background_color, light_border_color, medium_border_color;

			if( isColorDark( newval ) ) {
				text_color              = '#ffffff';
				light_text_color        = 'rgba(255, 255, 255, 0.5)';
				light_background_color  = 'rgba(255, 255, 255, 0.05)';
				medium_background_color = 'rgba(255, 255, 255, 0.15)';
				light_border_color      = 'rgba(255, 255, 255, 0.1)';
				medium_border_color     = 'rgba(255, 255, 255, 0.3)';
			} else {
				text_color              = '#303030';
				light_text_color        = 'rgba(0, 0, 0, 0.5)';
				light_background_color  = 'rgba(0, 0, 0, 0.05)';
				medium_background_color = 'rgba(0, 0, 0, 0.15)';
				light_border_color      = 'rgba(0, 0, 0, 0.1)';
				medium_border_color     = 'rgba(0, 0, 0, 0.3)';
			}

			document.documentElement.style.setProperty( '--gt-drive--text-color', text_color );
			document.documentElement.style.setProperty( '--gt-drive--light-text-color', light_text_color );
			document.documentElement.style.setProperty( '--gt-drive--light-background-color', light_background_color );
			document.documentElement.style.setProperty( '--gt-drive--medium-background-color', medium_background_color );
			document.documentElement.style.setProperty( '--gt-drive--post-meta-color', light_text_color );
			document.documentElement.style.setProperty( '--gt-drive--light-border-color', light_border_color );
			document.documentElement.style.setProperty( '--gt-drive--widget-border-color', light_border_color );
			document.documentElement.style.setProperty( '--gt-drive--comments-border-color', light_border_color );
			document.documentElement.style.setProperty( '--gt-drive--medium-border-color', medium_border_color );
		} );
	} );

	/* Primary Color Option */
	wp.customize( 'gt_drive_theme_options[primary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--primary-color', newval );
		} );
	} );

	/* Secondary Color Option */
	wp.customize( 'gt_drive_theme_options[secondary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--secondary-color', newval );
		} );
	} );

	/* Accent Color Option */
	wp.customize( 'gt_drive_theme_options[accent_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--accent-color', newval );
		} );
	} );

	/* Highlight Color Option */
	wp.customize( 'gt_drive_theme_options[highlight_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--highlight-color', newval );
		} );
	} );

	/* Light Gray Color Option */
	wp.customize( 'gt_drive_theme_options[light_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--light-gray-color', newval );
		} );
	} );

	/* Gray Color Option */
	wp.customize( 'gt_drive_theme_options[gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--gray-color', newval );
		} );
	} );

	/* Dark Gray Color Option */
	wp.customize( 'gt_drive_theme_options[dark_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--dark-gray-color', newval );
		} );
	} );

	/* Header Bar Color Option */
	wp.customize( 'gt_drive_theme_options[header_bar_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, hover_color;

			if( isColorDark( newval ) ) {
				text_color = '#ffffff';
				hover_color = 'rgba(255, 255, 255, 0.5)';
			} else {
				text_color = '#303030';
				hover_color = 'rgba(0, 0, 0, 0.5)';
			}

			document.documentElement.style.setProperty( '--gt-drive--header-bar-color', newval );
			document.documentElement.style.setProperty( '--gt-drive--header-bar-text-color', text_color );
			document.documentElement.style.setProperty( '--gt-drive--header-bar-hover-color', hover_color );
		} );
	} );

	/* Header Bar Icon Color Option */
	wp.customize( 'gt_drive_theme_options[header_bar_icon_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--header-bar-icon-color', newval );
		} );
	} );

	/* Header Color Option */
	wp.customize( 'gt_drive_theme_options[header_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, hover_color;

			if( isColorLight( newval ) ) {
				text_color = 'rgba(0, 0, 0, 0.95)';
				hover_color = 'rgba(0, 0, 0, 0.5)';
			} else {
				text_color = '#ffffff';
				hover_color = 'rgba(255, 255, 255, 0.5)';
			}

			document.documentElement.style.setProperty( '--gt-drive--header-color', newval );
			document.documentElement.style.setProperty( '--gt-drive--header-text-color', text_color );
			document.documentElement.style.setProperty( '--gt-drive--header-hover-color', hover_color );
		} );
	} );

	/* Title Color Option */
	wp.customize( 'gt_drive_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--title-color', newval );
			document.documentElement.style.setProperty( '--gt-drive--widget-title-color', newval );
		} );
	} );

	/* Title Hover Color Option */
	wp.customize( 'gt_drive_theme_options[title_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--title-hover-color', newval );
			document.documentElement.style.setProperty( '--gt-drive--widget-title-hover-color', newval );
		} );
	} );

	/* Title Border Option */
	wp.customize( 'gt_drive_theme_options[title_border_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--title-border-color', newval );
			document.documentElement.style.setProperty( '--gt-drive--widget-title-border-color', newval );
		} );
	} );

	/* Link Color Option */
	wp.customize( 'gt_drive_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--link-color', newval );
		} );
	} );

	/* Link Color Hover Option */
	wp.customize( 'gt_drive_theme_options[link_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gt-drive--link-hover-color', newval );
		} );
	} );

	/* Button Color Option */
	wp.customize( 'gt_drive_theme_options[button_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = 'rgba(0, 0, 0, 0.95)';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--gt-drive--button-color', newval );
			document.documentElement.style.setProperty( '--gt-drive--button-text-color', text_color );
		} );
	} );

	/* Button Hover Color Option */
	wp.customize( 'gt_drive_theme_options[button_hover_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color;

			if( isColorLight( newval ) ) {
				text_color = 'rgba(0, 0, 0, 0.95)';
			} else {
				text_color = '#ffffff';
			}

			document.documentElement.style.setProperty( '--gt-drive--button-hover-color', newval );
			document.documentElement.style.setProperty( '--gt-drive--button-text-hover-color', text_color );
		} );
	} );

	/* Footer Color Option */
	wp.customize( 'gt_drive_theme_options[footer_color]', function( value ) {
		value.bind( function( newval ) {
			var text_color, link_color, border_color;

			if( isColorLight( newval ) ) {
				text_color   = 'rgba(0, 0, 0, 0.5)';
				link_color   = 'rgba(0, 0, 0, 0.95)';
				border_color = 'rgba(0, 0, 0, 0.1)';
			} else {
				text_color   = 'rgba(255, 255, 255, 0.5)';
				link_color   = 'rgba(255, 255, 255, 0.95)';
				border_color = 'rgba(255, 255, 255, 0.1)';
			}

			document.documentElement.style.setProperty( '--gt-drive--footer-background-color', newval );
			document.documentElement.style.setProperty( '--gt-drive--footer-text-color', text_color );
			document.documentElement.style.setProperty( '--gt-drive--footer-link-color', link_color );
			document.documentElement.style.setProperty( '--gt-drive--footer-link-hover-color', text_color );
			document.documentElement.style.setProperty( '--gt-drive--footer-border-color', border_color );
		} );
	} );

	/* Text Font */
	wp.customize( 'gt_drive_theme_options[text_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'text-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--gt-drive--text-font', newFont );
		} );
	} );

	/* Title Font */
	wp.customize( 'gt_drive_theme_options[title_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'title-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--gt-drive--title-font', newFont );
		} );
	} );

	/* Title Font Weight */
	wp.customize( 'gt_drive_theme_options[title_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--gt-drive--title-font-weight', fontWeight );
		} );
	} );

	/* Title Text Transform */
	wp.customize( 'gt_drive_theme_options[title_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--gt-drive--title-text-transform', textTransform );
		} );
	} );

	/* Navi Font */
	wp.customize( 'gt_drive_theme_options[navi_font]', function( value ) {
		value.bind( function( newval ) {

			// Load Font in Customizer.
			loadCustomFont( newval, 'navi-font' );

			// Set Font.
			var systemFont = '-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,Oxygen-Sans,Ubuntu,Cantarell,"Helvetica Neue",sans-serif';
			var newFont = newval === 'SystemFontStack' ? systemFont : newval;

			// Set CSS.
			document.documentElement.style.setProperty( '--gt-drive--navi-font', newFont );
		} );
	} );

	/* Navi Font Weight */
	wp.customize( 'gt_drive_theme_options[navi_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--gt-drive--navi-font-weight', fontWeight );
		} );
	} );

	/* Navi Text Transform */
	wp.customize( 'gt_drive_theme_options[navi_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--gt-drive--navi-text-transform', textTransform );
		} );
	} );

	function hexdec( hexString ) {
		hexString = ( hexString + '' ).replace( /[^a-f0-9]/gi, '' );
		return parseInt( hexString, 16 );
	}

	function getColorBrightness( hexColor ) {

		// Remove # string.
		hexColor = hexColor.replace( '#', '' );

		// Convert into RGB.
		var r = hexdec( hexColor.substring( 0, 2 ) );
		var g = hexdec( hexColor.substring( 2, 4 ) );
		var b = hexdec( hexColor.substring( 4, 6 ) );

		return ( ( ( r * 299 ) + ( g * 587 ) + ( b * 114 ) ) / 1000 );
	}

	function isColorLight( hexColor ) {
		return ( getColorBrightness( hexColor ) > 130 );
	}

	function isColorDark( hexColor ) {
		return ( getColorBrightness( hexColor ) <= 130 );
	}

	function loadCustomFont( font, type ) {
		var fontFile = font.split( " " ).join( "+" );
		var fontFileURL = "https://fonts.googleapis.com/css?family=" + fontFile + ":400,700";

		var fontStylesheet = "<link id='gt-drive-custom-" + type + "' href='" + fontFileURL + "' rel='stylesheet' type='text/css'>";
		var checkLink = $( "head" ).find( "#gt-drive-custom-" + type ).length;

		if (checkLink > 0) {
			$( "head" ).find( "#gt-drive-custom-" + type ).remove();
		}
		$( "head" ).append( fontStylesheet );
	}

} )( jQuery );
