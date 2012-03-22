<?php
/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 *
 * This script is based on the artfolio rate script (thanks to Frederqiue Hermans)
 */

	elgg_load_library('kaltura_video');

	// Get input data
	$guid = (int) get_input('kaltura_video_guid');
	$rate = (int) get_input('rating',-1);

	// Get the post
	if ($entity = get_entity($guid)) {
		$metadata = kaltura_get_metadata($entity);
		if ($metadata->kaltura_video_rating_on == 'Off') {
			unset($entity);
		}
	}

	if (!$entity) {
		register_error(elgg_echo("kalturavideo:notrated"));
		forward();
	}

	$owner = $entity->getOwner();

	if ($rate == -1) {
		register_error(elgg_echo("kalturavideo:rateempty"));
		forward($entity->getURL());
	}
	// Get old rating
	list($numvotes,$image,$oldrate) = kaltura_get_rating($entity);

	// Calculate new rating
	$oldrate = ($oldrate * $numvotes);
	$newrate = ($oldrate + $rate);
	$newcount = ($numvotes + 1.00);
	$newrate = ($newrate / $newcount);

	$user = elgg_get_logged_in_user_entity();

	//do no rate if is already rated
	// @todo Add a method to KalturaVideo class to check this.
	if (!kaltura_is_rated_by_user($guid,$user,$numvotes)) {
		// Delete old ratings
		$kaltura_video_ratings = $entity->getAnnotations('kaltura_video_rating');
		foreach ($kaltura_video_ratings as $kaltura_video_rating) {
			$rating_id = $kaltura_video_rating['id'];
			$ratingobject = get_annotation($rating_id);
			$ratingobject->delete();
		}

		$kaltura_video_numvotes = $entity->getAnnotations('kaltura_video_numvotes');
		foreach ($kaltura_video_numvotes as $kaltura_video_numvote) {
			$numvotes_id = $kaltura_video_numvote['id'];
			$numvotesobject = get_annotation($numvotes_id);
			$numvotesobject->delete();
		}

		// Save new rating average and number of votes using video-s owner
		$entity->annotate('kaltura_video_rating', $newrate, ACCESS_PUBLIC, $owner, "integer");
		$entity->annotate('kaltura_video_numvotes', $newcount, ACCESS_PUBLIC, $owner, "integer");
		
		// Save this vote to avoid new duplicate votes
		// @todo Why is this saved to the user entity? Might be smarter to attach this
		// information to the video instead of the user.
		$user->annotate('kaltura_video_rated', $guid);
		// ...like this:
		$rate_guid = $entity->annotate('kaltura_video_rating', $rate, ACCESS_PUBLIC, $user, "integer");

		//add to the river
		// We must pass the rate guid here to view correct river view. (Annotation view instead of full view)
		add_to_river('river/object/kaltura_video/rate', 'rate', $user->getGUID(), $entity->getGUID(), "", 0, $rate_guid);

		system_message(elgg_echo("kalturavideo:ratesucces"));

	} else {
		register_error(elgg_echo("kalturavideo:notrated"));
	}

	forward($entity->getURL());
