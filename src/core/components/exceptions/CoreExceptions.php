<?php

namespace lisnyak\mvc\core\components\exceptions;

class CoreExceptions extends Exception {

    public function getName() {
        return "Unknown core exception.";
    }

    public function __construct($message = "", $code = 0, $previous = null) {
        if (!$message)  $message = $this->getName();
        parent::__construct($message, $code, $previous);
    }

}
