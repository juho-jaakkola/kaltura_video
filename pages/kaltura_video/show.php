<?php
/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 */

// Get the specified blog post
$guid = get_input('guid');

// If we can get out the blog post ...
if ($video = get_entity($guid)) {
	elgg_set_page_owner_guid($video->getOwnerGUID());

	$params['title'] = $video->title;
	$params['content'] = elgg_view_entity($video, array('full_view' => true));
} else {
	// If we're not allowed to see the post
	// Display the 'post not found' page instead
	$params['title'] = elgg_echo("kalturavideo:notfound");
	$params['content'] = elgg_view("kaltura/notfound");
}

$params['filter'] = '';
$body = elgg_view_layout("content", $params);

// Display the page
echo elgg_view_page($params['title'], $body);
