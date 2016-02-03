var FW = FW || {};


/**
 * Create Cookie
 * source: http://www.quirksmode.org/js/cookies.html
 */
createCookie = function( name, value, days ) {
	var expires = '';

		if ( days ) {
			var date = new Date();
			date.setTime( date.getTime() + ( days * 24 * 60 * 60 * 1000 ) );
			expires = '; expires=' + date.toGMTString();
		}

	document.cookie = name + '=' + value + expires + '; path=/' ;
};


/**
 * Read Cookie
 * source: http://www.quirksmode.org/js/cookies.html
 */
readCookie = function( name ) {
	var nameEQ = name + "=",
		ca = document.cookie.split(';');

	for( var i=0; i < ca.length; i++ ) {
		var c = ca[i];

		while ( c.charAt(0) == ' ' ) {
			c = c.substring( 1, c.length );
		}

		if ( c.indexOf(nameEQ) === 0 ) {
			return c.substring( nameEQ.length, c.length );
		}
	}
	return null;
};


/**
 * Erase Cookie
 * source: http://www.quirksmode.org/js/cookies.html
 */
eraseCookie = function( name ) {
	createCookie( name, '', -1 );
};


/**
 * Avoid `console` errors in browsers that lack a console.
 */
(function() {
		var method;
		var noop = function () {};
		var methods = [
				'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
				'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
				'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
				'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
		];
		var length = methods.length;
		var console = (window.console = window.console || {});

		while (length--) {
				method = methods[length];

				// Only stub undefined methods.
				if (!console[method]) {
						console[method] = noop;
				}
		}
}());
