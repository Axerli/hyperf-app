<?php

declare(strict_types = 1);

namespace App\Aspect;

use App\Annotation\Connect;
use App\Kernel\Log\Log;
use App\Service\Connect\ConnectProcessor;
use Hyperf\Di\Annotation\Aspect;
use Hyperf\Di\Aop\AbstractAspect;
use Hyperf\Di\Aop\ProceedingJoinPoint;
use Throwable;

#[Aspect]
class ConnectAspect extends AbstractAspect
{
    public $annotations = [
        Connect::class
    ];

    public function process(ProceedingJoinPoint $proceedingJoinPoint)
    {
        $result = $proceedingJoinPoint->process();

        try {
            $this->connectProcess($proceedingJoinPoint);
        } catch (Throwable $e) {
            Log::logger('app.connect')->error(throwable_format($e));
        }

        return $result;
    }

    protected function connectProcess(ProceedingJoinPoint $joinPoint): void
    {
        /** @var Connect $connect */
        $connect = $joinPoint->getAnnotationMetadata()->method[Connect::class];

        ConnectProcessor::process($connect->connection);
    }
}