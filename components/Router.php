<?php
    class Router{
        private $routes;

        public function __construct(){
            $routesPath = ROOT.'/config/routes.php';
            $this->routes = include($routesPath);
        }
        //Return request string
        private function getURI(){
            if(!empty($_SERVER['REQUEST_URI'])){
                return trim($_SERVER['REQUEST_URI'],'/');
            }
        }
        public function run(){
            $uri = $this->getURI();
            foreach($this->routes as $uriPattern => $path){
                // Сравниваем полученный URI с имеющимися в массиве routes
                if(preg_match("~$uriPattern~", $uri)){
                    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

                    // Определяем controller и action
                    $segments = explode('/', $internalRoute);
                    $controllerName = array_shift($segments).'Controller';
                    $controllerName = ucfirst($controllerName);
                    $actionName = 'action'.ucfirst(array_shift($segments));
                    $params = $segments;
                    
                    //Include controller's file
                    $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';
                    if (file_exists($controllerFile)){
                        include_once($controllerFile);
                    }

                    // Create controller object, create method -> action
                    $controllerObject = new $controllerName;
                    $result = call_user_func_array(array($controllerObject, $actionName), $params);
                    if ($result != null){
                        break;
                    }
                break;
                }
            }
        }
    }
?>