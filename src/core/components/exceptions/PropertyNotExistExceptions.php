<?php

namespace lisnyak\mvc\core\components\exceptions;

class PropertyNotExistExceptions extends Exception {

    public function getName() {
        return "PropertyNotExistExceptions.";
    }

    public function __construct($message = "", $code = 0, $previous = null) {
        if (!$message)  $message = $this->getName();
        parent::__construct($message, $code, $previous);
    }

}
