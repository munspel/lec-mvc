<?php

namespace lisnyak\mvc\core\components;

class Router {

    public $defaultRoute = "site/index";
    public $controllerNamespace = "lisnyak\mvc\controllers";
    public $routes = [
//        "news/list" => "news/list",
//        "news/(?<id>\d+)" => "news/view",
        "(?<controller>\w+)/(?<action>\w+)" => "<controller>/<action>",
        "(?<controller>\w+)/(?<action>\w+)/(?<id>\d+)" => "<controller>/<action>",
        "(?<controller>\w+)/(?<action>\w+)/(?<id>\w+)/(?<param>\w+)" => "<controller>/<action>"
            //"(?<route>(?<controller>\\w+)\\/(?<action>\\w+)(\\/\\w+)*)([?&]?(?<param>.*))'"=>
    ];

    public function getUri() {
        return trim($_SERVER['REQUEST_URI'], " /");
    }

    /**
     * 
     * @return boolean
     */
    public function run() {
        $parsed = $this->parseRequest();
        $params = $parsed["params"];
       
        $tm = explode("/", $parsed["route"]);

        $controllerID = $tm[0];
        $actionID = $tm[1];

        $controller_class = $this->controllerNamespace . "\\" . ucfirst($controllerID) . "Controller";
        $actionName = "action" . ucfirst($actionID);

        if (class_exists($controller_class)) {
            $controller = new $controller_class();
            if (method_exists($controller, $actionName)) {
                call_user_func_array(array($controller, $actionName), $params);
            } else {
                throw new \Exception("Action  $actionName does not exist!");
            }
        } else {
            throw new \Exception("Controller class $className does not exist!");
        }
        //print_r($obj);
    }

    /**
     * Return parsed url;
     * @throws Exception
     * @return array
     */
    public function parseRequest() {
        $result = [
            "route" => $this->defaultRoute,
            "params" => [],
        ];
        $uri = $this->getUri();


        foreach ($this->routes as $key => $val) {

            // Prepare pattern 
            $pattern = '/' . str_replace("/", "\/", $key) . '/';

            if (preg_match($pattern, $uri, $matches)) {
//                echo "<pre>";
//                print_r($matches);
//                echo "</pre>";

                $route = $val;

                foreach ($matches as $name => $value) {
                    if (is_integer($name)) {
                        unset($matches[$name]);
                    }
                }
//                echo "<pre>";
//                print_r($matches);
//                echo "</pre>";
                if (count($matches) > 1) {
                    $result['route'] = array_shift($matches) . "/" . array_shift($matches);
                    $result['params'] = $matches;
                } else {
                    $result['route'] = $route;
                }
            }
        }

        return $result;
    }

}
