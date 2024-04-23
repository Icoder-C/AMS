<?php

use Core\Container;
use Core\Database;
use Core\App;

$container=new Container();

$container->bind('Core\Database',function (){
    
    $config =require basePath('/Core/Config/config.php');

    return  new Database($config['mysql']);
}); 
App::setContainer($container);




