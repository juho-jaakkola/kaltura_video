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

$guid = get_input('guid','Off');
$container_guid = get_input('container_guid');
$video_id = get_input('kaltura_video_id');
$title = get_input('title');
$desc = get_input('description');
$tags = get_input('tags');
$access = get_input('access_id');
$comments_on = get_input('comments_on','Off');
$rating_on = get_input('rating_on','Off');
$collaborative = get_input('collaborate_on','Off');
$url = '';

if ($video_id) {
	$error = '';
	
	//check the video
	try {
		$kmodel = KalturaModel::getInstance();
		$entry = $kmodel->getEntry($video_id);
		$ob = kaltura_get_entity($video_id);

		//check if belongs to this user (or is admin)
		if (! $ob->canEdit()) {
			$error = elgg_echo('kalturavideo:edit:notallowed');
		}
		$user_ID = $entry->userId;
	} catch(Exception $e) {
		$error = $e->getMessage();
	}

	if (empty($error) && $entry instanceof KalturaMediaEntry) {
		// Convert string of tags into a preformatted array
		$tagarray = string_to_tag_array($tags);

		$entry->name = strip_tags($title);
		$entry->description = $desc;

		if (is_array($tagarray)) {
			$entry->tags = implode(", ",$tagarray);
		}
		try {
			$kmodel = KalturaModel::getInstance();
			$mediaEntry = new KalturaMediaEntry();
			$mediaEntry->name = $entry->name;
			$mediaEntry->description = $entry->description;
			$mediaEntry->tags = $entry->tags;
			$mediaEntry->adminTags = KALTURA_ADMIN_TAGS;
			$entry = $kmodel->updateMediaEntry($video_id, $mediaEntry);
		} catch(Exception $e) {
			$error = $e->getMessage();
		}

		if (empty($error)) {
			//now update the object!
			$entry->comments_on = $comments_on; //whether the users wants to allow comments or not on the blog post
			$entry->rating_on = $rating_on; //whether the users wants to allow comments or not on the blog post
			if (!($ob = kaltura_update_object($entry, null, $access, null, $container_guid, true))) {
				$error = "Error update Elgg object";
			} else {
				$ob->collaborate_on = $collaborative;
				$ob->save();
				$url = $ob->getURL();
			}
		}
	}

	if ($error) {
		register_error(str_replace("%ID%", $video_id, elgg_echo("kalturavideo:action:updatedko")) . "\n$error");
	} else {
		if (get_input("do_no_add_toriver",0)==0) {
			//add to the river
			add_to_river('river/object/kaltura_video/update','update',$_SESSION['user']->getGUID(),$ob->getGUID());
		}

		system_message(str_replace("%ID%", $video_id, elgg_echo("kalturavideo:action:updatedok")));
	}
} else {
	register_error("Fatal error, empty video id.");
}

if (empty($url)) {
	$url = $_SERVER['HTTP_REFERER'];
}
//if (strpos($url,'/kaltura_video/edit.php') === false) $url = $CONFIG->url.'mod/kaltura_video/show.php';
forward($url);

?>
