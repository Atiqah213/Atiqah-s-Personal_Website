( function( api ) {

	// Extends our custom "street-food-truck" section.
	api.sectionConstructor['street-food-truck'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );