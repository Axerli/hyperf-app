<?php

declare(strict_types = 1);

namespace App\Kernel\Socket;

use App\Util\WsContext;
use Hyperf\SocketIOServer\SidProvider\SidProviderInterface;
use Hyperf\SocketIOServer\SocketIO;

class SidProvider implements SidProviderInterface
{

    public function getSid(int $fd): string
    {
        WsContext::setFd($fd);

        return implode('#', [
            SocketIO::$serverId,
            $fd,
            WsContext::getUser(),
        ]);
    }

    public function isLocal(string $sid): bool
    {
        [$serverId, ,] = explode('#', $sid);

        return $serverId === SocketIO::$serverId;
    }

    public function getFd(string $sid): int
    {
        [, $fd, ] = explode('#', $sid);

        return (int) $fd;
    }
}