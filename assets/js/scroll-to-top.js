/* global gtDriveScrollButton */
/**
 * Scroll to Top Button
 *
 * @package GT Drive
 */

( function( $ ) {

	/**--------------------------------------------------------------
	# Scroll to Top Feature
	--------------------------------------------------------------*/
	$.fn.scrollToTop = function() {

		var scrollButton = $( this );

		/* Hide Button by default */
		scrollButton.hide();

		/* Show Button on scroll down */
		var showButton = function() {

			var window_top = $( window ).scrollTop();

			if ( window_top > 150 ) {
				scrollButton.fadeIn( 200 );
			} else {
				scrollButton.fadeOut( 200 );
			}
		}

		showButton();
		$( window ).scroll( showButton );

		/* Scroll Up when Button is clicked */
		scrollButton.click( function () {
			$( 'html, body' ).animate( { scrollTop: 0 }, 300 );
			return false;
		} );
	};

	/**--------------------------------------------------------------
	# Setup Scroll Button
	--------------------------------------------------------------*/
	$( document ).ready( function() {

		/* Add Button to HTML DOM */
		$( 'body' ).append( '<button id=\"scroll-to-top\" class=\"scroll-to-top-button\">' + gtDriveScrollButton + '</button>' );

		/* Add Scroll To Top Functionality */
		$( '#scroll-to-top' ).scrollToTop();

	} );

} )( jQuery );
