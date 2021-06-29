<?php

declare(strict_types = 1);

namespace App\Service\Connect;


class Login extends AbstractConnection
{
    public function process(): void
    {
        $this->saveSidMap();
    }

    protected function saveSidMap(): void
    {
        $this->mapService->set($this->information->getUserId(), $this->information->getSid());
    }
}