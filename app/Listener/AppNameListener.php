<?php

declare(strict_types = 1);

namespace App\Listener;

use App\Kernel\App;
use Hyperf\Event\Annotation\Listener;
use Hyperf\Event\Contract\ListenerInterface;
use Hyperf\Framework\Event\BeforeMainServerStart;

#[Listener]
class AppNameListener implements ListenerInterface
{

    public function listen(): array
    {
        return [
            BeforeMainServerStart::class,
        ];
    }

    public function process(object $event)
    {
        App::init();
    }
}