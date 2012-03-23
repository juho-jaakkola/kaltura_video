<?php
/**
 * Group kaltura_video module
 */

$group = elgg_get_page_owner_entity();

if ($group->kaltura_video_enable == "no") {
	return true;
}

$all_link = elgg_view('output/url', array(
	'href' => "kaltura_video/group/$group->guid/all",
	'text' => elgg_echo('link:view:all'),
	'is_trusted' => true,
));

elgg_push_context('widgets');
$options = array(
	'type' => 'object',
	'subtype' => 'kaltura_video',
	'container_guid' => elgg_get_page_owner_guid(),
	'limit' => 6,
	'full_view' => false,
	'pagination' => false,
);
$content = elgg_list_entities($options);
elgg_pop_context();

if (!$content) {
	$content = '<p>' . elgg_echo('kaltura_video:none') . '</p>';
}

// @todo This link should open the kcw in a lightbox
$new_link = elgg_view('output/url', array(
	'href' => "kaltura_video/add/$group->guid",
	'text' => elgg_echo('kaltura_video:write'),
	'is_trusted' => true,
));

echo elgg_view('groups/profile/module', array(
	'title' => elgg_echo('kaltura_video:group'),
	'content' => $content,
	'all_link' => $all_link,
	//'add_link' => $new_link,
));
