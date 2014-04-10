<?php

use \App\Models\WPObject;
use \App\Models\Blog;

$blog = new Blog;

$app->get('/', function() use ($app, $blog)
{
  $posts = WPObject::find();
  echo $app->twig->render('index.html.twig', ['posts' => $posts, 'site' => $blog]);
});

$app->get('/:post_name', function($post_name) use ($app)
{
  $post = WPObject::find(['name' => $post_name])[0];
  echo $app->twig->render('post.html.twig', ['post' => $post]);
});
