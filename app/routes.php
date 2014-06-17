<?php

use \App\Models\WPObject;
use \App\Models\Post;
use \App\Models\Blog;

$app->get('/', function() use ($app)
{
  $posts = WPObject::find();
  echo $app->twig->render('index.html.twig', ['posts' => $posts]);
});

$app->get('/:post_name', function($post_name) use ($app)
{
  $post = WPObject::find(['name' => $post_name])[0];
  echo $app->twig->render('post.html.twig', ['post' => $post]);
});
