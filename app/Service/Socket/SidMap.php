<?php

declare(strict_types = 1);

namespace App\Service\Socket;


use App\Kernel\App;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Redis\Redis;

class SidMap implements SidMapService
{
    #[Inject]
    protected Redis $cache;

    public function set(int $userId, string $sid): void
    {
        $this->cache->hSet($this->sidMapCacheKey(), (string) $userId, $sid);
    }

    public function getSidByUser(int $userId): string
    {
        return (string) $this->cache->hGet($this->sidMapCacheKey(), (string) $userId);
    }

    public function multiGetSid(int ...$userId): array
    {
        $users = array_map(fn($id) => (string) $id, $userId);

        $sids = $this->cache->hMGet($this->sidMapCacheKey(), $users);

        return array_combine($userId, $sids);
    }

    public function remove(int $userId, string $sid): int
    {
        $current = $this->getSidByUser($userId);
        if ($current !== $sid) {
            return 1;
        }

        $this->delete($userId);
        return 0;
    }

    public function delete(int $userId): void
    {
        $this->cache->hDel($this->sidMapCacheKey(), (string) $userId);
    }

    public function has(int $userId): bool
    {
        return (bool) $this->cache->hExists($this->sidMapCacheKey(), (string) $userId);
    }

    protected function sidMapCacheKey(): string
    {
        return implode(':', [
            App::$appName,
            'user_sid_map',
        ]);
    }
}