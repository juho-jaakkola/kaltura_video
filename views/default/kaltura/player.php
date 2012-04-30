<?php
/**
 * View HTML5 video player
 * 
 * Get all available video flavors through Kaltura API.
 * 
 * @uses $vars['entity] KalturaVideo object
 */

$entity = elgg_extract('entity', $vars);
$entry_id = $entity->getEntryId();

try {
	$kmodel = KalturaModel::getInstance();
	$kmodel->startSession();
	
	$flavorAsset = $kmodel->client->flavorAsset;
	$results = $flavorAsset->getFlavorAssetsWithParams($entry_id);
	//$results = $flavorAsset->getWebPlayableByEntryId($entry_id);
} catch (Exception $e) {
	$message = elgg_echo('kaltura_video:error:video_not_found');
	register_error($message);
	forward('kaltura_video');
}

$plugin = elgg_get_plugin_from_id('kaltura_video');
$server_url = $plugin->kaltura_server_url;
$p = $plugin->partner_id;
$thumb = $plugin->kaltura_video_thumbnail;
?>
<video width="730" height="410" controls="true" poster="" class="video-js vjs-default-skin" id="video-js-player" data-setup="{}">

<?php
// Here we have all the available flavors
$formats = array();
$urls = array();
foreach($results as $result) {
	// Flavor Params can exist without Flavor Asset & vice versa. Skip if no flavor.
	if (empty($result->flavorAsset->id) ||
		empty($result->flavorParams->format)) {
		continue;
	}
	
	//$result->flavorAsset->height;
	//$result->flavorAsset->width;
	
	$format = $result->flavorParams->format;
	// We do not want to support flash
	if ($format === 'flv') {
		continue;
	}
	$ext = $result->flavorAsset->fileExt;	
	$id  = $result->flavorAsset->id;
	$entryId = $result->entryId;

	$url = "{$server_url}p/{$p}/sp/{$p}00/serveFlavor/flavorId/{$id}/name/{$id}.{$ext}";
	$video_source = "<source src=\"$url\" type=\"video/{$format}\" />";
	echo $video_source;

	// Save flavor url so it can be used in flavor selector
	$urls[$url] = $result->flavorParams->name;
}
?>
</video>

<?php

echo elgg_view('input/dropdown', array(
	'name' => 'video-selector',
	'id' => 'video-selector',
	'options_values' => $urls
));
