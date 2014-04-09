<?php

define('WP_USE_THEMES', false);
require('site/wp-blog-header.php');

$app = new \Slim\Slim;
$twig_loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/app/templates');
$template = new Twig_Environment($twig_loader);

$app->get('/', function() use ($template)
{
  echo $template->render('index.html.twig');
});

$app->run();
