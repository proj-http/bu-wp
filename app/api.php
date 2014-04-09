<?php

use App\Models\WPObject;

$api->get('/:type(/)', function($type) use ($api)
{
  $args = ['type' => $type] + $api->request()->get();
  $response = $api->response();
  $response->status(200);
  $response['Content-Type'] = 'application/json';

  $payload = WPObject::find($args);
  echo json_encode($payload);
});
