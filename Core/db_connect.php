<?php

use Core\Container;
use Core\Database;
use Core\App;

$container=new Container();

$container->bind('Core\Database',function (){
    $config =require basePath('/Core/Config/config.php');
    return  new Database($config['mysql'],"root","1234");
}); 
App::setContainer($container);




