<?php

namespace lisnyak\mvc\core\components\exceptions;

class ConteinerNotInitException extends Exception {

    public function getName() {
        return "ConteinerNotInitException.";
    }

    public function __construct($message = "", $code = 0, $previous = null) {
        if (!$message)  $message = $this->getName();
        parent::__construct($message, $code, $previous);
    }

}
