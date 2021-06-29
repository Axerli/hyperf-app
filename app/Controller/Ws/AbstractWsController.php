<?php

declare(strict_types = 1);

namespace App\Controller\Ws;

use Hyperf\SocketIOServer\BaseNamespace;
use Hyperf\SocketIOServer\Room\AdapterInterface;
use Hyperf\SocketIOServer\Room\EphemeralInterface;
use Hyperf\SocketIOServer\SidProvider\SidProviderInterface;
use Hyperf\SocketIOServer\SocketIOConfig;
use Hyperf\Utils\ApplicationContext;
use Hyperf\WebSocketServer\Sender;

class AbstractWsController extends BaseNamespace
{
    public function __construct(Sender $sender, SidProviderInterface $sidProvider, ?SocketIOConfig $config = null)
    {
        parent::__construct($sender, $sidProvider, $config);

        /* @var AdapterInterface adapter */
        $this->adapter = make(AdapterInterface::class, ['sender' => $sender, 'nsp' => $this]);
        if ($this->adapter instanceof EphemeralInterface) {
            if ($config === null) {
                $config = ApplicationContext::getContainer()->get(SocketIOConfig::class);
            }
            $this->adapter->setTtl(
                $config->getPingInterval() * 3
            );
        }
    }
}