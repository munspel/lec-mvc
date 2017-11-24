<?php

namespace lisnyak\mvc\core\components;

abstract class BaseView extends \lisnyak\mvc\core\BaseObject {

    public $layout;
    
    public $controller;

    abstract public function render($name, $data = []);

    abstract public function renderPartial($name, $data = []);
    
    public function __construct($controller) {
       $this->controller = $controller;
    }
}
