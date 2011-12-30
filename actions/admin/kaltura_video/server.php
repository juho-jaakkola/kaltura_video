<?php

elgg_load_library('kaltura_video');

$server_type = get_input('kaltura_server_type');
$server_url = get_input('kaltura_server_url');
$partnerId = get_input('partner_id');
$email = get_input('email');
$password = get_input('password');

$error = '';

if ($server_type) {
	elgg_set_plugin_setting("kaltura_server_type", $server_type, "kaltura_video");
	elgg_set_plugin_setting("kaltura_server_url", $server_url, "kaltura_video");
}

if ($partnerId && $email && $password) {
	elgg_set_plugin_setting("partner_id", $partnerId, "kaltura_video");
	elgg_set_plugin_setting("email", $email, "kaltura_video");
	elgg_set_plugin_setting("password", "", "kaltura_video");
	//password will be registered if Kaltura login is ok

	$partner = new KalturaPartner();

	try {
		$kmodel = KalturaModel::getInstance();
		$partner = $kmodel->getSecrets($partnerId, $email, $password);

		$partnerId = $partner->id;
		$subPartnerId = $partnerId * 100;
		$secret = $partner->secret;
		$adminSecret = $partner->adminSecret;
		$cmsUser = $partner->adminEmail;

		//Register Elgg vars
		elgg_set_plugin_setting("user", $cmsUser, "kaltura_video");
		elgg_set_plugin_setting("password", $password, "kaltura_video");
		elgg_set_plugin_setting("subp_id", $subPartnerId, "kaltura_video");
		elgg_set_plugin_setting("secret", $secret, "kaltura_video");
		elgg_set_plugin_setting("admin_secret", $adminSecret, "kaltura_video");

		system_message(elgg_echo("kalturavideo:registeredok"));
		
		forward("admin/kaltura_video/server");
		//forward(get_config('url')."admin/kaltura_video/?type=$type");
	} catch(Exception $e) {
		$error = $e->getMessage();
	}
} else {
	$error = elgg_echo("kalturavideo:mustenterfields");
}

if ($error) {
	register_error($error);
	forward("admin/kaltura_video/server");
}