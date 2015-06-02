BTCJ = jQuery.noConflict();
jQuery(document).ready(function () {
	if (typeof(btcModuleIds) != 'undefined') {
		for (var i = 0; i < btcModuleIds.length; i++) {
			jQuery('#btcontentsliderr' + btcModuleIds[i]).css("direction", "ltr");
			jQuery('#btcontentsliderr' + btcModuleIds[i]).fadeIn("fast");
			
			if(btcModuleOpts[i].width=='auto'){
				jQuery('#btcontentsliderr' + btcModuleIds[i] + ' .slide').width(jQuery('#btcontentsliderr' + btcModuleIds[i] + ' .slide').width());
			}
			
			BTCJ('#btcontentsliderr' + btcModuleIds[i]).slides(btcModuleOpts[i]);
			if (jQuery("html").css("direction") == "rtl") {
				jQuery('#btcontentsliderr' + btcModuleIds[i] + ' .slides_control2').css("direction", "rtl");
			}
		}
	}
	jQuery('img.hovereffect').hover(function () {
		jQuery(this).stop(true).animate({
			opacity : 0.5
		}, 300)
	}, function () {
		jQuery(this).animate({
			opacity : 1
		}, 300)
	})
})
