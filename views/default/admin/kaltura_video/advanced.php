<?php

	$configured = $vars['configured'];
	
	global $CONFIG;
	require_once($CONFIG->pluginspath . 'kaltura_video/kaltura/api_client/kaltura_helpers.php');
?>
<h3 class="settings"><?php echo elgg_echo('kalturavideo:label:recreateobjects'); ?></h3>

<div id="kaltura_video_advanced_layer">

<p><?php echo nl2br(elgg_echo('kalturavideo:text:recreateobjects')); ?></p>
<p><?php echo str_replace("%TAG%",KALTURA_ADMIN_TAGS,str_replace("%URLCMS%",'<a href="'.KalturaHelpers::getServerUrl().'/index.php/kmc" onclick="window.open(this.href);return false;">Login</a>',elgg_echo('kalturavideo:howtoimportkaltura'))); ?></p>

<p>
<?php
//this works in ajax
echo elgg_view('input/submit', array(
	'name' => 'recreateobjects',
	'id' => 'kaltura_video_recreate_objects',
	'value' => elgg_echo('kalturavideo:advanced:recreateobjects'
)));

?>
</p>

</div>
