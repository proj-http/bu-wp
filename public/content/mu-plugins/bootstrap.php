<?php

use WPPlugins\WPExtend\ContentType;

/**
 * Plugin Name: App Bootstrap
 * Depends: Classes
 */

add_action('plugins_loaded', function () {
  $articles = new ContentType('articles', [
    'supports' => ['editor', 'title', 'revisions', 'custom-fields', 'thumbnail']
  ], [
    'singular_name' => 'Article'
  ]);

  $projects = new ContentType('projects', [
    'supports' => ['editor', 'title', 'revisions', 'custom-fields', 'thumbnail']
  ], [
    'singular_name' => 'Project'
  ]);
});
