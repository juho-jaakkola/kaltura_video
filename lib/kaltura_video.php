<?php
/**
 * kaltura_video helper functions
 *
 * @package KalturaVideo
 */

include_once(elgg_get_plugins_path() . 'kaltura_video/kaltura/api_client/includes.php');

/**
 * Pull together video variables for the save form
 *
 * @param KalturaVideo $entity
 * @return array
 */
function kaltura_video_prepare_form_vars($entity = NULL) {
	// input names => defaults
	$values = array(
		'title' => NULL,
		'description' => NULL,
		'access_id' => ACCESS_DEFAULT,
		'comments_on' => 'On',
		'rating_on' => 'On',
		'collaborate_on' => 'On',
		'tags' => NULL,
		'container_guid' => NULL,
		'guid' => NULL,
	);

	if ($entity) {
		foreach (array_keys($values) as $field) {
			if (isset($entity->$field)) {
				$values[$field] = $entity->$field;
			}
		}
	}

	if (elgg_is_sticky_form('kaltura_video')) {
		$sticky_values = elgg_get_sticky_values('kaltura_video');
		foreach ($sticky_values as $key => $value) {
			$values[$key] = $value;
		}
	}
	
	elgg_clear_sticky_form('kaltura_video');

	if (!$entity) {
		return $values;
	}

	return $values;
}
