<?php

// set the required variables
$title_label = elgg_echo('title');
$title_input = elgg_view('input/text', array('name' => 'title', 'value' => $vars['title']));

$description_label = elgg_echo('description');
$description_input = elgg_view('input/longtext', array('name' => 'description', 'value' => $vars['description']));

$tag_label = elgg_echo('tags');
$tag_input = elgg_view('input/tags', array('name' => 'tags', 'value' => $vars['tags']));

$comments_label = elgg_echo('comments');
$comments_input = elgg_view('input/dropdown', array(
	'name' => 'comments_on',
	'id' => 'kaltura_video_comments_on',
	'value' => $vars['comments_on'],
	'options_values' => array('On' => elgg_echo('on'), 'Off' => elgg_echo('off'))
));

$collaborate_label = '';
$collaborate_input = '';

/*
@todo if creating new we don't have the entity here
if ($vars['entity']->getContainerEntity() instanceof ElggGroup) {
	$collaborate_label = elgg_echo('kalturavideo:label:collaborative');
	$collaborate_input = elgg_view('input/dropdown', array(
		'name' => 'collaborate_on',
		'id' => 'collaborate_on',
		'value' => $vars['collaborate_on'],
		'options_values' => array('On' => elgg_echo('on'), 'Off' => elgg_echo('off'))
	));
}
*/

$thumb = '';
if ($vars['entity']) {
	$thumb = elgg_view('output/img', array(
		'src' => $vars['entity']->kaltura_video_thumbnail,
		'alt' => $vars['entity']->title,
	));
}

$guid_input = elgg_view('input/hidden', array('name' => 'guid', 'value' => $vars['guid']));
// @todo What happens when container is a group?
$container_guid_input = elgg_view('input/hidden', array('name' => 'container_guid', 'value' => elgg_get_page_owner_guid()));
$video_id_input = elgg_view('input/hidden', array('name' => 'kaltura_video_id', 'value' => $vars['kaltura_video_id']));


$access_label = elgg_echo('access');
$access_input = elgg_view('input/access', array(
	'name' => 'access_id',
	'value' => $vars['access_id']
));

$submit_input = elgg_view('input/submit', array('name' => 'submit', 'value' => elgg_echo('save')));

$categories_input = elgg_view('input/categories', $vars);

$form_body = <<<EOT
	<div>
		$thumb
	</div>
	<div>
		<label>$title_label</label><br />
        $title_input
	</div>
	<div>
		<label>$description_label</label><br />
        $description_input
	</div>
	<div>
		<label>$tag_label</label><br />
        $tag_input
	</div>
	<div>
		$categories_input
	</div>
	<div>
		<label>$access_label</label>
		$access_input
	</div>
	<div>
		<label>$comments_label</label>
		$comments_input
	</div>
	<div>
		<label>$collaborate_label</label>
		$collaborate_input
	</div>
	<div>
		$container
	</div>
	<div class="elgg-foot">
		$guid_input
		$container_guid_input
		$video_id_input
		$submit_input
	</div>
EOT;

echo $form_body;