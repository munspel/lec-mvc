<?php

namespace lisnyak\mvc\core\components;

class View extends BaseView {

    public function render($name, $data = array()) {
        print_r($data);
    }

    public function renderPartial($name, $data = array()) {
        print_r($data);
    }

}
