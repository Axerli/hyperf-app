<?php

declare(strict_types = 1);

use Hyperf\AsyncQueue\Driver\DriverFactory;
use Hyperf\AsyncQueue\JobInterface;
use Hyperf\ExceptionHandler\Formatter\FormatterInterface;

if (!function_exists('di')) {
    /**
     * @param string|null $id
     * @return mixed|\Psr\Container\ContainerInterface
     */
    function di(?string $id = '')
    {
        $container = \Hyperf\Utils\ApplicationContext::getContainer();
        if (!$id) {
            return $container;
        }

        return $container->get($id);
    }
}

if (!function_exists('throwable_format')) {
    /**
     * format throwable to string.
     * @param Throwable $throwable
     * @return string
     */
    function throwable_format(Throwable $throwable): string
    {
        return di(FormatterInterface::class)->format($throwable);
    }
}

if (!function_exists('dispatch')) {
    /**
     * dispatch a job to async queue
     * @param JobInterface $job
     * @param int          $delay
     * @param string       $key
     * @return bool
     */
    function dispatch(JobInterface $job, int $delay = 0, string $key = 'default')
    {
        return di(DriverFactory::class)->get($key)->push($job, $delay);
    }
}