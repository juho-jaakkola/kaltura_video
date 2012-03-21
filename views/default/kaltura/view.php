<?php
/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 */

$ob = elgg_extract('entity', $vars);

if (!$ob) {
	forward();
}

elgg_load_library('kaltura_video');

$access_id = $ob->access_id;
$metadata = kaltura_get_metadata($ob);

//get the number of comments
$num_comments = $ob->countComments();

// If we've been asked to display the full view
$comments =  elgg_view_comments($ob);

list($votes, $rating_image, $rating) = kaltura_get_rating($ob);
$can_rate = (elgg_is_logged_in() && !kaltura_is_rated_by_user($ob->getGUID(), $_SESSION['user'], $votes));

//groups handle
$group = get_entity($ob->container_guid);
if ($group instanceof ElggGroup) {
	elgg_set_page_owner_guid($group->getGUID());
	
	// @todo Is this needed or is start.php menus sufficient
	elgg_register_menu_item('owner_block', array(
		'name' => 'kaltura_video_groups',
		'href' => "kaltura_video/group/{$page_owner->getGUID()}/all",
		'text' => sprintf(elgg_echo("kalturavideo:label:groupvideos:TEST")),
		'context' => 'groups',
	));
} else {
	$group = false;
}

//generic widget
$widget = kaltura_create_generic_widget_html ( $metadata->kaltura_video_id , 'l' );
$widgetm = kaltura_create_generic_widget_html ( $metadata->kaltura_video_id , 'm' );

//if widget exists
if ($metadata->kaltura_video_widget_html) {
	//generated widget
	$widget = $metadata->kaltura_video_widget_html;
	$metadata->kaltura_video_widget_width .= 'px';
	$metadata->kaltura_video_widget_height .= 'px';
} else {
	preg_match('/width="([0-9]*)"/',$widget,$matchs);
	$metadata->kaltura_video_widget_width = 'auto';
	if ($matchs[1]) $metadata->kaltura_video_widget_width = $matchs[1]."px";

	$metadata->kaltura_video_widget_height = 'auto';
	preg_match('/height="([0-9]*)"/',$widget,$matchs);
	if ($matchs[1]) $metadata->kaltura_video_widget_height = $matchs[1]."px";
}

$title = elgg_echo("kalturavideo:label:adminvideos").': ';
$title .= elgg_echo("kalturavideo:label:showvideo");

if (elgg_get_viewtype() != 'default') {
	// @fixme This file is called through elgg_view_entity()
	// so the same function cannot be used here again
	$standard_entity = elgg_view_entity($ob, array('full_view' => true));
	
	//put here the standard view call: rss, opendd, etc.
	echo $standard_entity;
	//add comments
	echo $comments;
	return true;
}

?>

<div class="contentWrapper singleview">

<div class="kalturaviewer blog_post">
<!--
<h1><a href="<?php echo $ob->getURL(); ?>"><?php echo $ob->title; ?></a></h1>
-->
<div class="post_icon">
<?php
$uob = get_user($ob->owner_guid);
echo elgg_view_entity_icon($uob, 'tiny');
?>
</div>
<p class="strapline">
<?php
	echo sprintf(elgg_echo("kalturavideo:strapline"), $metadata->kaltura_video_created);
?>

<?php echo elgg_echo('by'); ?> <a href="<?php echo "{$CONFIG->wwwroot}kaltura_video/owner/{$uob->username}"; ?>" title="<?php echo htmlspecialchars(elgg_echo("kalturavideo:user:showallvideos")); ?>"><?php echo $uob->name; ?></a>
<?php
if ($group) {
	echo elgg_echo('ingroup')." <a href=\"{$CONFIG->wwwroot}kaltura_video/group/{$page_owner->getGUID()}/all/\" title=\"".htmlspecialchars(elgg_echo("kalturavideo:user:showallvideos"))."\">{$group->name}</a> ";
}
?>
<?php echo elgg_echo("kalturavideo:label:length"); ?> <strong><?php echo $metadata->kaltura_video_length; ?></strong>
<?php echo elgg_echo("kalturavideo:label:plays"); ?> <strong class="ajax_play" rel="<?php echo $metadata->kaltura_video_id; ?>"><?php echo intval($metadata->kaltura_video_plays); ?></strong>

<!-- display the comments link -->
<?php if ($metadata->kaltura_video_comments_on != 'Off'): ?>
	<a href="<?php echo $ob->getURL(); ?>#comments"><?php echo sprintf(elgg_echo("comments")) . " (" . $num_comments . ")"; ?></a><br />
<?php endif; ?>

</p>
<!-- display tags -->
<p class="tags">
<?php
$tags = elgg_view('output/tags', array('tags' => $ob->tags));
if (!empty($tags)) {
	echo $tags ;
}

$categories = elgg_view('output/categories', array('entity' => $ob));
if (!empty($categories)) {
	echo ($tags ? ' - ' : '' ).$categories;
}

?>
</p>

<div class="clearfloat"></div>

<!-- descrition -->
<div class="kalturaplayer left bigwidget" style="height:<?php echo $metadata->kaltura_video_widget_height; ?>;width:<?php echo $metadata->kaltura_video_widget_width; ?>;"><?php echo $widget; ?></div>

<div class="text">
	<?php echo autop($ob->description); ?>
</div>
<div class="clear"></div>

<p class="kaltura_video_rating">
	<?php if ($metadata->kaltura_video_rating_on != 'Off'): ?>
		<img src="<?php echo $CONFIG->wwwroot."mod/kaltura_video/kaltura/images/ratings/$rating_image"; ?>" alt="<?php echo "$rating"; ?>" /> <?php echo ("($votes " . elgg_echo('kalturavideo:votes') . ")"); ?>
	<?php endif; ?>
	
	<a href="#" class="elgg-button-action showdetails"><?php echo elgg_echo("kalturavideo:show:advoptions"); ?></a>
	
	<?php if ($metadata->kaltura_video_cancollaborate && !$metadata->kaltura_video_editable): ?>
		&nbsp;
		<strong><?php echo elgg_echo("kalturavideo:label:collaborative"); ?>:</strong>
		<a href="#" rel="<?php echo $metadata->kaltura_video_id; ?>" class="elgg-button-action edit" title="<?php echo htmlspecialchars(elgg_echo("kalturavideo:text:iscollaborative")); ?>"><img src="<?php echo $CONFIG->wwwroot; ?>mod/kaltura_video/kaltura/images/group.png" alt="<?php echo htmlspecialchars(elgg_echo("kalturavideo:text:iscollaborative")); ?>" style="vertical-align:middle;" />
		<?php echo elgg_echo("kalturavideo:label:edit"); ?></a>
	<?php endif; ?>
</p>

<?php
if ($can_rate && $metadata->kaltura_video_rating_on != 'Off') {
	echo elgg_view('input/form', array(
		'action' => "{$CONFIG->wwwroot}action/kaltura_video/rate",
		"name"=>"form1",
		"id"=>"form1",
		'body' => elgg_view("kaltura/view.rate", array('entity' => $ob))
	));
}
?>

<div class="hide kaltura_video_details">
	<p><strong><?php echo elgg_echo("kalturavideo:label:thumbnail");?></strong></p>
	<p><a href="<?php echo $metadata->kaltura_video_thumbnail; ?>" onclick="window.open(this.href);return false;"><?php echo $metadata->kaltura_video_thumbnail; ?></a></p>
	<p><strong><?php echo elgg_echo("kalturavideo:label:sharel");?></strong></p>
	<p><input type="text" class="input-text" value="<?php echo htmlspecialchars($widget); ?>" /></p>
	<p><strong><?php echo elgg_echo("kalturavideo:label:sharem");?></strong></p>
	<p><input type="text" class="input-text" value="<?php echo htmlspecialchars($widgetm); ?>" /></p>
</div>

<?php if ($ob->canEdit()): ?>
	<!-- options -->
	<p class="options">
	
	<?php
	// Edit video link
	if ($metadata->kaltura_video_editable) {
		echo elgg_view("output/url", array(
			"text" => elgg_echo("kalturavideo:label:edit"),
			"href" => "#",
			"rel" => $metadata->kaltura_video_id,
			"class" => 'elgg-button-action edit',
		));
	}
	
	// Edit video details link
	echo elgg_view("output/url", array(
		"text" => elgg_echo("kalturavideo:label:editdetails"),
		"href" => "kaltura_video/edit/{$ob->getGUID()}/",
		"rel" => $metadata->kaltura_video_id,
		"class" => 'elgg-button-action',
	));

	// Delete video link
	echo elgg_view("output/confirmlink", array(
		"text" => elgg_echo("kalturavideo:label:delete"),
		"href" => "action/kaltura_video/delete?delete_video={$metadata->kaltura_video_id}/",
		"confirm" => elgg_echo("kalturavideo:prompt:delete"),
		"class" => 'elgg-button-action'
	));

	// Access level settings
	echo ' ' . elgg_echo('access') . ': ';
	echo kaltura_view_select_privacity($metadata->kaltura_video_id, $access_id, $group, $metadata->kaltura_video_collaborative);
	?>
	
	</p>
<?php endif; ?>

</div>

</div>

<?php if ($metadata->kaltura_video_comments_on != 'Off'): ?>
	<div id="comments">
		<?php echo $comments; ?>
	</div>
<?php endif; ?>
