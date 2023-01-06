( function( api ) {

	// Extends our custom "vw-church" section.
	api.sectionConstructor['vw-church'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );