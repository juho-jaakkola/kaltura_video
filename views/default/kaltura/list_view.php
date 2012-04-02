<?php
/**
 * kaltura_video list view.
 */
 
$video = $vars['entity'];
$owner = $video->getOwnerEntity();

$owner_link = elgg_view('output/url', array(
	'href' => "kaltura_video/owner/$owner->username",
	'text' => $owner->name,
	'is_trusted' => true,
));
$author_text = elgg_echo('byline', array($owner_link));
$date = elgg_view_friendly_time($video->time_created);
$plays = elgg_echo("kalturavideo:label:plays", array(intval($metadata->kaltura_video_plays)));
$excerpt = elgg_get_excerpt($video->description);
$subtitle = "$author_text $date $comments_link $plays";
$tags = elgg_view('output/tags', array('tags' => $video->tags));

$metadata = elgg_view_menu('entity', array(
	'entity' => $video,
	'handler' => 'kaltura_video',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$params = array(
	'subtitle' => $subtitle,
	'metadata' => $metadata,
	'tags' => $tags,
	'content' => $excerpt,
);
$params = $params + $vars;

$list_body = elgg_view('object/elements/summary', $params);

$image = elgg_view_entity_icon($video);

$vars = array('class' => 'kalturavideoitem');
echo elgg_view_image_block($image, $list_body, $vars);