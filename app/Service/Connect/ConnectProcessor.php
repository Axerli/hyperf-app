<?php

declare(strict_types = 1);

namespace App\Service\Connect;

class ConnectProcessor
{
    public static function process(string $class): void
    {
        if (!class_exists($class)) {
            return;
        }
        /** @var ConnectionService $connection */
        $connection = make($class, [Information::instance()]);
        if (!$connection instanceof ConnectionService) {
            return;
        }

        $connection->process();
    }
}