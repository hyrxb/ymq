<?php
namespace App\Common;

use App\Common\Config;

class Logger
{
    use \App\Traits\Singleton;

    public function getLogger($name = 'default')
    {
        $log_config = $this->getLogConfig();
        $config = $log_config[$name];
        $handler = $config['handler'];
        $log_file = $config['file'];

        $logger = new \Monolog\Logger($name);
        $logger->pushHandler(new $handler($log_file));

        return $logger;
    }

    protected function getLogConfig()
    {
        return Config::getInstance()->get('loggers');
    }
}
