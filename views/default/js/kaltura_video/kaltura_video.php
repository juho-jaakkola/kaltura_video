<?php
/**
 * Change video flavor
 *
 * @package KalturaVideo
 */
?>
elgg.provide('elgg.kaltura');

/**
 * Change the video flavor
 */
elgg.kaltura.init = function() {
	$('#video-selector').change(function () {
		var videoFlavor = $('#video-selector').val();
		var player = _V_("video-js-player");
		
		player.ready(function(){
			// Save the current video position
			currentTime = this.currentTime()
			// Change the video source url
			this.src(videoFlavor);
			this.play();
			
			// @fixme For some reason this causes a DOMException
			// this.currentTime(currentTime);
	    });
	})
};

elgg.register_hook_handler('init', 'system', elgg.kaltura.init);