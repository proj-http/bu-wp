<?php

use \App\Models\WPObject;

$app->get('/', function() use ($template)
{
  $posts = WPObject::find();
  echo $template->render('index.html.twig', ['posts' => $posts]);
});

$app->get('/:post_name', function($post_name) use ($template)
{
  $post = WPObject::find(['name' => $post_name])[0];
  echo $template->render('post.html.twig', ['post' => $post]);
});
