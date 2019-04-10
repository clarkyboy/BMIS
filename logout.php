<?php

    require_once 'classes/Controller/RoutesController.php';
    $routes = new RoutesController;
    session_start();
    session_destroy();
    echo $routes->index();

?>