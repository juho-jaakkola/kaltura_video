<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Ivan Vergés <ivan@microstudi.net>
* @copyright Ivan Vergés 2010
* @link http://microstudi.net/elgg/
**/

// Load Elgg engine
define('everyonekaltura_video','true');
require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");

// Get the current page's owner
$page_owner = $_SESSION['user'];
elgg_set_page_owner_guid($_SESSION['guid']);

$limit = get_input("limit", 10);
$offset = get_input("offset", 0);

$params['title'] = elgg_echo('kalturavideo:label:allvideos');

$params['content'] = elgg_list_entities(array(
	'types' => 'object',
	'subtypes' => 'kaltura_video',
	'limit' => $limit,
	'offset' => $offset,
	'full_view' => FALSE
));

// get tagcloud
// $params['content'] = "This will be a tagcloud for all posts";

// Get categories, if they're installed
global $CONFIG;
$params['content'] .= elgg_view('kaltura/categorylist', array(
	'baseurl' => $CONFIG->wwwroot . 'search/?subtype=kaltura_video&tagtype=universal_categories&tag=',
	'subtype' => 'kaltura_video'
));

$body = elgg_view_layout("content", $params);

// Display page
echo elgg_view_page($params['title'], $body);

?>
