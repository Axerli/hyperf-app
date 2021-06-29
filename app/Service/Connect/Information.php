<?php

declare(strict_types = 1);

namespace App\Service\Connect;

use App\Util\WsContext;
use Hyperf\SocketIOServer\SidProvider\SidProviderInterface;

class Information
{

    public static function instance(): Information
    {
        $fd  = WsContext::getFd();
        $sid = make(SidProviderInterface::class)->getSid($fd);

        return new self(WsContext::getUser(), $fd, $sid);
    }

    private function __construct(
        private int $userId = 0,
        private int $fd = 0,
        private string $sid = '',
    )
    {}

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return int
     */
    public function getFd(): int
    {
        return $this->fd;
    }

    /**
     * @return string
     */
    public function getSid(): string
    {
        return $this->sid;
    }
}