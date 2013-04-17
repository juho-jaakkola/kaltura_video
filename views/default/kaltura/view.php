<?php
/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 */

$entity = elgg_extract('entity', $vars);

if (!$entity) {
	return TRUE;
}

elgg_load_library('kaltura_video');

$owner = $entity->getOwnerEntity();
$container = $entity->getContainerEntity();
$categories = elgg_view('output/categories', $vars);
$excerpt = $entity->excerpt;

$owner_icon = elgg_view_entity_icon($owner, 'tiny');
$owner_link = elgg_view('output/url', array(
	'href' => "kaltura_video/owner/$owner->username",
	'text' => $owner->name,
	'is_trusted' => true,
));
$author_text = elgg_echo('byline', array($owner_link));
$tags = elgg_view('output/tags', array('tags' => $entity->tags));
$date = elgg_view_friendly_time($entity->time_created);

// The "on" status changes for comments, so best to check for !Off
if ($entity->comments_on != 'Off') {
	$comments_count = $entity->countComments();
	//only display if there are commments
	if ($comments_count != 0) {
		$text = elgg_echo("comments") . " ($comments_count)";
		$comments_link = elgg_view('output/url', array(
			'href' => $entity->getURL() . '#kaltura-video-comments',
			'text' => $text,
			'is_trusted' => true,
		));
	} else {
		$comments_link = '';
	}
} else {
	$comments_link = '';
}

$metadata = elgg_view_menu('entity', array(
	'entity' => $vars['entity'],
	'handler' => 'kaltura_video',
	'sort_by' => 'priority',
	'class' => 'elgg-menu-hz',
));

$subtitle = "$author_text $date $comments_link $categories";

$body = elgg_view('output/longtext', array(
	'value' => $entity->description,
	'class' => 'blog-post',
));

$params = array(
	'entity' => $entity,
	'title' => false,
	'metadata' => $metadata,
	'subtitle' => $subtitle,
	'tags' => $tags,
);
$params = $params + $vars;
$summary = elgg_view('object/elements/summary', $params);

$player = elgg_view('kaltura/player', $vars);
$body = $player;

echo elgg_view('object/elements/full', array(
	'summary' => $summary,
	'icon' => $owner_icon,
	'body' => $body,
));

//get the number of comments
$num_comments = $entity->countComments();

/*
<div class="clearfloat"></div>
<hr />
<p>
	<?php
		echo elgg_view('output/url', array(
			'href' => '#',
			'class' => 'elgg-button elgg-button-action',
			'id' => 'kaltura-view-details',
			'text' => elgg_echo("kalturavideo:show:advoptions"),
		));
	?>
	<div class="hide kaltura_video_details">
		<p><strong><?php echo elgg_echo("kalturavideo:label:thumbnail");?></strong></p>
		<p><a href="<?php echo $entity->kaltura_video_thumbnail; ?>" onclick="window.open(this.href);return false;"><?php echo $entity->kaltura_video_thumbnail; ?></a></p>
		<p><strong><?php echo elgg_echo("kalturavideo:label:sharel");?></strong></p>
		<p><input type="text" class="input-text" value="<?php echo htmlspecialchars($widget); ?>" /></p>
		<p><strong><?php echo elgg_echo("kalturavideo:label:sharem");?></strong></p>
		<p><input type="text" class="input-text" value="<?php echo htmlspecialchars($widgetm); ?>" /></p>
	</div>
	<hr />
	<?php
	if ($entity->collaborate_on): ?>
		<strong><?php echo elgg_echo("kalturavideo:label:collaborative"); ?>:</strong>
		<a href="#" rel="<?php echo $entity->kaltura_video_id; ?>" class="elgg-button-action edit" title="<?php echo htmlspecialchars(elgg_echo("kalturavideo:text:iscollaborative")); ?>"><img src="<?php echo $CONFIG->wwwroot; ?>mod/kaltura_video/kaltura/images/group.png" alt="<?php echo htmlspecialchars(elgg_echo("kalturavideo:text:iscollaborative")); ?>" style="vertical-align:middle;" />
		<?php echo elgg_echo("kalturavideo:label:edit"); ?></a>
		<hr />
	<?php endif; ?>
</p>
*/
?>