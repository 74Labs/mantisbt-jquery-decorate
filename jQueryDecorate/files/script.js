/*
 * jquery.decorate
 * 
 * Copyright (c) 2009 Tomasz Stanczyk (tomasz.stanczyk@gmail.com)
 * 
 * Version: 1.0.0
 */
( function($) {
	$.fn.extend( {
		decorate : function(options) {
			var options = $.extend( {
				cssClass : '',
				prefix : '',
				suffix : ''
			}, options);
			$(this).each( function() {
				$(this).addClass(options.cssClass).prepend(options.prefix).append(options.suffix);
			});
		}
	})
})(jQuery);