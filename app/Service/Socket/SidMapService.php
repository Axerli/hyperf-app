<?php

declare(strict_types = 1);

namespace App\Service\Socket;


interface SidMapService
{
    public function set(int $userId, string $sid): void;

    public function getSidByUser(int $userId): string;

    public function multiGetSid(int ...$userId): array;

    public function remove(int $userId, string $sid): int;

    public function delete(int $userId): void;

    public function has(int $userId): bool;
}