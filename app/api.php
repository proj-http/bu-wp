<?php

use App\Models\WPObject;
use Slim\Http\Response;

$api->response->headers->set('Content-Type', 'application/json');

$api->get('/:type(/)', function($type) use ($api)
{
  $args = ['type' => $type] + $api->request()->get();
  $payload = WPObject::find($args);
  $api->response->status(200);
  echo json_encode($payload);
});

$api->get('/:type/:id(/)', function($type, $id) use ($api)
{
  $args = ['type' => $type, 'ID' => $id] + $api->request()->get();
  $payload = WPObject::find($args)[0];
  $api->response->status(200);
  echo json_encode($payload);
});
