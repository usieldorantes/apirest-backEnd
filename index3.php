<?php
require_once('conexion.php');
require_once('api.php');
require_once('cors.php');
$method = $_SERVER['REQUEST_METHOD'];

if($method=="PUT"){
    $json = null;
    $data = json_decode(file_get_contents("php://input"), true);
    $id = $data['id'];
    $minutosT = $data['minutosT'];
    $minutosF = $data['minutosF'];
    $api = new Api();
    $json = $api->updateTiempo($id, $minutosT, $minutosF);
    echo $json;
}
?>