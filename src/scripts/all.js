var FW = FW || {};

/**
 *  Tel linkjes op desktop niet klikbaar
 */
(function() {
    if( !Modernizr.touchevents ) {
        $('a[href^="tel:"]').on('click', function(e) {
            e.preventDefault();
        });
    }
})();

/**
 * Fit video's op c-entry zetten
 */
$('.c-entry').fitVids();

/**
 * Fastclick uitvoeren
 *
 * https://github.com/ftlabs/fastclick
 * v 1.0.6
 */
FastClick.attach(document.body);

/**
 * Cookiemelding
 */
head.ready('cookie', function() {
	/* <?php //TODO: Deze url moet nog aangepast worden voor livegang ?> */
	var cm = new cookieMessage();
      	cm.defaults.mentionUrl = FW.Config.cookieurl;
      	cm.mentionCookies();
});
