<?php
/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 */

require_once('../../../../engine/start.php');

elgg_load_library('kaltura_video');

global $KALTURA_GLOBAL_UICONF;

if (!extension_loaded('curl')) {
	echo kaltura_get_error_page('',elgg_echo('kalturavideo:error:curl'));
	die;
}

$user = elgg_get_logged_in_user_entity();

$container_guid = $user->getGUID();
if ($page_owner = elgg_get_page_owner_entity()) {
	if ($page_owner instanceof ElggGroup) {
		$container_guid = $page_owner->getGUID();
	}
}

try {
	//get the current session
	$kmodel = KalturaModel::getInstance();
	$ks = $kmodel->getClientSideSession();
	
	$kmodel->startSession();
    
	$mediaEntry = new KalturaMediaEntry();
	$mediaEntry->name = elgg_echo('kalturavideo:title:video');
    //$mediaEntry->editorType = KalturaEditorType_SIMPLE;
    //$mediaEntry->adminTags = KALTURA_ADMIN_TAGS;
    //$mediaEntry = $kmodel->addMixEntry($mediaEntry);
	$mediaEntry->mediaType = KalturaMediaType::VIDEO;
    
    $mediaEntry = $kmodel->client->media->add($mediaEntry);

	$entryId = $mediaEntry->id;

} catch(Exception $e) {
	$error = $e->getMessage();
}

if (!$entryId && !$error) {
	$error = elgg_echo('kalturavideo:error:noid');
}

if ($error) {
	echo kaltura_get_error_page('',$error);
	die;
} else {
	//create the elgg object
	$ob = kaltura_update_object($mediaEntry, null, ACCESS_PRIVATE, $user->getGUID(), $container_guid);
	//add to the river
	add_to_river('river/object/kaltura_video/create', 'create', $user->getGUID(), $ob->getGUID());
	$viewData = array();

	$kcw = elgg_get_plugin_setting('defaultkcw',"kaltura_video");
	if ($kcw == 'custom') {
		$kcw_uid = elgg_get_plugin_setting('custom_kcw',"kaltura_video");
	} else {
		$t = elgg_get_plugin_setting('kaltura_server_type',"kaltura_video");
		if (empty($t)) {
			$t = 'corp';
		}
		$editors = $KALTURA_GLOBAL_UICONF['kcw'][$t];
		$kswf = $editors[$kcw];
		if (empty($kswf)) {
			$kswf = current($editors);
		}
		$kcw_uid = $kswf['uiConfId'];
	}

	$viewData["flashVars"] 	= KalturaHelpers::getContributionWizardFlashVars($ks,$entryId);
    //$viewData["flashVars"]["showCloseButton"] 	= "false";
    $viewData["swfUrl"]    	= KalturaHelpers::getContributionWizardUrl($kcw_uid);
    $viewData["entryId"] = $entryId;
    $viewData["flashVars"]["kshowId"] = "entry-".$entryId;

    $flashVarsStr = KalturaHelpers::flashVarsToString($viewData["flashVars"]);

	$height = 360;
	$width = 680;

	$widget = '<object id="kaltura_contribution_wizard" type="application/x-shockwave-flash" allowScriptAccess="always" allowNetworking="all" height="' . $height . '" width="' . $width . '" data="'. $viewData["swfUrl"] . '">'.
		'<param name="allowScriptAccess" value="always" />'.
		'<param name="allowNetworking" value="all" />'.
		'<param name="bgcolor" value=#000000 />'.
		'<param name="movie" value="'.$viewData["swfUrl"] . '"/>'.
    	'<param name="flashVars" value="' . $flashVarsStr . '" />' .
	'</object>';

	echo $widget;
}
?>
<script type='text/javascript'>
	var entryId = "<?php echo $entryId; ?>";
	alert(entryId);
</script>
