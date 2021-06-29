<?php

declare(strict_types = 1);

namespace App\Util;

use Hyperf\WebSocketServer\Context;

class WsContext
{
    public static function setFd(int $fd): void
    {
        Context::set('fd', $fd);
    }

    public static function getFd(): int
    {
        return (int) Context::get('fd');
    }

    public static function setUser(int $userId): void
    {
        Context::set('user', $userId);
    }

    public static function getUser(): int
    {
        return (int) Context::get('user');
    }
}