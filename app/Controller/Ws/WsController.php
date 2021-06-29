<?php

declare(strict_types = 1);

namespace App\Controller\Ws;

use App\Annotation\Connect;
use App\Service\Connect\Login;
use App\Service\Connect\Logout;
use Hyperf\SocketIOServer\Annotation\Event;
use Hyperf\SocketIOServer\Annotation\SocketIONamespace;
use Hyperf\SocketIOServer\Socket;

#[SocketIONamespace('/')]
#[Event]
class WsController extends AbstractWsController
{
    #[Connect(Login::class)]
    public function connect(Socket $socket, $data): void
    {
        $socket->emit(sprintf('Connected success ! sid:%s', $socket->getSid()));
    }

    #[Connect(Logout::class)]
    public function disconnect(Socket $socket, $data): void
    {

    }

    public function roomJoin(Socket $socket, $data): void
    {
        $rooms = (array) $data;

        $socket->join(...$rooms);
    }

    public function roomLeave(Socket $socket, $data): void
    {
        $rooms = (array) $data;

        $socket->leave(...$rooms);
    }
}