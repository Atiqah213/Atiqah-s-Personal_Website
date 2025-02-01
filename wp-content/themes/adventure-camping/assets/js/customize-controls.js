( function( api ) {

	// Extends our custom "adventure-camping" section.
	api.sectionConstructor['adventure-camping'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );