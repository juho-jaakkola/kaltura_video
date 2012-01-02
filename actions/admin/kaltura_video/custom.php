<?php

$defaultplayer = get_input('defaultplayer');
$defaulteditor = get_input('defaulteditor');
$defaultkcw = get_input('defaultkcw');
$custom_kdp = trim(get_input('custom_kdp'));
$custom_kcw = trim(get_input('custom_kcw'));
$custom_kse = trim(get_input('custom_kse'));

elgg_load_library('kaltura_video');

$ok = true;
if ($defaultplayer == 'custom') {
	//check the uid_conf
	if (empty($custom_kdp)) {
		$ok = false;
		register_error(elgg_echo("kalturavideo:error:uiconf"));
	} else {
		//check if exists
		try {
			//open the kaltura instance
			$kmodel = KalturaModel::getInstance();
			//check the uiconf
			$result = $kmodel->getUiConf($custom_kdp);
			//if no exception it's ok
			elgg_set_plugin_setting("custom_kdp", $custom_kdp, "kaltura_video");
			if ($result->width && $result->height) {
				elgg_set_plugin_setting("custom_kdp_width", $result->width, "kaltura_video");
				elgg_set_plugin_setting("custom_kdp_height", $result->height, "kaltura_video");
			}
		} catch(Exception $e) {
			$ok = false;
			$error = $e->getMessage();
			register_error(elgg_echo("kalturavideo:error:uiconf") . " $error");
		}
	}
}

if ($defaultkcw == 'custom' && $ok) {
	//check the uid_conf
	if (empty($custom_kcw)) {
		$ok = false;
		register_error(elgg_echo("kalturavideo:error:uiconf"));
	} else {
		//check if exists
		try {
			//open the kaltura instance
			$kmodel = KalturaModel::getInstance();
			//check the uiconf
			$result = $kmodel->getUiConf($custom_kcw);
			//if no exception it's ok
			elgg_set_plugin_setting("custom_kcw", $custom_kcw, "kaltura_video");
		}
		catch(Exception $e) {
			$ok = false;
			$error = $e->getMessage();
			register_error(elgg_echo("kalturavideo:error:uiconf") . " $error");
		}
	}
}

if ($defaulteditor == 'custom' && $ok) {
	//check the uid_conf
	if (empty($custom_kse)) {
		$ok = false;
		register_error(elgg_echo("kalturavideo:error:uiconf"));
	} else {
		//check if exists
		try {
			//open the kaltura instance
			$kmodel = KalturaModel::getInstance();
			//check the uiconf
			$result = $kmodel->getUiConf($custom_kse);
			//if no exception it's ok
			elgg_set_plugin_setting("custom_kse", $custom_kse, "kaltura_video");
		} catch(Exception $e) {
			$ok = false;
			$error = $e->getMessage();
			register_error(elgg_echo("kalturavideo:error:uiconf") . " $error");
		}
	}
}

if ($ok) {
	elgg_set_plugin_setting("defaultplayer", $defaultplayer, "kaltura_video");
	elgg_set_plugin_setting("defaulteditor", $defaulteditor, "kaltura_video");
	elgg_set_plugin_setting("defaultkcw", $defaultkcw, "kaltura_video");
	system_message(elgg_echo("kalturavideo:playerupdated"));
}