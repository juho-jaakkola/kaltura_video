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

	/**
	 * Returns available video flavors
	 * 
	 * @return array $flavors Array of KalturaVideoFlavor objects
	 */
	public function getFlavors () {
		try {
			$kmodel = KalturaModel::getInstance();
			$kmodel->startSession();

			$flavorAsset = $kmodel->client->flavorAsset;
			$results = $flavorAsset->getFlavorAssetsWithParams($this->getEntryId());
		} catch (Exception $e) {
			$message = elgg_echo('kaltura_video:error:video_not_found');
			register_error($message);
			return false;
		}

		$flavors = array();
		foreach ($results as $result) {
			// Flavor Params can exist without Flavor Asset & vice versa. Skip if no flavor.
			if (empty($result->flavorAsset->id) || empty($result->flavorParams->format)) {
				continue;
			}

			$format = $result->flavorParams->format;
			// We do not want to support flash
			if ($format === 'flv') {
				continue;
			}

			$flavors[] = new KalturaVideoFlavor($result);
		}

		return $flavors;
	}

}