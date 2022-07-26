<?php

declare(strict_types = 1);

use SmartWallet\UserClient\UserServiceClient;

require_once 'vendor/autoload.php';

$userServiceClient = new UserServiceClient('http://172.17.0.1:8081/');
$data = $userServiceClient->createUser('b3c0b25b-80e9-4d54-9d02-a93616b49f56', ['name' => 'NewUser' . mt_rand(0,99999)]);

echo json_encode($data);