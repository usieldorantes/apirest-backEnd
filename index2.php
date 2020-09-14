<?php
require_once('conexion.php');
require_once('api.php');
require_once('cors.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method=="GET"){
    $vector = array();
      $api = new Api();
      $vector = $api->getC();
      $json = json_encode($vector);
      echo $json;
}

if($method=="PUT"){
    $json = null;
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $estatus = $data['estatus'];
    $api = new Api();
    $json = $api->UpdateEstatus($id, $estatus);
    echo $json;
}

?>