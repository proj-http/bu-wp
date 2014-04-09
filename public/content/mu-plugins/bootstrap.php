<?php

use WPPlugins\WPExtend\ContentType;

/**
 * Plugin Name: App Bootstrap
 * Depends: Classes
 */

add_action('plugins_loaded', function () {

  $articles = new ContentType('articles', [
    'singular_name' => 'Article',
    'supports' => ['editor', 'title', 'revisions', 'custom-fields', 'thumbnail']
  ]);

  $projects = new ContentType('projects', [
    'singular_name' => 'Projects',
    'supports' => ['editor', 'title', 'revisions', 'custom-fields', 'thumbnail']
  ]);
});
