<?php
/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 */

// @todo This code should be in file 'forms/kaltura_video/edit'.

elgg_load_library('kaltura_video');

$guid = get_input('guid');

// Set title, form destination
if (isset($vars['entity'])) {
	$action = "kaltura_video/update";
	$title = $vars['entity']->title;
	$body = $vars['entity']->description;
	$tags = $vars['entity']->tags;
	$access_id = $vars['entity']->access_id;
	
	if ($guid && $access_id == ACCESS_PRIVATE) {
		$access_id = get_default_access();
		$vars['entity']->access_id = $access_id;
		$vars['entity']->save();
	}
} else  {
	forward();
}

$entity = get_entity($guid);
$body_vars = kaltura_video_prepare_form_vars($entity);
$body_vars['entity'] = $entity;

echo elgg_view_form('kaltura_video/save', $form_vars, $body_vars);

$form = elgg_view('input/form', array(
	'action' => "{$vars['url']}action/$action",
	'body' => $form_body,
	'id' => 'kalturaPostForm'
));
//echo $form;

