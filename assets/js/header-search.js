/**
 * Header Search JS
 *
 * @package GT Drive
 */

( function( $ ) {

	$( document ).ready( function() {
		var searchToggle = $( '#masthead .header-main .header-search-button .header-search-icon' );
		var searchForm = $( '.site .header-search-dropdown' );

		function closeSearchForm() {
			searchForm.removeClass( 'active' ).hide();
			searchToggle.attr( 'aria-expanded', searchForm.hasClass( 'active' ) );
		}

		// Add an initial value for the attribute.
		searchToggle.attr( 'aria-expanded', 'false' );

		/* Display and hide Search Form when search icon is clicked */
		searchToggle.click( function(e) {
			searchForm.toggle().toggleClass( 'active' );
			searchForm.find( '.search-form .search-field' ).focus();

			$( this ).attr( 'aria-expanded', searchForm.hasClass( 'active' ) );
			e.stopPropagation();
		});

		/* Close search form if Escape key is pressed */
		$( document ).keyup(function(e) {
			if ( e.which == 27 ) {
				closeSearchForm();
			}
		});

		/* Do not close search form if click is inside header search dropdown */
		searchForm.find( '.header-search-form' ).click( function(e) {
			e.stopPropagation();
		});

		/* Close search form if click is outside header search element */
		$( document ).click( function() {
			closeSearchForm();
		});
	} );

} )( jQuery );
