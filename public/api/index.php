<?php

require '../../config/wordpress.php';

$api = new \Slim\Slim();

require '../../app/api.php';

$api->run();
