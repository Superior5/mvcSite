<?php 

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include($routesPath);
    }

    /*
     *   Return request string
     */
     
    private function getURI(){
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run ()
    {
        // Получить строку запроса 
        $uri = $this->getURI();
        // Проверить наличие такого запроса в routes.php

        foreach($this->routes as $uriPattern => $path){
            
            // Сравнваем $uriPattern и $uri
            if(preg_match("~$uriPattern~", $uri)){
                // Определить контроллер, action параметры

                $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
                $segments = explode('/', $internalRoute);


                $controllerName = ucfirst(array_shift($segments)).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segments));
                
                $parametrs = $segments;
     





                // Подключить файла класс контроллера
                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if(file_exists($controllerFile)) {
                    include_once($controllerFile);
                }

                // Срздать объект, и вызвать метод (т.е. action)
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parametrs);

                if($result != null){
                    break;
                }
            }
        }
    }

}

?>