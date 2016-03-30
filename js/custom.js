jQuery( document ).ready( function($) {

	/*==== RESPONSIVE PRIMARY MENU SETUP ====*/
	if ( $( '#menu-primary-items' ).length ) {
		$('#toggle-primary-menu').click(function(){
			$(this).next().slideToggle();
		});
	}

	/* ===== FITVIDS ===== */
	$('#content').fitVids({ customSelector: "iframe[src*='wordpress.tv'], iframe[src*='www.dailymotion.com'], iframe[src*='blip.tv'], iframe[src*='www.viddler.com']"});

	if ( typeof cdVars !== "undefined" ) { /* Check if countdown widget is active. */
		$( '#mosalon-countdown' ).countdown({
			date: cdVars.date,
		    day_s: cdVars.day_s,
		    day_m: cdVars.day_m,
		    hour_s: cdVars.hour_s,
		    hour_m: cdVars.hour_m,
		    min_s: cdVars.min_s,
		    min_m: cdVars.min_m,
		    sec_s: cdVars.sec_s,
		    sec_m: cdVars.sec_m
		});
	}

});