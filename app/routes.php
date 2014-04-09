<?php

$app->get('/', function() use ($template)
{
  echo $template->render('index.html.twig');
});
