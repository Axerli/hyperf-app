<?php

declare(strict_types = 1);

namespace App\Kernel\Socket;

use App\Kernel\App;
use Hyperf\Redis\RedisFactory;
use Hyperf\SocketIOServer\NamespaceInterface;
use Hyperf\SocketIOServer\Room\RedisAdapter as BaseRedisAdapter;
use Hyperf\SocketIOServer\SidProvider\SidProviderInterface;
use Hyperf\WebSocketServer\Sender;

class RedisAdapter extends BaseRedisAdapter
{
    public function __construct(RedisFactory $redis, Sender $sender, NamespaceInterface $nsp, SidProviderInterface $sidProvider)
    {
        $this->redisPrefix = App::$appName . ':' . $this->redisPrefix;

        parent::__construct($redis, $sender, $nsp, $sidProvider);
    }
}