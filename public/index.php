<?php

define('WP_USE_THEMES', false);
define('WP_SYS_DIR', dirname(__DIR__));
require('site/wp-blog-header.php');

/** Instantiate Twig and Slim */
$app = new \Slim\Slim;
$twig_loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/app/templates');

$plugins = get_option('active_plugins', []);

if (! empty($plugins)) {
  foreach ($plugins as $plugin) {
    $path = WP_PLUGIN_DIR . '/' . $plugin;
    require_once $path;
  }
}

/** Capture wp_head */
ob_start();

do_action('wpseo_head');
do_action('wpseo_opengraph');
$head = ob_get_contents();
ob_end_clean();

/** Add twig to slim app container */
$app->container->singleton('twig', function() use($twig_loader)
{
  return new Twig_Environment($twig_loader);
});

/** Add debug extension */
$app->twig->addExtension(new Twig_Extension_Debug);

/** Include filters */
require_once dirname(__FILE__) . '/filters.php';

/** Add wp_head to global variables */
$app->container->twig->addGlobal('wp_head', $head);

require_once(APP_ROOT . '/app/routes.php');

$app->run();
