<?php
	elgg_load_library('kaltura_video');
	$configured = $vars['configured'];
	$servertype = elgg_get_plugin_setting('kaltura_server_type', 'kaltura_video');
	$servertype = $servertype ? $servertype : 'corp';
	$server_url = elgg_get_plugin_setting('kaltura_server_url', 'kaltura_video');
?>

<h3 class="settings"><?php echo elgg_echo('kalturavideo:admin:serverpart'); ?></h3>
<p>
	<?php echo elgg_echo('kalturavideo:server:info'); ?>
</p>
<p>
	<?php echo elgg_echo('kalturavideo:server:type'); ?>:
	<?php
		echo elgg_view('input/dropdown', array(
			'name' => 'kaltura_server_type',
			'id' => 'kaltura_server_type',
			'disabled' => $configured,
			'options_values' => array(
				"corp" => elgg_echo('kalturavideo:server:kalturacorp'),
				"ce" => elgg_echo('kalturavideo:server:kalturace')
				),
			'value' => $servertype,
			)
		);
	?>
</p>

<div id="kaltura_video_layer_server_corp"<?php echo ($servertype == 'ce' ? 'style="display:none;"' : ''); ?>>
	<p>
		<?php echo elgg_echo('kalturavideo:server:corpinfo'); ?>
	<br />
		<?php echo elgg_echo('kalturavideo:server:moreinfo'); ?> <a href="<?php echo KALTURA_SERVER_URL; ?>" onclick="window.open(this.href);return false;"><?php echo elgg_echo('kalturavideo:server:kalturacorp'); ?></a>
	</p>
	<p>
		<?php echo elgg_echo('kalturavideo:notpartner'); ?> <a href="?type=partner_wizard"><?php echo elgg_echo('kalturavideo:clickifnewpartner'); ?></a>
	</p>
</div>

<div id="kaltura_video_layer_server_ce"<?php echo ($servertype == 'ce' ? '' : 'style="display:none;"'); ?>>
	<p>
		<?php echo elgg_echo('kalturavideo:server:ceurl'); ?>: <br />
		<?php
			echo elgg_view('input/text', array('name' => 'kaltura_server_url','id' => 'kaltura_server_url','disabled' => $configured, 'value' => (elgg_get_plugin_setting('kaltura_server_url', 'kaltura_video') ? elgg_get_plugin_setting('kaltura_server_url', 'kaltura_video') : $CONFIG->wwwroot.'kalturaCE/') ));
		?>
	</p>
	<p>
		<?php echo elgg_echo('kalturavideo:server:ceinfo'); ?>
	<br />
		<?php echo elgg_echo('kalturavideo:server:moreinfo'); ?> <a href="http://www.kaltura.org/project/community_edition_video_platform" onclick="window.open(this.href);return false;"><?php echo elgg_echo('kalturavideo:server:kalturace'); ?></a>
	</p>
</div>

<h3 class="settings"><?php echo elgg_echo('kalturavideo:admin:partnerpart'); ?></h3>
<p>
	<?php echo elgg_echo('kalturavideo:enterkmcdata'); ?>:
</p>
<p>
	<?php echo elgg_echo('kalturavideo:label:partner_id'); ?>:<br />
	<?php
		echo elgg_view('input/text', array(
			'name' => 'partner_id',
			'id' => 'partner_id',
			'disabled' => $configured,
			'value' => elgg_get_plugin_setting('partner_id', 'kaltura_video')
		));
	?>
</p>
<p>
	<?php echo elgg_echo('email'); ?>: <br />
	<?php
		echo elgg_view('input/text', array(
			'name' => 'email',
			'id' => 'email',
			'disabled' => $configured,
			'value' => elgg_get_plugin_setting('email', 'kaltura_video')
		));
	?>
</p>
<p>
	<?php echo elgg_echo('password'); ?>:
	<?php
		echo elgg_view('input/password', array(
			'name' => 'password',
			'id' => 'password',
			'disabled' => $configured,
			'value' => elgg_get_plugin_setting('password', 'kaltura_video')
		));
	?>
	
	<?php if ($configured): ?>
		<a href="#" id="kaltura_video_change_admin_data">&larr;<?php echo elgg_echo('kalturavideo:editpassword'); ?></a>
	<?php endif; ?>

	<a href="<?php echo KalturaHelpers::getServerUrl(); ?>/index.php/kmc" id="kaltura_video_change_password" onclick="window.open(this.href);return false;"<?php echo ($configured ? ' style="display:none;"' : '') ?>><?php echo elgg_echo('kalturavideo:forgotpassword'); ?></a>
</p>
<p>
	<?php echo sprintf(elgg_echo('kalturavideo:logintokaltura'),'<a href="'.KalturaHelpers::getServerUrl().'/index.php/kmc" onclick="window.open(this.href);return false;">'.elgg_echo('kalturavideo:login').'</a>'); ?>
</p>

<?php echo elgg_view('input/submit', array('value' => elgg_echo('save'))); ?>
