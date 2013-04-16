<?php
/**
* Kaltura video client
* @package ElggKalturaVideo
* @license http://www.gnu.org/licenses/gpl.html GNU Public License version 3
* @author Ivan Vergés <ivan@microstudi.net>
* @copyright Ivan Vergés 2010
* @link http://microstudi.net/elgg/
**/

$translations = array(
	'kalturavideo:label:partner_id' => "Partner ID",
	'kalturavideo:error:misconfigured' => "Misconfigured plugin or auth error with Kaltura!",
	'kalturavideo:error:notconfigured' => "The plugin is not configured!",
	'kalturavideo:error:missingks' => 'Probably you have a mistake in the "Administrator Secret" or "Web Service Secret" configuration.',
	'kalturavideo:error:partnerid' => "This error normaly appears if you are not a partner of Kaltura. Please read the README file and configure this plugin!",
	'kalturavideo:error:readme' => "Please read the README file and configure this plugin!",
	'kaltura_video:error:video_not_found' => "Video was not found.",
	'kalturavideo:label:closewindow' => "Close window",
	'kalturavideo:label:select_size' => "Select player size",
	'kalturavideo:label:large' => "Large",
	'kalturavideo:label:small' => "Small",
	'kalturavideo:label:insert' => "Insert video",
	'kalturavideo:label:edit' => "Edit video",
	'kalturavideo:label:edittitle' => "Edit video title",
	'kalturavideo:label:miniinsert' => "Insert",
	'kalturavideo:label:miniedit' => "Edit",
	'kalturavideo:label:cancel' => "Cancel",
	'kalturavideo:label:gallery' => "Gallery",
	'kalturavideo:label:next' => "Next",
	'kalturavideo:label:prev' => "Previous",
	'kalturavideo:label:start' => "Start",
	'kalturavideo:label:newvideo' => "Create a new video",
	'kalturavideo:label:gotoconfig' => "Please configure properly the Kaltura Video Plugin under ",

	'kaltura_video:none' => "No videos",
	'kalturavideo:label:adminvideos' => "Videos",
	'kalturavideo:label:myvideos' => "My videos",
	'kalturavideo:label:length' => "Length:",
	'kalturavideo:label:plays' => "Plays: %s",
	'kalturavideo:label:created' => "Created:",
	'kalturavideo:label:details' => "View details",
	'kalturavideo:label:view' => "View video",
	'kalturavideo:label:delete' => "Delete video",
	'kalturavideo:prompt:delete' => "Are you sure to permanently delete this video?",
	'kalturavideo:action:deleteok' => "The video with id %ID% was deleted.",
	'kalturavideo:action:deleteko' => "The video with id %ID% cannot be deleted!",
	'kalturavideo:action:updatedok' => "The video with id %ID% was updated.",
	'kalturavideo:action:updatedko' => "The video with id %ID% cannot be updated!",
	'kalturavideo:label:thumbnail' => "Thumbnail url:",
	'kalturavideo:label:sharel' => "HTML share code (big applet):",
	'kalturavideo:label:sharem' => "HTML share code (little applet):",
	'kalturavideo:text:statusnotchanged' => "The privacy status for the video %1% cannot be changed!",
	'kalturavideo:text:novideos' => "Sorry, you don't have videos yet!",
	'kalturavideo:text:nopublicvideos' => "Sorry, there are not public videos yet!",
	'kalturavideo:label:author' => "Author:",
	'kalturavideo:text:nofriendsvideos' => "Your friends does not have any videos yet",
	'kalturavideo:text:nouservideos' => "This user does not have any videos yet",
	'kalturavideo:label:showvideo' => "Show the video",
	'kalturavideo:show:advoptions' => "Show sharing",
	'kalturavideo:hide:advoptions' => "Hide sharing",

	'kalturavideo:text:widgetdesc' => "This widget allows you to show automatically your latest public video from Kaltura video plugins.",
	'kalturavideo:error:edittitle' => "Error! This title can not be changed!",
	'kalturavideo:error:objectnotavailable' => "Object not available. Please reload the page.",
	'kalturavideo:label:recreateobjects' => "Recreate all video objects",
	'kalturavideo:edit:notallowed' => "You can not edit this video!",
	
	/**
	 * River
	 */
	'river:create:object:kaltura_video' => '%s added a new video %s',
	'river:update:object:kaltura_video' => '%s updated the video %s',
	'river:comment:object:kaltura_video' => '%s commented the video %s',
	
	// Old river strings
	'kalturavideo:river:created' => "%s created",
	'kalturavideo:river:annotate' => "%s commented on",
	'kalturavideo:river:item' => "an video",
	'kalturavideo:river:shared' => "Videos",
	'kalturavideo:label:videosfrom' => "Videos by %s",
	'kalturavideo:user:showallvideos' => "Show all videos from this user",
	'kalturavideo:strapline' => "%s",

	/**
	 * Groups
	 **/
	'kalturavideo:groupprofile' => "Videos",
	'kalturavideo:label:collaborative' => "Collaborative",
	'kalturavideo:text:collaborative' => "This allows other members of this group to edit this video too!",
	'kalturavideo:text:collaborativechanged' => "Collaborative status for the video %1% changed!",
	'kalturavideo:text:collaborativenotchanged' => "Collaborative status for the video %1% cannot be changed!",
	'kalturavideo:text:iscollaborative' => "This is a collaborative video, you can edit it!",
	'kalturavideo:userprofile' => "Videos",

	//New after version 1.0

	//default title for a new created video, you can put 'New video' for example
	'kalturavideo:title:video' => "New Collaborative Video",
	//elgg notification
	'kalturavideo:newvideo' => "New collaborative video",

	'kaltura_video' => 'Videos',
	'kaltura_video:allvideos' => 'Videos',
	'kalturavideo:label:friendsvideos' => "Friends' videos",
	'kalturavideo:label:allgroupvideos' => "Groups' videos",
	'kalturavideo:label:allvideos' => "All site videos",
	'kalturavideo:clickifpartner' => "Click here if you already have a Partner ID",
	'kalturavideo:clickifnewpartner' => "Click here if you don't have a Partner ID",
	'kalturavideo:notpartner' => "Not a Kaltura user?",
	'kalturavideo:forgotpassword' => "forgot password?",
	'kalturavideo:enterkmcdata' => "Please enter your Kaltura Management Console (KMC) Email & password",
	'kalturavideo:label:sitename' => "Elgg Site Name",
	'kalturavideo:label:name' => "Enter Name",
	'kalturavideo:label:email' => "Enter Email",
	'kalturavideo:label:websiteurl' => "Website URL",
	'kalturavideo:label:description' => "Description",
	'kalturavideo:label:phonenumber' => "Phone Number",
	'kalturavideo:label:contenttype' => "Content Type",
	'kalturavideo:label:adultcontent' => "Do you plan to display adult content?",
	'kalturavideo:label:iagree' => "I Accept %s",
	'kalturavideo:label:termsofuse' => "Terms of Use",
	'kalturavideo:wizard:description' => "Please describe how you plan to use Kaltura's video platform",
	'kalturavideo:wizard:phonenumber' => "Enter phone number for contact",
	'kalturavideo:mustaggreeterms' => "You must agree to the Kaltura Terms of Use",
	'kalturavideo:mustenterfields' => "You must fill all fields!",
	'kalturavideo:registeredok' => "Kaltura server are contacted and registered successfully!",
	'kalturavideo:error:noid' => "The object requested is not available!",
	'kalturavideo:logintokaltura' => "%s to the Kaltura Management Console (KMC) for advanced media management",
	'kalturavideo:login' => "Login",
	'kalturavideo:text:nogroupsvideos' => "Sorry, there are not videos from groups yet!",
	'kalturavideo:label:defaultplayer' => "Default video player",
	'kalturavideo:editpassword' => "Click here to change this data",
	'kalturavideo:text:recreateobjects' => "Try to do this if you are upgrading the Kaltura plugin from any older version prior 1.0 or some videos are deleted outside this Elgg installation.
All Elgg video objects will be checked and recreated, this can be a slow process.

Note that the metadata stored in Kaltura servers will be updated in order to match the Elgg data.
Objects not created by the Kaltura Elgg Plugin will not be touched.",
	'kalturavideo:text:statuschanged' => 'Access status for the video %2% changed to "%1%"',
	'kalturavideo:howtoimportkaltura' => 'You can import any video from Kaltura CMS created outside Elgg, to do that login into your Kaltura CMS acount (%URLCMS%) and put the admin tags to "<b>%TAG%</b> <em>elgg_username_to_import</em>". Then run "Recreate all video objects" again.',
	'kalturavideo:num_display' => "Number of videos to display",
	'kalturavideo:start_display' => "Start with the video number",
	'kalturavideo:label:addvideo' => "Embed a video",
	'kalturavideo:label:addbuttonlongtext' => "Append the button %s to textareas",
	'kalturavideo:option:simple' => "Simple (a button on top of the textareas)",
	'kalturavideo:option:tinymce' => "Try to integrate into tinyMCE",
	'kalturavideo:note:addbuttonlongtext' => "If you choose to add this button, then users can put &lt;object&gt; html tags into text boxes. Even if htmlawed is enabled.",
	'kalturavideo:enablevideo' => "Enable collaborative videos for this group",
	'kaltura_video:group' => "Group videos",
	'kalturavideo:user' => "%s's videos",
	'kalturavideo:user:friends' => "%s's friends' videos",
	'kalturavideo:notfound' => "Sorry; we could not find the specified video post. ",
	'kalturavideo:posttitle' => "%s's video: %s",
	'kalturavideo:label:editdetails' => "Edit title &amp; description",
	'ingroup' => "in group",

	//new from 10-12-2009
	'item:object:kaltura_video' => "Videos",
	'kalturavideo:thumbnail' => "Thumbnail",
	'kalturavideo:comments:allow' => "Allow comments",
	//these get inserted into the river links to take the user to the entity
	'kalturavideo:river:updated' => "%s updated",
	'kalturavideo:river:create' => "a new video titled",
	'kalturavideo:river:update' => "a video titled",
	//the river search the translation with the object label (kaltura_video)
	'kaltura_video:river:annotate' => "a comment on this video",
	//widget title label
	'kalturavideo:label:latest' => "Latests videos",
	//widget options
	'kalturavideo:showmode' => "List mode",
	'kalturavideo:showmode:thumbnail' => "Thumbnails list",
	'kalturavideo:showmode:embed' => "Embeded mini-players",
	'kalturavideo:label:morevideos' => "More videos",
	'kalturavideo:more' => "More",
	//donate button in tools administrations
	'kalturavideo:note:donate' => "Do you like this plugin? Please consider donating:",

	//new from  11-21-2009
	'kalturavideo:error:curl' => "Extension CURL not loaded!\nPlease be sure to enable this extension in order to use this plugin!\nPlease read the README file for more information.",

	//new from Elgg version 1.8
	'admin:kaltura_video' => 'Kaltura Video',
	'admin:kaltura_video:server' => 'Server',
	'admin:kaltura_video:partnerid' => 'Account settings',
	'admin:kaltura_video:custom' => 'Player and editor',
	'admin:kaltura_video:behavior' => 'Settings',
	'admin:kaltura_video:advanced' => 'Advanced',
	'admin:kaltura_video:credits' => 'Plugin authors',
	'admin:kaltura_video:wizard' => 'Wizard',
	'admin:kaltura_video:develop' => 'Developers',
	
	// these are propably deprecated:
	'kalturavideo:menu:server' => "Server",
	'kalturavideo:menu:custom' => "Player &amp; Editor",
	'kalturavideo:menu:behavior' => "Plugin behavior",
	'kalturavideo:menu:advanced' => "Advanced",
	'kalturavideo:menu:credits' => "Credits",
	'kalturavideo:admin' => "Kaltura Video Admin",
	'kalturavideo:admin:serverpart' => "Streaming Server",
	'kalturavideo:admin:partnerpart' => "Partner ID Configuration",
	'kalturavideo:admin:wizardpart' => "Kaltura Online Video Platform Registration",
	'kalturavideo:admin:player' => "Video Player Options",
	'kalturavideo:admin:editor' => "Online Video Editor Options",
	'kalturavideo:admin:textareas' => "Textareas Integration",
	'kalturavideo:admin:credits' => "Credits",
	'kalturavideo:admin:support' => "Support",

	'kalturavideo:server:info' => "To use the Kaltura Platform features, you need to have a valid Partner ID with the Kaltura Server.",
	'kalturavideo:server:type' => "Choose your Kaltura Server",
	'kalturavideo:server:kalturacorp' => "Kaltura.com hosted edition",
	'kalturavideo:server:kalturace' => "Kaltura Community Edition (CE)",
	'kalturavideo:server:corpinfo' => "Signing up with the Kaltura.com hosted edition, provide you with a free trial account.
Your trial account includes 10GB of free hosting and streaming.",
	'kalturavideo:server:ceinfo' => "Kaltura Community Edition is a self-hosted, community supported version of Kaltura's Open Source Online Video Platform.",
	'kalturavideo:server:moreinfo' => "Find more information about",
	'kalturavideo:server:ceurl' => "Kaltura CE Server URL",
	'kalturavideo:server:alertchange' => "WARNING: By changing this data will lose your existing videos!
Are you sure?
Probably you want to recreate objects after this action.",
	'kalturavideo:wizard:cannot' => "You cannot use this page with your current configuration!",
	'kalturavideo:advanced:recreateobjects' => "I agree, please recreate all video objects now!",
	'kalturavideo:recreate:initiating' => "Retrieving information from Kaltura server...",
	'kalturavideo:recreate:stepof' => "Retrieving videos (step %NUM% of %TOTAL%)...",
	'kalturavideo:recreate:processedvideos' => "Processed videos %NUMRANGE% of %TOTAL%...",
	'kalturavideo:recreate:done' => "All videos successfully processed!",
	'kalturavideo:recreate:donewitherrors' => "Videos processed with errors!",
	'kalturavideo:changeplayer' => "Here you can change the default player for the new created videos (old videos will not be affected).",
	'kalturavideo:generic' => "Generic",
	'kalturavideo:customplayer' => "My Own Customized Player",
	'kalturavideo:customkcw' => "My Own Contribution Wizard",
	'kalturavideo:customeditor' => "My Own Editor",
	'kalturavideo:uiconf1' => "Kaltura's Application Studio Player ID",
	'kalturavideo:text:uiconf1' => '%s to the Kaltura Management Console (KMC) to create your own players.<br />
With your own custom player, you can change the default size of the player besides of many more features.<br />
Custom players are defined in "Application Studio" sub menu in KMC',
	'kalturavideo:uiconf2' => "Kaltura's Contribution Wizard (KCW) ID",
	'kalturavideo:uiconf3' => "Kaltura's Editor (KSE) ID",
	'kalturavideo:error:uiconf1' => "Error! Wrong Player ID.",
	'kalturavideo:error:uiconf2' => "Error! Wrong KCW ID.",
	'kalturavideo:error:uiconf3' => "Error! Wrong KSE ID.",
	'kalturavideo:uiconf:getlist' => "Get a list of them",
	'kalturavideo:uiconf1:notfound' => "No custom players found!",
	'kalturavideo:uiconf2:notfound' => "No custom KCW found!",
	'kalturavideo:uiconf3:notfound' => "No custom KSE found!",
	'kalturavideo:playerupdated' => "Player &amp; editor options successfully updated.",
	'kalturavideo:label:defaulteditor' => "Default video editor",
	'kalturavideo:editor:light' => "Editor in light color schemes",
	'kalturavideo:editor:dark' => "Editor in dark color schemes",
	'kalturavideo:label:defaultkcw' => "Default uploader (Contribution Wizard)",
	'kalturavideo:kcw:light' => "Uploader in light color schemes",
	'kalturavideo:kcw:dark' => "Uploader in dark color schemes",

	'kalturavideo:admin:videoeditor' => "Video Editor",

	'kalturavideo:behavior:alloweditor' => "Allow users to edit his videos",
	'kalturavideo:alloweditor:full' => "Yes, show the uploader and then the editor when creating a video",
	'kalturavideo:alloweditor:simple' => "Yes, but do not show the editor when creating a video (users can edit it after)",
	'kalturavideo:alloweditor:no' => "No, do not allow video editing at all",
	'kalturavideo:alloweditor:notallowed' => "Video editing is not allowed!",

	//new from 1.2
	'kalturavideo:admin:others' => "Other options",
	'kalturavideo:behavior:widget' => "Include videos widget on index page (custom_index must be enabled)",
	'kalturavideo:behavior:numvideos' => "Number of videos to display",
	'kalturavideo:option:single' => "Yes, a simple list (like latest blogs)",
	'kalturavideo:option:multi' => "Yes, a tab list with Latest, Top played, Top Commented, Top rated (like latest iZAP Videos)",

	'kalturavideo:index:toplatest' => "Top collaborative videos",
	'kalturavideo:index:latest' => "Latest",
	'kalturavideo:index:played' => "Played",
	'kalturavideo:index:commented' => "Commented",

	// messages
	'kaltura_video:message:saved' => 'Video saved.',
	'kaltura_video:error:cannot_save' => 'Cannot save video.',
	'kaltura_video:error:cannot_write_to_container' => 'Insufficient access to save video to group.',
	'kaltura_video:error:video_not_found' => 'This video has been removed, is invalid, or you do not have permission to view it.',
	'kaltura_video:error:missing:title' => 'Please enter a title!',
	'kaltura_video:error:missing:description' => 'Please enter a description for your video!',
);

add_translation("en", $translations);

?>
