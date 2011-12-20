<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Ivan Vergés <ivan@microstudi.net>
* @copyright Ivan Vergés 2010
* @link http://microstudi.net/elgg/
**/

// Get the specified blog post
$post = (int) get_input('videopost');

// If we can get out the blog post ...
if ($videopost = get_entity($post)) {

	// Set the page owner
	elgg_set_page_owner_guid($videopost->getOwnerGUID());
	$page_owner = get_entity($videopost->getOwnerGUID);

	// Set the title appropriately
	$params['title'] = $videopost->title;
	
	// Display the entity
	//$params['content'] = elgg_view("kaltura/view"); // old way
	$params['content'] = elgg_view_entity($videopost, array('full_view' => true));
	

	// Display through the correct canvas area
	$body = elgg_view_layout("content", $params );
} else {
	// If we're not allowed to see the post
	// Display the 'post not found' page instead
	$params['title'] = elgg_echo("kalturavideo:notfound");
	$body = elgg_view("kaltura/notfound");
}

// Display the page
echo elgg_view_page($params['title'], $body);
