/* widget */
.bigwidget {
	background:#f0f0f0;
}
/*  Admin */
#kaltura_container .em {
	font-style:italic;
	font-size:0.8em;
}
#kaltura_container .small {
	font-size:0.85em;
}
#kaltura_container .share_gallery_view .shares_gallery_title {
	text-align:center;
}
.kalturavideoitem {
	margin: 0 0 0px 0;
}
.kalturavideoitem .left,.kalturaviewer .left {
	float:left;
}
.kalturavideoitem .right,.kalturaviewer .right {
	float:right;
}
.kalturavideoitem .clear,.kalturaviewer .clear {
	clear:both;
}
.hide {
	display:none;
}
.kalturavideoitem .icon,.kalturaviewer .icon {
	margin:0px 5px 0 0px;
}
.kalturavideoitem h1,.kalturaviewer h1 {
	font-size: 150%;
	margin-bottom: 5px;
}
.kalturavideoitem h3 {
	margin-bottom: 3px;
}

.kalturavideoitem p {
	margin:0 12px 2px 0;
	padding:0;
	line-height:1em;
}
.kalturavideoitem p.options {
	padding:6px 12px 0px 0;
}
.kalturavideoitem p.options input {
	vertical-align:middle;
}
.kalturavideoitem p.options label {
	font-size:0.9em;
}
.kalturaviewer {
	margin-bottom: 0px;
}
.kalturaviewer p {
	margin:12px 0 12px 0;
	padding:0;
	line-height:1.2em;
}
.kalturaviewer .strapline {
	margin: 0 0 0 35px;
	padding:0;
	color: #aaa;
	line-height:1em;
}
.kalturaviewer .post_icon {
	float:left;
	margin:3px 0 0 0;
	padding:0;
}
.kalturaviewer p.tags {
	background:transparent url(<?php echo $vars['url']; ?>_graphics/icon_tag.gif) no-repeat scroll left 2px;
	margin:0 0 0 35px;
	padding:0pt 0pt 0pt 16px;
	min-height:22px;
}
.kalturaviewer .options {
	margin-bottom:0;

}
.kalturaviewer .options label {
	font-size:1em;
}
.kalturaviewer .options input {
	vertical-align:middle;
}
.kalturaviewer .text {
}
.kalturaviewer .kalturaplayer {
	margin:0 10px 0 0;
}

.kalturavideoitem a.submit_button,.kalturaviewer a.submit_button {
	margin:0 0 5px 0;
	color:#fff;
	text-decoration:none;
}
.kalturavideoitem a.submit_button:hover,.kalturaviewer a.submit_button:hover {

	background: #0054a7;
}
.kalturavideoitem a.submit_button.editing,.kalturaviewer a.submit_button.editing {
	color: #999999;
	background:#dddddd;
	border: 1px solid #999999;

}
.kalturavideoitem a.submit_button.editing:hover,.kalturaviewer a.submit_button.editing:hover {
	color: #999999;
	background:#dddddd;
	border: 1px solid #999999;
	cursor:default;

}
.kaltura_video_details {
	background:#f0f0f0;
	padding:10px;
	border: 1px solid #ccc;
	margin:10px 0 10px 0;
	-webkit-border-radius: 4px;
	-moz-border-radius: 4px;
}

.video-gallery-item {
	text-align: center;
	width: 130px;
	margin: 10px;
}

#blog_edit_page {
	/* background: #bbdaf7; */
	margin-top:-10px;
}
#blog_edit_page #content_area_user_title h2 {
	background: none;
	border-top: none;
	margin:0 0 10px 0px;
	padding:0px 0 0 0;
}
#blog_edit_page #kaltura_edit_sidebar #content_area_user_title h2 {
	background:none;
	border-top:none;
	margin:inherit;
	padding:0 0 5px 5px;
	font-size:1.25em;
	line-height:1.2em;
}
#blog_edit_page #kaltura_edit_sidebar {
	margin:0px 0 22px 0;
	background: #dedede;
	padding:5px;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	border-bottom:1px solid #cccccc;
	border-right:1px solid #cccccc;
}
#blog_edit_page #two_column_left_sidebar_210 {
	width:210px;
	margin:0px 0 20px 0px;
	min-height:360px;
	float:left;
	padding:0;
}
#blog_edit_page #two_column_left_sidebar_maincontent {
	margin:0 0px 20px 20px;
	padding:10px 20px 20px 20px;
	width:670px;
	background: #bbdaf7;
}

#kaltura_edit_sidebar .publish_controls,
#kaltura_edit_sidebar .kaltura_access,
#kaltura_edit_sidebar .publish_options,
#kaltura_edit_sidebar .publish_kaltura,
#kaltura_edit_sidebar .allow_comments,
#kaltura_edit_sidebar .categories {
	margin:0 5px 5px 5px;
	border-top:1px solid #cccccc;
}
#blog_edit_page ul {
	padding-left:0px;
	margin:5px 0 5px 0;
	list-style: none;
}
#kaltura_edit_sidebar input{
	vertical-align:bottom;
}
#blog_edit_page p {
	margin:5px 0 5px 0;
}
#blog_edit_page #two_column_left_sidebar_maincontent p {
	margin:0 0 15px 0;
}
#blog_edit_page .publish_kaltura input[type="submit"] {
	font-weight: bold;
	padding:2px;
	height:auto;
}
#blog_edit_page .allow_comments label {
	font-size: 100%;
}

a.embed_kaltura {
	margin:0 0 0 1em;
	float:right;
	display:block;
	text-align: right;
	font-size:1.0em;
	font-weight: normal;
}
label a.embed_kaltura {
	font-size:0.8em;
}

/* for the river */
.river_object_kaltura_video_create {
	background: url(<?php echo $vars['url']; ?>mod/kaltura_video/kaltura/images/video.gif) no-repeat left -1px;
}
.river_object_kaltura_video_update {
	background: url(<?php echo $vars['url']; ?>mod/kaltura_video/kaltura/images/video.gif) no-repeat left -1px;
}
.river_object_kaltura_video_comment {
	background: url(<?php echo $vars['url']; ?>_graphics/river_icons/river_icon_comment.gif) no-repeat left -1px;
}

/* profile widgets */
.kaltura_video_widget {
	font-size:0.8em;
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	background-color:#FFFFFF;
	margin:0 8px 8px 8px;
	padding:5px 10px 10px 10px;
	text-align:left;
}
.kaltura_video_widget.last {
	margin-bottom:0;
	padding-bottom:2px;
	font-size:1em;
}
.kaltura_video_widget a.tit {
	font-size:1.1em;
	font-weight:bold;
	clear:both;
	display:block;
	margin:0 0 4px 0;
}
.kaltura_video_widget.last a.tit {
	font-size:1em;
	font-weight:normal;
}
.kaltura_video_widget a.img {
	position:relative;
	width:120px;
	height:90px;
	margin:0 8px 0 0;
	display:block;
	float:left;
}
.kaltura_video_widget a.img img {
	position:absolute;
	top:0;
	left:0;
	width:120px;
	height:90px;
	display:block;
}
.kaltura_video_widget a.img span {
	position:absolute;
	top:24px;
	left:39px;
	background: url(<?php echo $vars['url']; ?>mod/kaltura_video/kaltura/images/play.png) no-repeat;
	width:76px;
	height:75px;
	display:block;
}
.kaltura_video_widget p {
	margin:0 0 0 0;
	padding:0 0 0 0;
}
.kaltura_video_widget .desc {
	display:none;
}
.kaltura_video_widget .clear {
	clear:both;
	font-size:0;
	line-height:0;
}

/* Group widgets */
#kaltura_group_video_widget {
	-webkit-border-radius: 8px;
	-moz-border-radius: 8px;
	background: white;
	margin:0 0 5px 0;
	padding:0 0 8px 0;
}
#kaltura_group_video_widget .kaltura_video_widget {
	background: #dedede;
}
