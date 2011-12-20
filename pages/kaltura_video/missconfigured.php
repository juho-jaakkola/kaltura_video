<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Ivan Vergés <ivan@microstudi.net>
* @copyright Ivan Vergés 2010
* @link http://microstudi.net/elgg/
**/

// @todo Register/load libraries the elgg 1.8 way
require_once($CONFIG->pluginspath."kaltura_video/kaltura/api_client/includes.php");

// Add title
$params['title'] = elgg_echo("kalturavideo:error:notconfigured");

// Add content
$params['content'] = '<div class="contentWrapper">' . kaltura_get_error_page("","",false) . "</div>";

// Get layout
$body = elgg_view_layout("content", $params);

// View page
echo elgg_view_page($params['title'], $body);

?>
