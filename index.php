<?php
global $ruta;
  $controller ="employee";
  $action ="home";
  $php_self = $_SERVER['PHP_SELF'];
  $php_self_array = explode("/", $php_self);

  if(count($php_self_array) > 1){
    $php_self_array = $php_self_array[1];
    $ruta = "http://".$_SERVER["HTTP_HOST"]."/".$php_self_array."/";
  }else{
    $ruta = "https://".$_SERVER["HTTP_HOST"]."/";
  }
  
  if(isset($_GET["controller"]) && isset($_GET["action"])){
      

      if($_GET["controller"] !== "" && $_GET["action"] !== "" ){
        $controller = $_GET["controller"];
        $action = $_GET["action"];
      }

  }
  require_once("views/index.php");
?>