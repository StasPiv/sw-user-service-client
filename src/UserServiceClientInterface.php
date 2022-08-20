<?php

declare(strict_types = 1);

namespace SmartWallet\UserClient;

interface UserServiceClientInterface
{
    public function createUser(array $data): array;

    public function readUser(string $userId): array;

    public function readUsers(array $filter): array;

    public function updateUser(string $ownerId, string $userId, array $data = []): array;

    public function deleteUser(string $ownerId, string $userId): bool;
}