<?php
namespace Youtube\Api;

class Router
{
  public $routes = array();

  public function __construct()
  {
    $this->addNewRoute("teste", "GET", "Este é um GET");
    $this->addNewRoute("teste", "POST", "Este é um POST");

    $this->getRequestRoute();
  }

  private function addNewRoute($route, $method, $resouce)
  {
    $route = array(
      "route" => $route, 
      "method" => $method, 
      "resouce" => $resouce
    );
    array_push($this->routes, $route);
  }

  private function getRequestRoute()
  {
    // var_dump($_SERVER);
    $arrayStringURL = explode("/", $_SERVER['REQUEST_URI']);
    $method = $_SERVER['REQUEST_METHOD'];

    foreach ($this->routes as $key => $route) {
      if($arrayStringURL[1] == $route['route'] && $method == $route['method']){
        echo $route['resouce'];
      }
    }
  }
}
