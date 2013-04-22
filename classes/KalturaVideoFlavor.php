<?php

class KalturaVideoFlavor {
	private $data;

	public function __construct($data) {
		$this->data = $data;
	}

	/**
	 * Gets video url that can be used in <source> tag.
	 */
	public function getUrl () {
		$server_url = elgg_get_plugin_setting('kaltura_server_url', 'kaltura_video');
		$pid = elgg_get_plugin_setting('partner_id', 'kaltura_video');

		$ext = $this->data->flavorAsset->fileExt;
		$id  = $this->data->flavorAsset->id;

		return "{$server_url}p/{$pid}/sp/{$pid}00/serveFlavor/flavorId/{$id}/name/{$id}.{$ext}";
	}

	/**
	 * Get video mime type
	 * 
	 * @return string
	 */
	public function getMimeType() {
		return "video/{$this->data->flavorAsset->fileExt}";
	}
	
	/**
	 * Return friendly name for the flavor.
	 * 
	 * @return string
	 */
	public function getFlavorName() {
		return $this->data->flavorParams->name;
	}
	
}
