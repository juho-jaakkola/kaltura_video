<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Ivan Vergés <ivan@microstudi.net>
* @copyright Ivan Vergés 2010
* @link http://microstudi.net/elgg/
**/

	admin_gatekeeper();
	$type = get_input('type'); //the type of page e.g about, terms etc

	$configured = elgg_get_plugin_setting('password', "kaltura_video") ? true : false;

	if (!$type) {
		$type = "server"; //default to the server config part
		if ($configured) {
			$type = "custom";
		}
	}
	// Set admin user for user block
	elgg_set_page_owner_guid($_SESSION['guid']);
	
	echo elgg_view('admin/kaltura_video/menu', array('type' => $type, 'configured' => $configured));
	echo elgg_view('admin/kaltura_video/admin', array('type' => $type, 'configured' => $configured));

?>
