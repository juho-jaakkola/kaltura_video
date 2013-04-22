<?php
/**
 * View HTML5 video player
 * 
 * Get all available video flavors through Kaltura API.
 * 
 * @uses $vars['entity] KalturaVideo object
 */

$entity = elgg_extract('entity', $vars);

$defaults = array(
	'controls' => 'true',
	'data-setup' => '{}',
	'poster' => $entity->getIconUrl('master'),
	'class' => 'video-js vjs-default-skin',
	'id' => 'video-js-player'
);
$vars = array_merge($defaults, $vars);

$attributes = elgg_format_attributes($vars);

$sources = '';
$flavor_options = array();
foreach ($entity->getFlavors() as $flavor) {
	$sources .= "<source src=\"{$flavor->getURL()}\" type=\"{$flavor->getMimeType()}\" />";
	$flavor_options[$flavor->getURL()] = $flavor->getFlavorName();
}

echo "<video $attributes>$sources</video>";

echo elgg_echo('kalturavideo:label:quality');
echo elgg_view('input/dropdown', array(
	'name' => 'video-selector',
	'id' => 'video-selector',
	'options_values' => $flavor_options
));
