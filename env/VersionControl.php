<?php

namespace Env;

class VersionControl
{
    public static function swap()
    {
        $setting = Setting::instance();

        if (version_compare($setting->getMinVersion(), PHP_VERSION) >= 0) {
            return;
        }

        $script = $setting->getScriptPath();

        if (!$script) {
            echo sprintf("\033[41m App requires version >= %s, your version is: %s",
                $setting->getMinVersion(),
                PHP_VERSION
            );

            exit(1);
        }

        if (!exec($script)) {
            echo sprintf("\033[41m Please switch the PHP version manually");
            exit(1);
        }
    }
}