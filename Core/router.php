<?php

namespace Core;

class Router{

    protected $routes = [];

    public function add($method, $uri, $controller){
        return $this->routes[]= compact('method','uri','controller');
    }
    public function get($uri, $controller){
        return $this->add('GET',$uri,$controller);
    }
    public function post($uri,$controller){
        return $this->add('POST',$uri,$controller);
    }
    public function delete($uri,$controller){
        return $this->add('DELETE',$uri,$controller);
    }
    public function patch($uri,$controller){
        return $this->add('PATCH',$uri,$controller);
    }
    public function put($uri,$controller){
        return $this->add('PUT',$uri,$controller);
    }
    public function route($uri, $method){
        foreach($this->routes as $route){
            if($route['uri']===$uri && $route['method']===strtoupper($method)){
                return require basePath($route['controller']);
            }
        }
        $this->abort(); 
    }
    protected function abort($code = 404)
    {
        http_response_code($code);
    
        require view("errors/{$code}");
    
        die();
    }
}