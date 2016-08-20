(function($) {
	if (typeof jQuery === 'undefined') { throw new Error('Bootstrap\'s JavaScript requires jQuery') }
	if (typeof map === 'undefined' || map === null) {
	    map = new ol.Map({target: 'map',renderer: 'canvas',layers: [],view: view});
	}


    $.fn.identify = function(options) {

        var opts = $.extend( {}, $.fn.hilight.defaults, options );
    }

    $.fn.identify.defaults = {
	    selectedLayer: "all",
	    map: window.map;
	};

	return this.each(function() {
        // Do something to each element here.
    });

	function debug( obj ) {
        if ( window.console && window.console.log ) {
            window.console.log( "hilight selection count: " + obj.length );
        }
    };

}(jQuery));