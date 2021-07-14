/**
 * Customizer Controls JS
 *
 * Adds Javascript for Customizer Controls.
 *
 * @package GT Drive
 */

( function( wp, $ ) {

	// Based on https://make.xwp.co/2016/07/24/dependently-contextual-customizer-controls/
	wp.customize( 'custom_logo', function( setting ) {
		setting.bind( function( value ) { 
			if ( '' !== value ) {
				// Set retina logo option to false when a new logo image is uploaded.
				wp.customize.instance( 'gt_drive_theme_options[retina_logo]' ).set( false );
			}
		});

		var setupControl = function( control ) {
			var setActiveState, isDisplayed;
			isDisplayed = function() {
				return '' !== setting.get();
			};
			setActiveState = function() {
				control.active.set( isDisplayed() );
			};
			setActiveState();
			setting.bind( setActiveState );
			control.active.validate = isDisplayed;
		};
		wp.customize.control( 'gt_drive_theme_options[retina_logo_title]', setupControl );
		wp.customize.control( 'gt_drive_theme_options[retina_logo]', setupControl );
	} );

	/**
	 * The Customizer looks for wp.customizer.controlConstructor[type] functions
	 * where type == the type member of a WP_Customize_Control
	 */
	wp.customize.controlConstructor.gt_drive_custom_font = wp.customize.Control.extend({
		/**
		 * This method is called when the control is ready to run.
		 */
		ready: function() {

			// Grab the bits of data from the title for specifying this control. this.container is a jQuery object of your container.
			var data = this.container.find( '.customize-control-title' ).data();

			// Use specific l10n data for this control where available.
			this.l10n = data.l10n;

			// Set default font.
			this.font = data.font;

			// Set up button elements. Cache for re-use.
			this.$btnContainer = this.container.find( '.actions' );
			this.$btnStandard = $( '<button type="button" class="button standard">' + this.l10n.standard + '</button>' ).prependTo( this.$btnContainer );
			this.$btnNext = $( '<button type="button" class="button next" title="' + this.l10n.next + '">&raquo;</button>' ).prependTo( this.$btnContainer );
			this.$btnPrevious = $( '<button type="button" class="button previous" title="' + this.l10n.previous + '">&laquo;</button>' ).prependTo( this.$btnContainer );

			// Handy shortcut so we don't have to us _.bind every time we add a callback.
			_.bindAll( this, 'standard', 'next', 'previous' );

			this.$btnStandard.on( 'click', this.standard );
			this.$btnNext.on( 'click', this.next );
			this.$btnPrevious.on( 'click', this.previous );

		},
		/**
		 * Called when the "Default" link is clicked. Sets the font to the default theme font
		 *
		 * @param  {object} event jQuery Event object from click event
		 */
		standard: function( event ) {
			event.preventDefault();
			var select = this.container.find( 'select' );

			select.val( this.font );
			select.trigger( 'change' );
		},
		/**
		 * Called when the "Next" link is clicked. Iterates to the next value in the select field.
		 *
		 * @param  {object} event jQuery Event object from click event
		 */
		next: function( event ) {
			event.preventDefault();
			var select = this.container.find( 'select' );
			var current = select.find( 'option[value="' + select.val() + '"]' );
			var next = this.nextOrFirst( current );

			select.val( next.val() );
			select.trigger( 'change' );
		},
		/**
		 * Called when the "Previous" link is clicked. Iterates to the previous value in the select field.
		 *
		 * @param  {object} event jQuery Event object from click event
		 */
		previous: function( event ) {
			event.preventDefault();
			var select = this.container.find( 'select' );
			var current = select.find( 'option[value="' + select.val() + '"]' );
			var previous = this.prevOrLast( current );

			select.val( previous.val() );
			select.trigger( 'change' );
		},
		/**
		 * Get Next Font
		 * Works like next(), except gets the first item from siblings if there is no "next" sibling to get.
		 */
		nextOrFirst: function(selector) {
			var next = selector.next();
			return (next.length) ? next : selector.prevAll().last();
		},
		/**
		 * Get Previous Font
		 * Works like prev(), except gets the last item from siblings if there is no "prev" sibling to get.
		 */
		prevOrLast: function(selector) {
			var prev = selector.prev();
			return (prev.length) ? prev : selector.nextAll().last();
		}
	});
})( this.wp, jQuery );
