<?php
namespace Framework;

use App\Controllers\ErrorController;


class Router
{
    protected $routes = [];

    /**
     * REGISTER ROUTE
     * @param string $method
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function registerRoute($method, $uri, $action)
    {
        list($controller, $controllerMethod) = explode('@', $action);

        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
            'controllerMethod' => $controllerMethod
        ];
    }

    /**
     * Add a GET route
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function Get($uri, $controller)
    {
        $this->registerRoute('GET', $uri, $controller);
    }

    /**
     * Add a POST route
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function Post($uri, $controller)
    {
        $this->registerRoute('POST', $uri, $controller);
    }


    /**
     * Add a PUT route
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function Put($uri, $controller)
    {
        $this->registerRoute('PUT', $uri, $controller);
    }


    /**
     * Add a DELETE route
     * @param string $uri
     * @param string $controller
     * @return void
     */

    public function Delete($uri, $controller)
    {
        $this->registerRoute('DELETE', $uri, $controller);
    }



    /**
     * Route the request
     * @param $uri
     * @param $method
     * @return void
     */

    public function route($uri, $method) {

        foreach($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === $method) {
               //Extract controller & controller method
               $controller = 'App\\Controllers\\' . $route['controller'];
               $controllerMethod = $route['controllerMethod'];

               //instatiate the controller and call the method
               $conntrolerInstance = new $controller();
               $conntrolerInstance->$controllerMethod();
                return;
            }
        }

       ErrorController::notFound();
    }
}
