<?php

/**
 * Adds theme assets to queues.
 *
 * - Modernizr
 * - Respond.js
 * - Selectivizr
 * - Google Fonts style sheet
 * - Theme style sheet
 */
function queue_theme_assets() {
  queue_js_file('modernizr.min');
  get_view()->headScript()->appendFile(src('respond.min.js', 'javascripts'), 'text/javascript', array('conditional' => 'lt IE 9'));
  get_view()->headScript()->appendFile(src('selectivizr.min.js', 'javascripts'), 'text/javascript', array('conditional' => 'lt IE 9'));

  get_view()->headLink()->prependStylesheet('http://fonts.googleapis.com/css?family=Crimson+Text:400,600,400italic,600italic|Cabin:400,600,400italic', 'screen');
  queue_css_file('style');
}

