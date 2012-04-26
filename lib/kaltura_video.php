<?php
/**
 * kaltura_video helper functions
 *
 * @package KalturaVideo
 */

// @todo What would be the best way to include the api libraries?
include_once(elgg_get_plugins_path() . 'kaltura_video/kaltura/api_client/includes.php');

/**
 * Get page components to edit/create a video.
 *
 * @param string  $page     'edit' or 'new'
 * @param int     $guid     GUID
 * @return array
 */
function kaltura_video_get_page_content_edit($page, $guid = 0) {
	$return = array(
		'filter' => '',
	);

	$vars = array();
	//$vars['id'] = 'kaltura-video-edit';
	$vars['name'] = 'kaltura_video_post';
	$vars['class'] = 'elgg-form-alt';

	if ($page == 'edit') {
		$guid = get_input('guid');
		$video = get_entity($guid);

		$title = elgg_echo('kaltura_video:edit');

		if (elgg_instanceof($video, 'object', 'kaltura_video') && $video->canEdit()) {
			$vars['entity'] = $video;

			$title .= ": \"$video->title\"";

			$body_vars = kaltura_video_prepare_form_vars($video);
			$body_vars['entity'] = $video;

			elgg_push_breadcrumb($video->title, $video->getURL());
			elgg_push_breadcrumb(elgg_echo('edit'));

			$content = elgg_view_form('kaltura_video/save', $vars, $body_vars);
		} else {
			$content = elgg_echo('kaltura_video:error:cannot_edit_post');
		}
	} else {
		$entry_id = get_input('entryid');
		
		if (!$guid) {
			$container = elgg_get_logged_in_user_entity();
		} else {
			$container = get_entity($guid);
		}
		
		elgg_push_breadcrumb(elgg_echo('kaltura_video:add'));
		$body_vars = kaltura_video_prepare_form_vars();
		$body_vars['kaltura_video_id'] = $entry_id;

		$title = elgg_echo('kaltura_video:add') . " (entry_id: $entry_id)";
		$content = elgg_view_form('kaltura_video/save', $vars, $body_vars);
	}

	$return['title'] = $title;
	$return['content'] = $content;
	//$return['sidebar'] = $sidebar;
	return $return;	
}

function kaltura_video_get_page_content_list ($container_guid = NULL) {
	// @todo What does this do?
	define('everyonekaltura_video','true');
	
	// Get the current page's owner
	$page_owner = $_SESSION['user'];
	elgg_set_page_owner_guid($_SESSION['guid']);
	
	kaltura_video_register_title_button();
	
	$params['title'] = elgg_echo('kalturavideo:label:allvideos');
	
	$params['content'] = elgg_list_entities(array(
		'types' => 'object',
		'subtypes' => 'kaltura_video',
		'full_view' => FALSE,
	));
	
	// Get categories if they're enabled
	global $CONFIG;
	$params['content'] .= elgg_view('kaltura/categorylist', array(
		'baseurl' => $CONFIG->wwwroot . 'search/?subtype=kaltura_video&tagtype=universal_categories&tag=',
		'subtype' => 'kaltura_video'
	));
	
	//$params['content'] .= elgg_view('kaltura/kcw');
	
	$body = elgg_view_layout("content", $params);
	
	// Display page
	echo elgg_view_page($params['title'], $body);
}

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
		'kaltura_video_id' => NULL,
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
