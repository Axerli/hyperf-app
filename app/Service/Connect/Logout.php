<?php

declare(strict_types = 1);

namespace App\Service\Connect;

class Logout extends AbstractConnection
{

    public function process(): void
    {
        $this->removeSidMap();
    }

    private function removeSidMap(): void
    {
        $this->mapService->remove($this->information->getUserId(), $this->information->getSid());
    }
}