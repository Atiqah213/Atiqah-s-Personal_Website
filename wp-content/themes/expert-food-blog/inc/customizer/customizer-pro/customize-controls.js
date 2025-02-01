( function( api ) {

	// Extends our custom "expert-food-blog" section.
	api.sectionConstructor['expert-food-blog'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );