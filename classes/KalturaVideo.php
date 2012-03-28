<?php
/**
 * Class for KalturaVideo objects
 */
class KalturaVideo extends ElggObject {

	/**
	 * Set subtype.
	 */
	protected function initializeAttributes() {
		parent::initializeAttributes();

		$this->attributes['subtype'] = "kaltura_video";
	}

	/**
	 * Has user rated this video?
	 * 
	 * @todo Rethink the whole rating system. I think we should
	 * propably create the rating system as a completely separate
	 * plugin (think about likes).
	 */
	public function hasRated ($user_guid = 0) {
		if ($user_guid == 0) {
			$user_guid = elgg_get_logged_in_user_guid();
		}
		
		echo "<p>video guid: {$this->getGUID()}";
		echo "<p>user guid: {$user_guid}";

		$options = array(
			//'entity_guid' => $this->getGUID(),
			'annotation_names' => 'kaltura_video_rating',
			'annotation_owner_guids' => $user_guid,
		);

		$rate = elgg_get_annotations($options);
		
		elgg_dump($rate); die();
	}

	/**
	 * Can a user comment on this video?
	 * 
	 * @see ElggObject::canComment()
	 *
	 * @param int $user_guid User guid (default is logged in user)
	 * @return bool
	 * @since 1.8.0
	 */
	public function canComment($user_guid = 0) {
		$result = parent::canComment($user_guid);
		if ($result == false) {
			return $result;
		}

		if ($this->comments_on == 'Off') {
			return false;
		}
		
		return true;
	}
	
	public function getEntryId() {
		return $this->kaltura_video_id;
	}

	/**
	 * Return number of plays.
	 * 
	 * @return int
	 */
	public function getPlayCount () {
		if ($this->kaltura_video_plays) {
			return $this->kaltura_video_plays;
		} else {
			return 0;
		}
	}

}