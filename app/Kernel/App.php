<?php

declare(strict_types = 1);

namespace App\Kernel;

class App
{
    public static string $appName = '';

    public static function getAppName(): string
    {
        if (!self::$appName) {
            self::init();
        }

        return self::$appName;
    }

    public static function init(): void
    {
        self::$appName = config('app_name');
    }
}