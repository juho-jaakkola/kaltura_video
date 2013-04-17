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
