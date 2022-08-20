<?php

declare(strict_types = 1);

namespace SmartWallet\UserClient;

class UserServiceClient implements UserServiceClientInterface
{
    public function __construct(
        private string $userServiceUrl,
    ) {
    }

    public function createUser(array $data): array
    {
        $ch = curl_init();
        $url = $this->userServiceUrl . 'create.php';

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $serverOutput = curl_exec($ch);
        curl_close ($ch);

        if ($serverOutput === false) {
            return ['error' => 'user not created'];
        }

        return json_decode($serverOutput, true);
    }

    public function readUser(string $userId): array
    {
        $urlString = "$this->userServiceUrl/read.php?" .
            http_build_query(
                [
                    'user_id' => $userId,
                ],
            );

        $serverOutput = file_get_contents($urlString);

        return json_decode($serverOutput, true);
    }

    public function readUsers(array $filter): array
    {
        $urlString = "$this->userServiceUrl/read-many.php?" .
            http_build_query(
                [
                    'filter' => $filter,
                ],
            );

        $serverOutput = file_get_contents($urlString);

        return json_decode($serverOutput, true);
    }

    public function updateUser(string $ownerId, string $userId, array $data = []): array
    {
        // TODO: Implement updateUser() method.
    }

    public function deleteUser(string $ownerId, string $userId): bool
    {
        // TODO: Implement deleteUser() method.
    }
}