<?php

use Core\{Container,Database};

$container=new Container();

$container->bind('Core\Database',function (){
    
    $config =require basePath('/Config/config.php');

    $db = new Database($config['mysql']);
});