<?php
namespace Yr\Common;

class Config
{
    use \Yr\Traits\Singleton;

    private function __construct()
    {
        $this->config = new \Noodlehaus\Config(ROOT_DIR . '/config/main.php');
    }

    public function __call($method, $args)
    {
        return call_user_func_array([$this->config, $method], $args);
    }
}
