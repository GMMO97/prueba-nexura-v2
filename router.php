<?php
    include_once("controllers/Controller".ucfirst($controller).".php");
    
    $objectController = "Controller".ucfirst($controller);

    $controller = new $objectController();

    $controller->$action();
?>