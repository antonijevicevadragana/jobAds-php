<?php
namespace Framework;


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

    public function registerRoute($method, $uri, $controller)
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller
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
     * Load error page
     * @param int $code
     * @return void
     */

     public function error($code = 404) {
        http_response_code($code);
        loadView('errors/' . $code);
        exit;
     }

    /**
     * Route the request
     * @param $uri
     * @param $method
     * @return void
     */

    public function route($uri, $method) {

        foreach($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] && $method) {
                require basePath('App/' . $route['controller']);
                return;
            }
        }

        $this->error();
    }
}
