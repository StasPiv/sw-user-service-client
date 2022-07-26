<?php

declare(strict_types = 1);

namespace SmartWallet\UserClient;

interface UserServiceClientInterface
{
    public function createUser(string $ownerId, array $data): array;

    public function readUser(string $ownerId, string $userId): array;

    public function readUsers(string $ownerId, array $filter): array;

    public function updateUser(string $ownerId, string $userId, array $data = []): array;

    public function deleteUser(string $ownerId, string $userId): bool;
}