<?php
	$configured = $vars['configured'];

	$plugin = elgg_get_plugin_from_id("kaltura_video");
	$manifest = $plugin->getManifest();
?>

<p><b>Version: </b> <?php echo $manifest->getVersion(); ?><br />
<a href="<?php echo $CONFIG->wwwroot."mod/kaltura_video/INSTALL.txt"; ?>">INSTALL file</a>
 &bull;
 <a href="<?php echo $CONFIG->wwwroot."mod/kaltura_video/README.txt"; ?>">README file</a>
 &bull;
 <a href="<?php echo $CONFIG->wwwroot."mod/kaltura_video/CHANGELOG.txt"; ?>">CHANGELOG file</a>
 &bull;
 <a href="<?php echo $CONFIG->wwwroot."mod/kaltura_video/license.txt"; ?>">License file</a>
</p>

<h3 class="settings"><?php echo elgg_echo('kalturavideo:admin:support'); ?></h3>

<p>Links to get support and collaboration (translations are welcome!):
<ul style="list-style: circle inside;">
	<li><a href="http://community.elgg.org/pg/groups/282/kaltura-interactive-video-plugin/">Kaltura Collaborative Group on Elgg.org</a></li>
	<li><a href="http://community.elgg.org/pg/plugins/ivan">Download the last version of the plugin in Elgg.org</a></li>
	<li><a href="http://www.kaltura.org/project/community_edition_video_platform">Support for Kaltura CE Server</a></li>
</ul>
</p>

<h3 class="settings"><?php echo elgg_echo('kalturavideo:admin:credits'); ?></h3>

<p><b>Kaltura Collaborative Video Plugin for Elgg</b></p>
<p>
	<b>@author</b> <?php echo $manifest->getAuthor(); ?> &lt;<a href="mailto:ivan@microstudi.net">ivan@microstudi.net</a>&gt;<br />
	<b>@license</b> <?php echo $manifest->getLicense(); ?></a><br />
	<b>@copyright</b> <?php echo $manifest->getAuthor(); ?><br />
	<b>@link</b> <?php echo $manifest->getWebsite(); ?></a>
</p>	
<p>
&nbsp; Follow the last news about Kaltura Elgg Plugin on my personal Twitter: <a href="http://twitter.com/microstudi">http://twitter.com/microstudi</a><br />
&nbsp; Visit my <a href="http://community.elgg.org/pg/profile/ivan">personal profile in Elgg.org</a>
</p>
