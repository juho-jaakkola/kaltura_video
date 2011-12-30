<?php

/**
 * @param string $action    The name of the action. An action name does not include
 *                          the leading "action/". For example, "login" is an action name.
 * @param array  $form_vars $vars environment passed to the "input/form" view
 * @param array  $body_vars $vars environment passed to the "forms/$action" view
 */

$form_vars = array();

echo elgg_view_form('admin/kaltura_video/server', $form_vars, $vars);