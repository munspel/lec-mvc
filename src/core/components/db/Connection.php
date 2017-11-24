<?php

namespace lisnyak\mvc\core\components\db;

use Illuminate\Database\Capsule\Manager as Capsule;

class Connection extends \lisnyak\mvc\core\BaseObject {

    public $driver = 'mysql';
    public $host = 'localhost';
    public $database;
    public $username;
    public $password;
    public $charset = 'utf8';
    public $collation = 'utf8_unicode_ci';
    public $prefix = '';
    public $capsule;

    /**
     * Capsule commander
     * @return \Illuminate\Database\Capsule\Manager;
     */
    public function getCommander() {
        return $this->capsule;
    }

    public function __construct($config = array()) {

        parent::__construct($config);
    }

    public function init() {
        parent::init();

        $this->capsule = new Capsule();

        $this->capsule->addConnection([
            'driver' => $this->driver,
            'host' => $this->host,
            'database' => $this->database,
            'username' => $this->username,
            'password' => $this->password,
            'charset' => $this->charset,
            'collation' => $this->collation,
            'prefix' => $this->prefix,
        ]);

        $this->capsule->setEventDispatcher(new \Illuminate\Events\Dispatcher(new \Illuminate\Container\Container));

        // Make this Capsule instance available globally via static methods... (optional)
        $this->capsule->setAsGlobal();

        // Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
        $this->capsule->bootEloquent();
    }

}
