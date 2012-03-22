<?php
/**
 * Register the KalturaVideo class for the object/kaltura_video subtype
 */

if (get_subtype_id('object', 'kaltura_video')) {
	update_subtype('object', 'kaltura_video', 'KalturaVideo');
} else {
	add_subtype('object', 'kaltura_video', 'KalturaVideo');
}
