<?php

/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 */

$guid = (int) get_input('guid');

if ($guid) {
	$entity = get_entity($guid);
		
	if (elgg_instanceof($entity, 'object', 'kaltura_video') && $entity->canEdit()) {
		$content = elgg_view("kaltura/edit", array('entity' => $entity));
	} else {
		register_error('kaltura_video:notfound');
		forward();
	}		
} else {
	// Create a new video
	$entry_id = get_input('entry_id');
	if ($entry_id) {
		$content = elgg_view("kaltura/edit", array('entity' => $entity));
	}
}



$params = array(
	'title' => elgg_echo('kalturavideo:label:editdetails'),
	'filter' => '',
	'content' => $content,
);

$body = elgg_view_layout("content", $params);

echo elgg_view_page($params['title'], $body);
