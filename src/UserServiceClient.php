<?php

declare(strict_types = 1);

namespace SmartWallet\UserClient;

class UserServiceClient implements UserServiceClientInterface
{
    public function __construct(
        private string $userServiceUrl,
    ) {
    }

    public function createUser(string $ownerId, array $data): array
    {
        $ch = curl_init();
        $url = $this->userServiceUrl . 'create.php';
        $dataForPost = array_merge(['owner_id' => $ownerId], $data);

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($dataForPost));
        // Receive server response ...
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $serverOutput = curl_exec($ch);
        curl_close ($ch);

        if ($serverOutput === false) {
            return ['error' => 'user not created'];
        }

        return json_decode($serverOutput, true);
    }

    public function readUser(string $ownerId, string $userId): array
    {
        // TODO: Implement readUser() method.
    }

    public function readUsers(string $ownerId, array $filter): array
    {
        $urlString = "$this->userServiceUrl/read-many.php?" .
            http_build_query(
                [
                    'owner_id' => $ownerId,
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