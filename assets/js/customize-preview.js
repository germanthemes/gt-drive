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
			var text_color, light_text_color, light_border_color, medium_border_color;

			if( isColorDark( newval ) ) {
				text_color          = '#ffffff';
				light_text_color    = 'rgba(255, 255, 255, 0.5)';
				light_border_color  = 'rgba(255, 255, 255, 0.1)';
				medium_border_color = 'rgba(255, 255, 255, 0.3)';
			} else {
				text_color          = '#303030';
				light_text_color    = 'rgba(0, 0, 0, 0.5)';
				light_border_color  = 'rgba(0, 0, 0, 0.1)';
				medium_border_color = 'rgba(0, 0, 0, 0.3)';
			}

			document.documentElement.style.setProperty( '--text-color', text_color );
			document.documentElement.style.setProperty( '--light-text-color', light_text_color );
			document.documentElement.style.setProperty( '--post-meta-color', light_text_color );
			document.documentElement.style.setProperty( '--light-border-color', light_border_color );
			document.documentElement.style.setProperty( '--widget-border-color', light_border_color );
			document.documentElement.style.setProperty( '--comments-border-color', light_border_color );
			document.documentElement.style.setProperty( '--medium-border-color', medium_border_color );
		} );
	} );

	/* Primary Color Option */
	wp.customize( 'gt_drive_theme_options[primary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--primary-color', newval );
		} );
	} );

	/* Secondary Color Option */
	wp.customize( 'gt_drive_theme_options[secondary_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--secondary-color', newval );
		} );
	} );

	/* Accent Color Option */
	wp.customize( 'gt_drive_theme_options[accent_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--accent-color', newval );
		} );
	} );

	/* Highlight Color Option */
	wp.customize( 'gt_drive_theme_options[highlight_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--highlight-color', newval );
		} );
	} );

	/* Light Gray Color Option */
	wp.customize( 'gt_drive_theme_options[light_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--light-gray-color', newval );
		} );
	} );

	/* Gray Color Option */
	wp.customize( 'gt_drive_theme_options[gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--gray-color', newval );
		} );
	} );

	/* Dark Gray Color Option */
	wp.customize( 'gt_drive_theme_options[dark_gray_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--dark-gray-color', newval );
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

			document.documentElement.style.setProperty( '--header-bar-color', newval );
			document.documentElement.style.setProperty( '--header-bar-text-color', text_color );
			document.documentElement.style.setProperty( '--header-bar-hover-color', hover_color );
		} );
	} );

	/* Header Bar Icon Color Option */
	wp.customize( 'gt_drive_theme_options[header_bar_icon_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--header-bar-icon-color', newval );
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

			document.documentElement.style.setProperty( '--header-color', newval );
			document.documentElement.style.setProperty( '--header-text-color', text_color );
			document.documentElement.style.setProperty( '--header-hover-color', hover_color );
		} );
	} );

	/* Title Color Option */
	wp.customize( 'gt_drive_theme_options[title_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-color', newval );
			document.documentElement.style.setProperty( '--widget-title-color', newval );
		} );
	} );

	/* Title Hover Color Option */
	wp.customize( 'gt_drive_theme_options[title_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-hover-color', newval );
			document.documentElement.style.setProperty( '--widget-title-hover-color', newval );
		} );
	} );

	/* Title Border Option */
	wp.customize( 'gt_drive_theme_options[title_border_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--title-border-color', newval );
			document.documentElement.style.setProperty( '--widget-title-border-color', newval );
		} );
	} );

	/* Link Color Option */
	wp.customize( 'gt_drive_theme_options[link_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--link-color', newval );
		} );
	} );

	/* Link Color Hover Option */
	wp.customize( 'gt_drive_theme_options[link_hover_color]', function( value ) {
		value.bind( function( newval ) {
			document.documentElement.style.setProperty( '--link-hover-color', newval );
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

			document.documentElement.style.setProperty( '--button-color', newval );
			document.documentElement.style.setProperty( '--button-text-color', text_color );
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

			document.documentElement.style.setProperty( '--button-hover-color', newval );
			document.documentElement.style.setProperty( '--button-text-hover-color', text_color );
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

			document.documentElement.style.setProperty( '--footer-background-color', newval );
			document.documentElement.style.setProperty( '--footer-text-color', text_color );
			document.documentElement.style.setProperty( '--footer-link-color', link_color );
			document.documentElement.style.setProperty( '--footer-link-hover-color', text_color );
			document.documentElement.style.setProperty( '--footer-border-color', border_color );
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
			document.documentElement.style.setProperty( '--text-font', newFont );
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
			document.documentElement.style.setProperty( '--title-font', newFont );
		} );
	} );

	/* Title Font Weight */
	wp.customize( 'gt_drive_theme_options[title_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--title-font-weight', fontWeight );
		} );
	} );

	/* Title Text Transform */
	wp.customize( 'gt_drive_theme_options[title_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--title-text-transform', textTransform );
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
			document.documentElement.style.setProperty( '--navi-font', newFont );
		} );
	} );

	/* Navi Font Weight */
	wp.customize( 'gt_drive_theme_options[navi_is_bold]', function( value ) {
		value.bind( function( newval ) {
			var fontWeight = newval ? 'bold' : 'normal';
			document.documentElement.style.setProperty( '--navi-font-weight', fontWeight );
		} );
	} );

	/* Navi Text Transform */
	wp.customize( 'gt_drive_theme_options[navi_is_uppercase]', function( value ) {
		value.bind( function( newval ) {
			var textTransform = newval ? 'uppercase' : 'none';
			document.documentElement.style.setProperty( '--navi-text-transform', textTransform );
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
		if (typeof gtDriveFontSettings === 'undefined') {
			return;
		}

		var defaultFonts = ['Arial', 'Arial Black', 'Courier New', 'Georgia', 'Helvetica',
			'Impact', 'Palatino, Palatino Linotype', 'SystemFontStack', 'Tahoma',
			'Trebuchet MS, Trebuchet', 'Times New Roman, Times', 'Verdana'];

		if( defaultFonts.includes( font ) ) {
			return;
		}

		var fontFile = font.split( " " ).join( "-" ).toLowerCase();
		var fontFileURL = gtDriveFontSettings.pluginURL + fontFile + ".css";

		var fontStylesheet = "<link id='gt-drive-custom-" + type + "' href='" + fontFileURL + "' rel='stylesheet' type='text/css'>";
		var checkLink = $( "head" ).find( "#gt-drive-custom-" + type ).length;

		if (checkLink > 0) {
			$( "head" ).find( "#gt-drive-custom-" + type ).remove();
		}
		$( "head" ).append( fontStylesheet );
	}

} )( jQuery );
