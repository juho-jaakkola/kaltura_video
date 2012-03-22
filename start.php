<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Ivan Vergés <ivan@microstudi.net>
* @copyright Ivan Vergés 2010
* @link http://microstudi.net/elgg/
**/

function kaltura_video_init() {
	// Load system configuration
	global $CONFIG,$KALTURA_CURRENT_TINYMCE_FILE;

	//Add the javascript
	elgg_extend_view('page/elements/head', 'kaltura/jscripts');

	elgg_register_library('kaltura_video', $CONFIG->pluginspath . 'kaltura_video/kaltura/api_client/includes.php');

	$addbutton = elgg_get_plugin_setting('addbutton', 'kaltura_video');
	if (!$addbutton) {
		$addbutton = 'simple';
	}

	if (in_array($addbutton , array('simple','tinymce'))) {

		include_once(dirname(__FILE__)."/kaltura/api_client/definitions.php");

		//needs to be loaded after htmlawed
		//this is for allow html <object> tags
		$CONFIG->htmlawed_config['safe'] = false;

		$KALTURA_CURRENT_TINYMCE_FILE = '';
		foreach($KALTURA_TINYMCE_PATHS as $plugin => $path) {
			if (elgg_is_active_plugin($plugin) && is_file($CONFIG->pluginspath.$path)) {
				$KALTURA_CURRENT_TINYMCE_FILE = $path;
				break;
			}
		}
		
		if ($addbutton == 'tinymce') {
			set_view_location('input/longtext', $CONFIG->pluginspath . 'kaltura_video/kaltura/views/');
		} else {
			elgg_extend_view('input/longtext', 'kaltura/addvideobutton',9);
			//elgg_extend_view('input/longtext','embed/link',10);
		}
	}

	// Extend system CSS with our own styles, which are defined in the blog/css view
	elgg_extend_view('css','kaltura/css');

	// Add to groups context
	elgg_extend_view('groups/right_column', 'kaltura/groupprofile');
	//if you prefer to see the widgets in the left part of the groups pages:
	//extend_view('groups/left_column','kaltura/groupprofile');

	// Add group menu option
	add_group_tool_option('kaltura_video', elgg_echo('kalturavideo:enablevideo'), true);

	// Register a page handler, so we can have nice URLs
	elgg_register_page_handler('kaltura_video','kaltura_video_page_handler');

	// Register a url handler
	elgg_register_entity_url_handler('object', 'kaltura_video', 'kaltura_video_url');

	// Register granular notification for this type
	if (is_callable('register_notification_object')) {
		register_notification_object('object', 'kaltura_video', elgg_echo('kalturavideo:newvideo'));
	}

	// Listen to notification events and supply a more useful message
	elgg_register_plugin_hook_handler('notify:entity:message', 'object', 'kaltura_notify_message');
	
	// entity menu
	elgg_register_plugin_hook_handler('register', 'menu:entity', 'kaltura_video_entity_menu_setup');

	// Add profile widget
    elgg_register_widget_type('kaltura_video',elgg_echo('kalturavideo:label:latest'),elgg_echo('kalturavideo:text:widgetdesc'));

	// Add index widget
	$enableindexwidget = elgg_get_plugin_setting('enableindexwidget', 'kaltura_video');
	if (!$enableindexwidget) {
		$enableindexwidget = 'single';
	}

	if (in_array($enableindexwidget , array('single', 'multi'))) {
		elgg_extend_view('index/righthandside', 'kaltura/customindex.videos');
	}

	// Register entity type
	elgg_register_entity_type('object','kaltura_video');

	$actionspath = elgg_get_plugins_path() . 'kaltura_video/actions/kaltura_video';
	elgg_register_action("kaltura_video/delete", "$actionspath/delete.php");
	elgg_register_action("kaltura_video/update", "$actionspath/update.php");
	elgg_register_action("kaltura_video/rate", "$actionspath/rate.php");

	if (elgg_is_admin_logged_in()) {
		$path = $CONFIG->pluginspath . "kaltura_video/actions/admin/kaltura_video";
		elgg_register_action("admin/kaltura_video/server", "$path/server.php", 'admin');
		elgg_register_action("admin/kaltura_video/behavior", "$path/behavior.php", 'admin');
		elgg_register_action("admin/kaltura_video/custom", "$path/custom.php", 'admin');
		elgg_register_action("admin/kaltura_video/wizard", "$path/wizard.php", 'admin');
	}
}

/**
 * Register kaltura_video objects to be loaded as KalturaVideo class.
 */
function kaltura_video_activate_plugin($event, $type, $details) {
	echo "<pre>"; var_dump($details); die();
	
	if (!update_subtype('object', 'kaltura_video', 'KalturaVideo')) {
		add_subtype('object', 'kaltura_video', 'KalturaVideo');
	}
	
	return true;
}

/**
 * Returns a more meaningful message
 *
 * @param unknown_type $hook
 * @param unknown_type $entity_type
 * @param unknown_type $returnvalue
 * @param unknown_type $params
 */
function kaltura_video_notify_message($hook, $entity_type, $returnvalue, $params) {
	$entity = $params['entity'];
	$to_entity = $params['to_entity'];
	$method = $params['method'];
	if (($entity instanceof ElggEntity) && ($entity->getSubtype() == 'kaltura_video')) {
		$descr = $entity->description;
		$title = $entity->title;
		if ($method == 'sms') {
			$owner = $entity->getOwnerEntity();
			return $owner->username . ' via video: ' . $title;
		}
		if ($method == 'email') {
			$owner = $entity->getOwnerEntity();
			return $owner->username . ' via video: ' . $title . "\n\n" . $descr . "\n\n" . $entity->getURL();
		}
	}
	return null;
}

/**
 * Format and return the URL for videos.
 *
 * @param ElggObject $entity Kaltura video object
 * @return string URL of video.
 */
function kaltura_video_url($entity) {
	if (!$entity->getOwnerEntity()) {
		// default to a standard view if no owner.
		return FALSE;
	}
	
	$title = elgg_get_friendly_title($entity->title);
	
	return "kaltura_video/view/{$entity->guid}/$title";
}

/**
* Post init gumph.
*/
function kaltura_video_page_setup() {
	$page_owner = elgg_get_page_owner_entity();

	// Show menus only if plugin is configured
	if (elgg_get_plugin_setting("password", "kaltura_video")) {
		// Site menu item
		elgg_register_menu_item('site', array(
			'name' => 'kaltura_video_sitevideos',
			'href' => 'kaltura_video/all',
			'text' => elgg_echo('kalturavideo:label:adminvideos'),
		));
	
		// All videos
		elgg_register_menu_item('page', array(
			'name' => 'kaltura_video_all',
			'href' => "kaltura_video/all",
			'text' => elgg_echo('kalturavideo:label:allvideos'),
			'context' => 'kaltura_video',
		));
	
		// User profile item
		elgg_register_menu_item('owner_block', array(
			'name' => 'kaltura_video_own',
			'href' => "kaltura_video/owner/{$page_owner->username}",
			'text' => elgg_echo('kalturavideo:userprofile'),
			'context' => 'profile',
		));
		
		if (can_write_to_container(0, elgg_get_page_owner_guid()) && elgg_is_logged_in()) {
			// Create new video
			elgg_register_menu_item('title', array(
				'name' => 'kaltura_video_create',
				'href' => '#kaltura_create',
				'text' => elgg_echo('kalturavideo:label:newvideo'),
				'context' => 'kaltura_video',
				'class' => array('elgg-button', 'elgg-button-action'),
			));
		}
		
		if ((elgg_get_page_owner_guid() == $_SESSION['guid'] || !elgg_get_page_owner_guid()) && elgg_is_logged_in()) {
			// Users own videos
			elgg_register_menu_item('page', array(
				'name' => 'kaltura_video_own',
				'href' => "kaltura_video/owner/{$page_owner->username}",
				'text' => elgg_echo('kalturavideo:label:myvideos'),
				'context' => 'kaltura_video',
			));
			
			// User's friend's videos
			elgg_register_menu_item('page', array(
				'name' => 'kaltura_video_friends',
				'href' => "kaltura_video/friends/{$page_owner->username}",
				'text' => elgg_echo('kalturavideo:label:friendsvideos'),
				'context' => 'kaltura_video',
			));
			
			if (elgg_is_active_plugin('groups')) {
				//this page is to search all groups videos, not ready yet
				//add_submenu_item(elgg_echo('kalturavideo:label:allgroupvideos'), $CONFIG->wwwroot."mod/kaltura_video/groups.php");
			}
		} else if (elgg_get_page_owner_guid()) {
			// Link to videos of page owner's friends
			elgg_register_menu_item('page', array(
				'name' => 'kaltura_video_own',
				'href' => "kaltura_video/owner/{$page_owner->username}",
				'text' => sprintf(elgg_echo('kalturavideo:user'), $page_owner->name),
				'context' => 'kaltura_video',
			));
			
			// Link to videos of page owner's friends
			if ($page_owner instanceof ElggUser) {
				elgg_register_menu_item('page', array(
					'name' => 'kaltura_video_friends',
					'href' => "kaltura_video/friends{$page_owner->username}",
					'text' => sprintf(elgg_echo('kalturavideo:user:friends'), $page_owner->name),
					'context' => 'kaltura_video',
				));
			}
		}
	}

	// Group submenu option
	if ($page_owner instanceof ElggGroup) {
		if ($page_owner->kaltura_video_enable != "no") {
			elgg_register_menu_item('owner_block', array(
				'name' => 'kaltura_video_groups',
				'href' => "kaltura_video/group/{$page_owner->getGUID()}/all",
				'text' => sprintf(elgg_echo("kalturavideo:label:groupvideos"), $page_owner->name),
				'context' => 'groups',
			));
		}
	}
	
	// Link to plugin configuration 
	elgg_register_menu_item('page', array(
		'name' => 'kaltura_video',
		'href' => 'admin/kaltura_video',
		'text' => elgg_echo('admin:kaltura_video'),
		'context' => 'admin',
		'section' => 'configure'
	));
	
	elgg_register_admin_menu_item('configure', 'server', 'kaltura_video');
	elgg_register_admin_menu_item('configure', 'custom', 'kaltura_video');
	elgg_register_admin_menu_item('configure', 'wizard', 'kaltura_video');
	elgg_register_admin_menu_item('configure', 'advanced', 'kaltura_video');
	elgg_register_admin_menu_item('configure', 'behavior', 'kaltura_video');
	elgg_register_admin_menu_item('configure', 'credits', 'kaltura_video');
}

/**
 * Register title button that open video adding form to lightbox.
 */
function kaltura_video_register_title_button() {
	if (elgg_is_logged_in()) {
		$owner = elgg_get_page_owner_entity();
		if (!$owner) {
			// no owns the page so this is probably an all site list page
			$owner = elgg_get_logged_in_user_entity();
		}
		if ($owner && $owner->canWriteToContainer()) {
			elgg_register_menu_item('title', array(
				'name' => 'kaltura_video_create',
				'href' => '#kaltura_create',
				'text' => elgg_echo('kalturavideo:label:newvideo'),
				'class' => array('elgg-button', 'elgg-button-action'),
			));
		}
	}
}
/**
 * Add particular links/info to entity menu
 */
function kaltura_video_entity_menu_setup($hook, $type, $return, $params) {
	if (elgg_in_context('widgets')) {
		return $return;
	}

	$entity = $params['entity'];
	$handler = elgg_extract('handler', $params, false);
	if ($handler != 'kaltura_video') {
		return $return;
	}

	# Link for editing the video
	//if ($entity->canEdit() && $entity->kaltura_video_editable) { // @todo
	if ($entity->canEdit()) {
		$status_text = elgg_echo("kalturavideo:label:edit");
		$options = array(
			'name' => 'kaltura_video_edit',
			'text' => "<span>$status_text</span>",
			'href' => "#",
			'priority' => 150,
			'class' => 'edit',
			'rel' => $entity->kaltura_video_id,
		);
		$return[] = ElggMenuItem::factory($options);
	}
	
	return $return;
}

/**
 * Adds a toggle to extra menu for switching between list and gallery views
 */
function kaltura_video_register_toggle() {
	$url = elgg_http_remove_url_query_element(current_page_url(), 'list_type');

	if (get_input('list_type', 'list') == 'list') {
		$list_type = "gallery";
		$icon = elgg_view_icon('grid');
	} else {
		$list_type = "list";
		$icon = elgg_view_icon('list');
	}

	if (substr_count($url, '?')) {
		$url .= "&list_type=" . $list_type;
	} else {
		$url .= "?list_type=" . $list_type;
	}

	elgg_register_menu_item('extras', array(
		'name' => 'file_list',
		'text' => $icon,
		'href' => $url,
		'title' => elgg_echo("file:list:$list_type"),
		'priority' => 1000,
	));
}

/**
 * Dispatches video pages.
 * URLs take the form of
 *  All videos:      kaltura_video/all
 *  User's videos:   kaltura_video/owner/<username>
 *  Friends' videos: kaltura_video/friends/<username>
 *  Single video:    kaltura_video/view/<guid>/<title>
 *  Edit video:      kaltura_video/edit/<guid>/<revision>
 *  Group videos:    kaltura_video/group/<guid>/all
 *
 * @param array $page
 * @return NULL
 */
function kaltura_video_page_handler($page) {
	$file_dir = elgg_get_plugins_path() . 'kaltura_video/pages/kaltura_video';

	if (!elgg_get_plugin_setting("password", "kaltura_video")) {
		// If the URL is just 'feeds/username', or just 'feeds/', load the standard feeds index
		include("$file_dir/missconfigured.php");
		return true;
	}

	// push all blogs breadcrumb
	elgg_push_breadcrumb(elgg_echo('kaltura_video:allvideos'), "kaltura_video/all");
	
	if (!isset($page[0])) {
		$page[0] = 'all';
	}

	$page_type = $page[0];
	switch ($page_type) {
		case 'owner':
			kaltura_video_register_toggle();
			include "$file_dir/index.php";
			break;
		case 'friends':
			kaltura_video_register_toggle();
			include "$file_dir/friends.php";
			break;
		case 'edit':
			set_input('videopost', $page[1]);
			include "$file_dir/edit.php";
			break;
		case 'view':
			set_input('guid', $page[1]);
			include("$file_dir/show.php");
			break;
		//case 'group':
			// @ todo
			//	break;
		case 'all':
		default:
			kaltura_video_register_toggle();
			include "$file_dir/everyone.php";
			break;
	}
}

// Initialize the plugin last so we can hack the htmlawed and allow <object> tags.
elgg_register_event_handler('init', 'system', 'kaltura_video_init', 9999);
elgg_register_event_handler('pagesetup', 'system', 'kaltura_video_page_setup');
