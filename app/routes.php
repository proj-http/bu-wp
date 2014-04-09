<?php

use \App\Models\WPObject;

$app->get('/', function() use ($template)
{
  $posts = WPObject::find();
  echo $template->render('index.html.twig', ['posts' => $posts]);
});

$app->get('/posts/:post_id', function($post_id) use ($template)
{
  $post = WPObject::find($post_id);
  echo $template->render('post.html.twig', ['post' => $post]);
});
