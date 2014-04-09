<?php

require_once '../../config/wordpress.php';
header("Content-type: application/json");

$api = new \Slim\Slim();

require_once '../../app/api.php';
