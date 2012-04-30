<?php

require_once('../../../../../engine/start.php');

elgg_load_library('kaltura_video');

$secret = elgg_get_plugin_setting("secret");
$partner_id = elgg_get_plugin_setting("partner_id");

define("KALTURA_PARTNER_ID", $partner_id);
define("KALTURA_PARTNER_SERVICE_SECRET", $secret);

$user = elgg_get_logged_in_user_entity();
$partnerUserID = $user->username; 

$kmodel = KalturaModel::getInstance();
$ks = $kmodel->getClientSideSession();

//Prepare variables to be passed to embedded flash object.
$flashVars = array();
$flashVars["uid"]			 = $partnerUserID;
$flashVars["partnerId"]	   = KALTURA_PARTNER_ID;
$flashVars["ks"]			  = $ks;
$flashVars["afterAddEntry"]   = "onContributionWizardAfterAddEntry";
$flashVars["close"]		   = "onContributionWizardClose";
$flashVars["showCloseButton"] = false; 
$flashVars["Permissions"]	 = 1;

$uiconf_id = 1002225;
$server_url = elgg_get_config('kaltura_server_url');

$url = "$server_url/kcw/ui_conf_id/$uiconf_id";

?>
<div id="kcw"></div>
<script type="text/javascript">
var params = {
	allowScriptAccess: "always",
	allowNetworking: "all",
	wmode: "opaque"
};

// php to js
var flashVars = <?php echo json_encode($flashVars); ?>;

<!--embed flash object-->
//swfobject.embedSWF("http://www.kaltura.com/kcw/ui_conf_id/1000741 ", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
swfobject.embedSWF("<?php echo $url; ?>", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
</script>

<!--implement callback scripts-->
<script type="text/javascript">
function onContributionWizardAfterAddEntry(entries) {
	var url = elgg.get_site_url() + 'kaltura_video/add?entryid=' + entries[0].entryId;

	window.location.replace(url);

	alert(entries.length + " media file/s was/were successfully uploaded");
	for (var i = 0; i < entries.length; i++) {
		alert("entries["+i+"]:EntryID = " + entries[i].entryId);
	}
}
</script>
<script type="text/javascript">
function onContributionWizardClose() {
	alert("Thank you for using Kaltura contribution Wizard");
}
</script>