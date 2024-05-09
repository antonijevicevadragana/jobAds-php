<?php 
require '../helpers.php';
require basePath('Framework/Database.php');




//$routes = require '../routes.php';

require_once basePath('Framework/Router.php');
$router= new Router();
$routes = require basePath('routes.php');

$uri =parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ;
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
?>
