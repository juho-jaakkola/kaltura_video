<?php
/**
 * View river item about user's vote
 * 
 * @todo How about viewing the actual stars instead of textual presentation?
 */
$object = $vars['item']->getObjectEntity();
$rate = $vars['item']->getAnnotation();


echo elgg_view('river/elements/layout', array(
	'item' => $vars['item'],
	'message' => elgg_echo('kaltura_video:userrate', array($rate->value)),
));
