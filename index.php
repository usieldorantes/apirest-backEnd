<?php
require_once('conexion.php');
require_once('api.php');
require_once('cors.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method == "GET") {
    if(!empty($_GET['id'])){
      $id = $_GET['id'];  
      $api = new Api();
      $obj = $api->getTarea($id);
      $json = json_encode($obj);
      echo $json;     

    }else{
      $vector = array();
      $api = new Api();
      $vector = $api->getTareas();
      $json = json_encode($vector);
      echo $json;
    }
}
if($method=="POST"){
    $json = null;
    $data = json_decode(file_get_contents("php://input"), true);
    $nombre = $data['nombre'];
    $descripcion = $data['descripcion'];
    $minutos = $data['minutos'];
    $minutosF = $data['minutosF'];
    $api = new Api();
    $json = $api->addTarea($nombre, $descripcion, $minutos, $minutosF);
    echo $json;
}

if($method=="DELETE"){
    $json = null;
    $id = $_REQUEST['id'];
    $api = new Api();
    $json = $api->deleteTarea($id);
    echo $json;
}

if($method=="PUT"){
    $json = null;
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $nombre = $data['nombre'];
    $descripcion = $data['descripcion'];
    $minutos = $data['minutos'];
    $minutosF = $data['minutosF'];
    $api = new Api();
    $json = $api->updateTarea($id, $nombre, $descripcion, $minutos, $minutosF);
    echo $json;
}

?>