<?php

namespace lisnyak\mvc\core;

use lisnyak\mvc\core\components\db\Connection;

/**
 * Base entry point class
 * http://container.thephpleague.com/
 * https://github.com/illuminate/database
 * 
 * @property lisnyak\mvc\core\components\db\Connection $db 
 * @property lisnyak\mvc\core\BaseObject $obj
 */
class Core {

    /**
     * @var lisnyak\mvc\core\Core
     */
    private static $instance;

    /**
     * @var \League\Container\Container;
     */
    protected static $container;

    /**
     * Return Core instance
     * @return \lisnyak\mvc\core\Core
     */
    public static function getInstance() {
        if (empty(static::$instance)) {
            static::$instance = new Core();
        }

        return static::$instance;
    }

    public static function configure($object, $properties) {
        foreach ($properties as $name => $value) {
            $object->$name = $value;
        }

        return $object;
    }

    public function run($config = null) {

        static::init($config);

        $router = new \lisnyak\mvc\core\components\Router();
        $router->run();
        //$router->run();
    }

    protected static function init($config = []) {
        /* @var $container \League\Container\Container */
        if (!static::$container) {
            static::$container = new \League\Container\Container();
        }
        if (isset($config["components"])) {
            static::loadComponents($config["components"]);
        }
    }

    public function __get($name) {

        if (static::$container->has($name)) {
            return static::$container->get($name);
        } else {
            throw new components\exceptions\ConteinerNotInitException();
        }
    }

    protected static function loadComponents($config) {
        if (static::$container) {

            foreach ($config as $name => $params) {
                if (is_string($params)) {
                    static::$container->add($name, $params);
                } elseif (is_array($params) && isset($params['class'])) {
                    $class = $params['class'];
                    unset($params['class']);
                    $boot = false;
                    if (isset($params['boot'])) {
                        $boot = $params['boot'];
                        unset($params['boot']);
                    }
                    if ($boot) {
                        static::$container->add($name, $class, true)->withArgument($params)->build();
                    } else {
                        static::$container->add($name, $class, true)->withArgument($params);
                    }
                }
            }
        } else {
            throw new components\exceptions\CoreExceptions();
        }
    }

    private function __construct() {
        
    }

    private function __clone() {
        
    }

    protected function __wakeup() {
        
    }

    protected function __sleep() {
        
    }

}
