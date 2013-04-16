<?php

$addbutton = get_input('addbutton');
$alloweditor = get_input('alloweditor');
$enableindexwidget = get_input('enableindexwidget');
$numindexvideos = get_input('numindexvideos');

$ok = '';
if ($addbutton) {
	$ok = elgg_set_plugin_setting("addbutton", $addbutton, "kaltura_video");
}

if ($alloweditor && $ok) {
	$ok = elgg_set_plugin_setting("alloweditor", $alloweditor, "kaltura_video");
}

if ($enableindexwidget && $ok) {
	$ok = elgg_set_plugin_setting("enableindexwidget", $enableindexwidget, "kaltura_video");
}

if ($numindexvideos && $ok) {
	$ok = elgg_set_plugin_setting("numindexvideos", $numindexvideos, "kaltura_video");
}

if ($ok) {
	system_message(elgg_echo("admin:configuration:success"));
} else {
	register_error(elgg_echo("admin:configuration:fail"));
}