<?
class Router {

    private $routes;

    /**
     * @return mixed
     */
    public function __construct()
    {
        $routesPath = ROOT.'/config/routes.php';
        $this->routes = include ($routesPath);

    }

    /**
     * @return request string
     */
    private function getUri()
    {
        if(!empty($_SERVER['REQUEST_URI'])){
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }


    public function run()
    {
        //получаем стоку запроса
        $uri = $this->getUri();

        //проверяем наличее запроса в routes.php
        foreach ($this->routes as $uriPattern => $path){
            if (preg_match("~$uriPattern~", $uri)){
                $segment = explode('/', $path);

                $controllerName = array_shift($segment).'Controller';
                $actionName = 'action'.ucfirst(array_shift($segment));

                $controllerFile = ROOT . '/controllers/'. $controllerName . '.php';
                if(file_exists($controllerFile)){
                    include_once ($controllerFile);
                }

                $controllerObject = new $controllerName;
                $result = $controllerObject->$actionName();
                if ($result != null){
                    break;
                }
            }
        }
    }
}