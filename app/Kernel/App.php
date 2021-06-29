<?php

declare(strict_types = 1);

namespace App\Kernel;

class App
{
    public static string $name;

    public static function getName(): string
    {
        if (!self::$name) {
            self::init();
        }

        return self::$name;
    }

    public static function init(): void
    {
        self::$name = (string) config('app_name');
    }
}