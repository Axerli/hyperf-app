<?php

declare(strict_types = 1);

namespace App\Service\Connect;

interface ConnectionService
{
    public function process(): void;
}