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
$flashVars["uid"]             = $partnerUserID;
$flashVars["partnerId"]       = KALTURA_PARTNER_ID;
$flashVars["ks"]              = $ks;
$flashVars["afterAddEntry"]   = "onContributionWizardAfterAddEntry";
$flashVars["close"]           = "onContributionWizardClose";
$flashVars["showCloseButton"] = false; 
$flashVars["Permissions"]     = 1;

$uiconf_id = 1002225;

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
swfobject.embedSWF("http://video.mmg.fi/kcw/ui_conf_id/<?php echo $uiconf_id; ?>", "kcw", "680", "360", "9.0.0", "expressInstall.swf", flashVars, params);
</script>

<!--implement callback scripts-->
<script type="text/javascript">
function onContributionWizardAfterAddEntry(entries) {
		alert('test');
		
		var url = elgg.get_site_url() + 'kaltura_video/add?entryid=' + entries[0].entryId;
		alert(url);
		
		window.location.replace(url);

        alert(entries.length + " media file/s was/were succsesfully uploaded");
        for(var i = 0; i < entries.length; i++) {
                alert("entries["+i+"]:EntryID = " + entries[i].entryId);
        }
}
</script>
<script type="text/javascript">
function onContributionWizardClose() {
        alert("Thank you for using Kaltura ontribution Wizard");
}
</script>