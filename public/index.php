<?php require '../helpers.php';

$routes = require '../routes.php';

$uri = $_SERVER['REQUEST_URI'];

//inspectAndDie($uri);

if (array_key_exists($uri, $routes)) {
    require(basePath($routes[$uri]));
}
else {
    require basePath($routes['404']);
}

?>
