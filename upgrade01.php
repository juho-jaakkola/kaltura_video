<?php
/**
 * @todo Convert some of the old video annotations to metadata.
 * @todo Add functionalities for running these updates automatically
 * when upgrading kaltura_video from Elgg 1.7 -version.
 */
 
require_once('../../engine/start.php');

admin_gatekeeper();

$entities = elgg_get_entities(array(
	'type' => 'object',
	'subtype' => 'kaltura_video',
));

echo "<pre>";

foreach ($entities as $entity) {
	/**
	 * Video rating averate was saved as annotation. Save it as metadata instead.
	 */
	
	// Old way:
	// $entity->annotate('kaltura_video_rating', $newrate, ACCESS_PUBLIC, $owner, "integer");

	$rating_averages = $entity->getAnnotations(array(
		'kaltura_video_rating',
		'limit' => false,
	));
	
	if (isset($rating_averages[0])) {
		$rating_average = $rating_averages[0];
		
		// @todo Convert kaltura_video_rating_average annotation to metadata.
		var_dump($rating_average);
		//$entity->rating_average = $rating_average;
		// $rating_average->delete();
		
		echo "<hr />";
	}
	
	/**
	 * Number of ratings was saved as annotations. Save it as metadata instead.
	 */
	// Old way:
	// $entity->annotate('kaltura_video_numvotes', $newcount, ACCESS_PUBLIC, $owner, "integer");
	
	// @todo Convert kaltura_video_numvotes annotation to metadata.
	
	$rating_num = $entity->getAnnotations(array(
		'kaltura_video_numvotes',
		'limit' => false,
	));
}

