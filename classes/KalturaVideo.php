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