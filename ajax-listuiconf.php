<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Ivan Vergés <ivan@microstudi.net>
* @copyright Ivan Vergés 2010
* @link http://microstudi.net/elgg/
**/

require_once(dirname(__FILE__)."/kaltura/api_client/includes.php");
if(!elgg_is_admin_logged_in()) die('');

$type = (int)get_input('type');
if(!in_array($type,array(1,2,3))) $type = 1;
$type_str = 'custom_kdp';
if($type == 2) $type_str = 'custom_kcw';
elseif($type == 3) $type_str = 'custom_kse';

$page_size = 50;
$error = '';
try {
	//open the kaltura list
	$kmodel = KalturaModel::getInstance();
	//getting list
	$results = $kmodel->listUiConf(50, 1);
	//print_r($results);
	$vars = array();
	foreach($results->objects as $ob) {
		//UI conf type (1 - Widget, 2 - ContributionWizard, 3 - Editor)
		if($ob->objType == $type) {
			$vars[$ob->id] = $ob->name." (".$ob->width."x".$ob->height."px)";
		}
	}
	if(count($vars)>0){
		//return select
		echo elgg_view('input/dropdown', array('name' => $type_str,'id' => $type_str,'options_values' => $vars,'value' => elgg_get_plugin_setting($type_str,"kaltura_video")));
		exit;
	}
}
catch(Exception $e) {
	$error = $e->getMessage();
}
echo '<b>'.elgg_echo("kalturavideo:uiconf$type:notfound")." $error".'</b>';
?>
