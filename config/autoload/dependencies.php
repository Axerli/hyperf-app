<?php

declare(strict_types = 1);
/**
 * This file is part of Hyperf.
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
return [

    /* socket.io
     * ---------------------------------------- */
    \Hyperf\SocketIOServer\SidProvider\SidProviderInterface::class => \App\Kernel\Socket\SidProvider::class,

    \Hyperf\SocketIOServer\SocketIO::class => \App\Kernel\Socket\SocketIOFactory::class,

    \Hyperf\SocketIOServer\Room\AdapterInterface::class => \App\Kernel\Socket\RedisAdapter::class,

    \App\Service\Socket\SidMapService::class => \App\Service\Socket\SidMap::class,
];
