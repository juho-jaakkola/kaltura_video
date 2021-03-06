<?php
/**
 * Kaltura video client
 * @package ElggKalturaVideo
 * @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
 * @author Ivan Vergés <ivan@microstudi.net>
 * @copyright Ivan Vergés 2010
 * @link http://microstudi.net/elgg/
 */

elgg_load_library('kaltura_video');

// Add title
$params['title'] = elgg_echo("kalturavideo:error:notconfigured");

// Add content
$params['content'] = '<div class="contentWrapper">' . kaltura_get_error_page("", "", false) . "</div>";

// Get layout
$body = elgg_view_layout("content", $params);

// View page
echo elgg_view_page($params['title'], $body);
