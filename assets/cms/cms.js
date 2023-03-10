(function($) {

	var methods = {

		init: function(options) {
			return this.each(function() {
				var opt = $.extend({
					// data: {}
				}, options);

				var cms = $(this);

				cms.sortable();

			});
		}

	};

	$.fn.cms = function(method) {

		if ( methods[method] ) {
			return methods[method].apply( this, Array.prototype.slice.call( arguments, 1 ));
		} else if ( typeof method === 'object' || ! method ) {
			return methods.init.apply( this, arguments );
		} else {
			$.error( 'Method ' +  method + ' does not exist on jQuery.cms' );
		}    

	};

	$.fn.cms.modules = [];

})(jQuery);

$(function() {
	$('body').cms();
});
