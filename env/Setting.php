<?php


namespace Env;


class Setting
{
    private $minVersion;

    private $scriptPath;

    public static function instance()
    {
        return new self;
    }

    /**
     * @return string
     */
    public function getMinVersion()
    {
        return $this->minVersion;
    }

    /**
     * @return string
     */
    public function getScriptPath()
    {
        return $this->scriptPath;
    }

    private function __construct()
    {
        $config = $this->loadConfig();

        $this->minVersion = $config['min_version'] ?? '';
        $this->scriptPath = $config['script_path'] ?? '';
    }

    private function loadConfig()
    {
        defined('BASE_PATH') or  define('BASE_PATH', dirname(__DIR__, 1));

        return require BASE_PATH . '/env/config.php';
    }
}