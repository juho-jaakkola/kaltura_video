<?php
/**
 * View video thumbnail
 * 
 * @uses $vars['entity'] Kaltura video object
 * @uses $vars['href'] Link url (if not default video url)
 * @uses $vars['use_link'] Whether to create a link of the image
 * @uses $vars['img_class'] Image class
 * @uses $vars['link_class'] Link class
 */

$entity = elgg_extract('entity', $vars);
$href = elgg_extract('href', $vars);
$use_link = elgg_extract('use_link', $vars, true);
$img_class = elgg_extract('img_class', $vars);

$img = elgg_view('output/img', array(
	'src' => $entity->thumbnail_url,
	'alt' => $entity->title,
	'class' => $img_class,
));

// Add link if not specifically disabled
if ($use_link) {
	$href = elgg_extract('href', $vars);
	$link_class = elgg_extract('link_class', $vars);
	
	if (!$href) {
		$href = $entity->getURL();
	}
	
	$img = elgg_view('output/url', array(
		'href' => $href,
		'text' => $img,
		'is_trusted' => true,
		'class' => $link_class,
	));
}

echo $img;