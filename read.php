<?php

declare(strict_types = 1);

use SmartWallet\UserClient\UserServiceClient;

require_once 'vendor/autoload.php';

$userServiceClient = new UserServiceClient('http://user.local/');
$data = $userServiceClient->readUser('b3c0b25b-80e9-4d54-9d02-a93616b49f56', $argv[1]);

echo json_encode($data);