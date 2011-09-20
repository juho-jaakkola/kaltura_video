<?php

	require_once($CONFIG->pluginspath."kaltura_video/kaltura/api_client/definitions.php");

	$configured = $vars['configured'];

?>

<h3 class="settings"><?php echo elgg_echo('kalturavideo:admin:videoeditor'); ?></h3>

<p>
	<?php echo elgg_echo('kalturavideo:behavior:alloweditor'); ?>: <br />
	<?php
		$alloweditor = elgg_get_plugin_setting('alloweditor', 'kaltura_video');
		if (!$alloweditor) $alloweditor = 'full';

		echo elgg_view('input/dropdown', array(
			'name' => 'alloweditor',
			'options_values' => array(
				'full' => elgg_echo('kalturavideo:alloweditor:full'),
				'simple' => elgg_echo('kalturavideo:alloweditor:simple'),
				'no' => elgg_echo('kalturavideo:alloweditor:no')
			),
			'value' => $alloweditor
		));
	?>

</p>

<h3 class="settings"><?php echo elgg_echo('kalturavideo:admin:rating'); ?></h3>

<p>
	<?php echo elgg_echo('kalturavideo:behavior:enablerating'); ?>:
	<?php
		$enablerating = elgg_get_plugin_setting('enablerating', 'kaltura_video');
		if (!$enablerating) $enablerating = 'yes';

		echo elgg_view('input/dropdown', array(
			'name' => 'enablerating',
			'options_values' => array(
				'yes' => elgg_echo('option:yes'),
				'no' => elgg_echo('option:no')
			),
			'value' => $enablerating
		));
	?>

</p>

<h3 class="settings"><?php echo elgg_echo('kalturavideo:admin:textareas'); ?></h3>

<p>
	<?php echo sprintf(elgg_echo('kalturavideo:label:addbuttonlongtext'),'"<img src="'.$vars['url'] .'mod/kaltura_video/kaltura/images/interactive_video_button.gif" style="vertical-align:middle;" />'.elgg_echo('kalturavideo:label:addvideo').'"'); ?><strong>*</strong>:
	<?php
		$addbutton = elgg_get_plugin_setting('addbutton', 'kaltura_video');
		if (!$addbutton) $addbutton = 'simple';

		echo elgg_view('input/dropdown', array(
			'name' => 'addbutton',
			'options_values' => array(
				'no' => elgg_echo('option:no'),
				'simple' => elgg_echo('kalturavideo:option:simple'),
				'tinymce' => elgg_echo('kalturavideo:option:tinymce')
			),
			'value' => $addbutton
		));
	?>
</p>
<p style="font-style:italic;"><strong>*</strong> <?php echo elgg_echo('kalturavideo:note:addbuttonlongtext'); ?></p>

<h3 class="settings"><?php echo elgg_echo('kalturavideo:admin:others'); ?></h3>
<p>
	<?php echo elgg_echo('kalturavideo:behavior:widget'); ?>:
	<?php
		$enableindexwidget = elgg_get_plugin_setting('enableindexwidget', 'kaltura_video');
		if (!$enableindexwidget) {
			$enableindexwidget = 'yes';
		}

		echo elgg_view('input/dropdown', array(
			'name' => 'enableindexwidget',
			'id' => 'enableindexwidget',
			'options_values' => array(
				'single' => elgg_echo('kalturavideo:option:single'),
				'multi' => elgg_echo('kalturavideo:option:multi'),
				'no' => elgg_echo('option:no')
				),
			'value' => $enableindexwidget
		));
	?>
</p>
<p>
	<?php echo elgg_echo('kalturavideo:behavior:numvideos'); ?>:
	<?php
		$total = (int) elgg_get_plugin_setting('numindexvideos', 'kaltura_video');
		if(!$total) {
			$total = 4;
		}
		echo elgg_view('input/url', array('name' => 'numindexvideos','id' => 'numindexvideos', 'value' => $total, 'class' => 'input-short', 'disabled'=>($enableindexwidget=='no') ));
	?>
</p>
