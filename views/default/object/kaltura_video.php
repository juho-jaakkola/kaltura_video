<?php
/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 */

elgg_load_library('kaltura_video');

$video = elgg_extract('entity', $vars);
$full = elgg_extract('full_view', $vars);

// @todo If this check needed?
$metadata = kaltura_get_metadata($vars['entity']);
if (@empty($metadata->kaltura_video_id)) {
	$vars['entity']->delete();
	return false;
}

if ($full) {
	// Full view
	echo elgg_view('kaltura/view', $vars);
} elseif (elgg_in_context('gallery')) {
	// Gallery view
	$vars['use_link'] = false;
	$thumbnail = elgg_view('kaltura/thumbnail', $vars);
	$title = elgg_get_excerpt($video->title, 35);
	$text = "$thumbnail<h4>$title</h4>";
	
	$link = elgg_view('output/url', array(
		'href' => $video->getURL(),
		'text' => $text,
	));
	
	echo "<div class=\"video-gallery-item\">$link</div>";
} else {
	// List view
	echo elgg_view('kaltura/list_view', $vars);
}


/**
 * Some old Elgg 1.7 stuff:
 */

// This views a normal list of videos (not single video nor a list with editing functionalities for video owner)
// @todo This is propably not needed anymore in Elgg 1.8

/*
$owner = $vars['entity']->getOwnerEntity();
$access_id = $vars['entity']->access_id;

$group = get_entity($vars['entity']->container_guid);
if (!($group instanceof ElggGroup)) {
	$group = false;
}

list($votes, $rating_image, $rating) = kaltura_get_rating($vars['entity']);

$rating = round($rating);

// Get the number of comments
$num_comments = $vars['entity']->countComments();

$icon = '<a href="'.$vars['entity']->getURL().'">';
$icon .= '<img src="' . $metadata->kaltura_video_thumbnail . '" alt="' . htmlspecialchars($vars['entity']->title) . '" title="' . htmlspecialchars($vars['entity']->title) . '" />';
$icon .= '</a>';
$info = "<p class=\"shares_gallery_title\">". elgg_echo("kalturavideo:river:shared") .": <a href=\"";
$info .= $vars['entity']->getURL();
$info .= "\">{$vars['entity']->title}</a> ";
$info .= "</p>";
//when listing user videos is ok:
$info .= "<p class=\"owner_timestamp\">";
$info .= $metadata->kaltura_video_created." ";
$info .= elgg_echo('by')." <a href=\"{$vars['url']}pg/kaltura_video/{$owner->username}/\" title=\"".htmlspecialchars(elgg_echo("kalturavideo:user:showallvideos"))."\">{$owner->name}</a> ";
if ($group) {
	$info .= elgg_echo('ingroup')." <a href=\"{$vars['url']}pg/kaltura_video/{$group->username}/\" title=\"".htmlspecialchars(elgg_echo("kalturavideo:user:showallvideos"))."\">{$group->name}</a> ";
}
$info .= elgg_echo("kalturavideo:label:length"). ' <strong>'.$metadata->kaltura_video_length.'</strong> ';
$info .= elgg_echo("kalturavideo:label:plays"). ' <strong>'.((int)$metadata->kaltura_video_plays).'</strong>';

if ($metadata->kaltura_video_rating_on != 'Off') {
	$info .= " ".elgg_echo("kalturavideo:rating").": <strong>".$rating."</strong>";
}

if ($num_comments && $metadata->kaltura_video_comments_on != 'Off') {
	$info .= ", <a href=\"{$vars['entity']->getURL()}\">".sprintf(elgg_echo("comments")). " (" . $num_comments . ")</a>";
}

$info .= "</p>";

if (get_input('search_viewtype') == "gallery") {
	//display
	$info = '<p class="shares_gallery_title">'.$icon.'</p>';
	$info .= "<p class=\"shares_gallery_title\"><a href=\"";
	$info .= $vars['entity']->getURL();
	$info .= "\">{$vars['entity']->title}</a> ";
	$info .= "</p>";
	$info .= "<p class=\"shares_gallery_user\">";
	$info .= elgg_echo("kalturavideo:label:length"). ' <strong>'.$metadata->kaltura_video_length.'</strong> ';
	$info .= elgg_echo("kalturavideo:label:plays"). ' <strong>'.intval($metadata->kaltura_video_plays).'</strong>';
	$info .= "</p>";
	//when listing user videos is ok:
	$info .= "<p class=\"shares_gallery_user\"><a href=\"{$vars['url']}pg/kaltura_video/{$owner->username}/\">{$owner->name}</a> ";
	if ($group) {
		$info .= elgg_echo('ingroup')." <a href=\"{$vars['url']}pg/kaltura_video/{$group->username}/\" title=\"".htmlspecialchars(elgg_echo("kalturavideo:user:showallvideos"))."\">{$group->name}</a> ";
	}

	$info .= '<span class="shared_timestamp">'.$metadata->kaltura_video_created.'</span>';

	if ($metadata->kaltura_video_rating_on != 'Off') {
		$info .= " ".elgg_echo("kalturavideo:rating").": <strong>".$rating."</strong>";
	}

	if ($num_comments && $metadata->kaltura_video_comments_on != 'Off')
		$info .= ", <a href=\"{$vars['entity']->getURL()}\">".sprintf(elgg_echo("comments")). " (" . $num_comments . ")</a>";


	echo "<div class=\"share_gallery_view\">";
	echo "<div class=\"share_gallery_info\">" . $info . "</div>";
	echo "</div>";

} else {
	//this view is for context search listing
	echo elgg_view_listing($icon, $info);
}
*/

