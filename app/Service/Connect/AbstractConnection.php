<?php

declare(strict_types = 1);

namespace App\Service\Connect;

use App\Service\Socket\SidMapService;
use Hyperf\Di\Annotation\Inject;

abstract class AbstractConnection implements ConnectionService
{
    #[Inject]
    protected SidMapService $mapService;

    public function __construct(protected Information $information){}

}