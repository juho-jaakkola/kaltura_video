<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Ivan Vergés <ivan@microstudi.net>
* @copyright Ivan Vergés 2010
* @link http://microstudi.net/elgg/
**/

include_once($CONFIG->pluginspath . "kaltura_video/kaltura/api_client/includes.php");

$video = $vars['entity'];
$owner = $vars['entity']->getOwnerEntity();
$access_id = $vars['entity']->access_id;

$metadata = kaltura_get_metadata($vars['entity']);
if (@empty($metadata->kaltura_video_id)) {
	$vars['entity']->delete();
	return false;
}

list($votes, $rating_image, $rating) = kaltura_get_rating($vars['entity']);

$rating = round($rating);

// Get the number of comments
$num_comments = $vars['entity']->countComments();

$group = get_entity($vars['entity']->container_guid);
if (!($group instanceof ElggGroup)) {
	$group = false;
}


if (elgg_get_context() !== 'search') {
	//this view is for My videos:
	
	if ($vars['full_view'] && !elgg_in_context('gallery')) {
		// Full view
		// @todo Pass guid as parameter?
		echo elgg_view("kaltura/view");
	} elseif ($vars['list_type'] == 'gallery') {
		// @todo Check if elgg_in_context('gallery') coud be used to define list type
		
		// Gallery view
		echo '<div class="video-gallery-item">';
		echo 
		'<a href="' . $video->getURL() . '">' . 
			'<img src="' .  $video->kaltura_video_thumbnail . '" alt="" >' .
		 	"<h4>" . $video->title . "</h4>" .
		 '</a>';
		
		echo "<p class='subtitle'>$owner_link $date</p>";
		echo '</div>';
	} else {
		// Normal list view 
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
		
		// @todo Find a good way to easily get video thumbnail
		$image = '<a href="' . $video->getURL() . '"><img src="' .  $video->kaltura_video_thumbnail . '" alt="" ></a>';
		
		$params = $params + $vars;
		
		$list_body = elgg_view('object/elements/summary', $params);
		
		$vars = array('class' => 'kalturavideoitem');
		echo elgg_view_image_block($image, $list_body, $vars);
	}
	/**
	 * NEW Elgg 1.8 way END
	 */
} else {
	// This views a normal list of videos
	// (not single video nor a list with editing functionalities for video owner)
	// @todo This view is propably not needed anymore

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
}
?>
