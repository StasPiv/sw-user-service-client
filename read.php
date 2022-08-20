<?php

declare(strict_types = 1);

use SmartWallet\UserClient\UserServiceClient;

require_once 'vendor/autoload.php';

$userServiceUrl = getenv('USER_SERVICE') ?: '172.17.0.1';

$userServiceClient = new UserServiceClient('http://' . $userServiceUrl);
$data = $userServiceClient->readUser($argv[1]);

echo json_encode($data);