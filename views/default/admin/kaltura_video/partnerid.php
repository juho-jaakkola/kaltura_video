<?php
	elgg_load_library('kaltura_video');

	$configured = $vars['configured'];
?>
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

<?php
	echo elgg_view('input/submit', array(
		'value' => elgg_echo('save'),
	));
?>
