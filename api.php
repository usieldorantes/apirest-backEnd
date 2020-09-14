<?php

class Api{
public function getC(){

   $vector = array();
   $conexion = new Conexion();
   $db = $conexion->getConexion();
   $sql = "SELECT * FROM tareas WHERE (fecha > DATE_SUB(NOW(), INTERVAL 1 WEEK)) and (estatus='completado' or estatus='pendiente') ORDER BY  estatus DESC, minutos ASC";
   $consulta = $db->prepare($sql);
   $consulta->execute();
   while($fila = $consulta->fetch()) {
       $vector[] = array(
         "id" => $fila['id'],
         "nombre" => $fila['nombre'],
         "descripcion" => $fila['descripcion'],
         "minutos" => $fila['minutos'],
         "minutosT" => $fila['minutosT'],
         "minutosF" => $fila['minutosF'],
         "fecha" => $fila['fecha'],
         "estatus" => $fila['estatus'] );
         }//fin del ciclo while 

   return $vector;
}

public function getTareas(){

   $vector = array();
   $conexion = new Conexion();
   $db = $conexion->getConexion();
   $sql = "SELECT * FROM tareas WHERE estatus='en curso'";
   $consulta = $db->prepare($sql);
   $consulta->execute();
   while($fila = $consulta->fetch()) {
       $vector[] = array(
         "id" => $fila['id'],
         "nombre" => $fila['nombre'],
         "descripcion" => $fila['descripcion'],
         "minutos" => $fila['minutos'],
         "minutosT" => $fila['minutosT'],
         "minutosF" => $fila['minutosF'],
         "fecha" => $fila['fecha'],
         "estatus" => $fila['estatus'] );
         }//fin del ciclo while 

   return $vector;
}

public function getTarea($id){

  $vector = array();
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "SELECT * FROM tareas WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);  
  $consulta->execute();
  while($fila = $consulta->fetch()) {
      $vector[] = array(
        "id" => $fila['id'],
        "nombre" => $fila['nombre'],
        "descripcion" => $fila['descripcion'],
        "minutos" => $fila['minutos'],
         "minutosT" => $fila['minutosT'],
         "minutosF" => $fila['minutosF'],
         "fecha" => $fila['fecha'],
         "estatus" => $fila['estatus']);
        }//fin del ciclo while 

  return $vector[0];
}


public function addTarea($nombre, $descripcion, $minutos, $minutosF){
  
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "INSERT INTO tareas (nombre, descripcion, fecha, estatus, minutos, minutosT, minutosF) VALUES (:nombre,:descripcion,CURDATE(),'pendiente',:minutos,'',:minutosF)";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':nombre', $nombre);
  $consulta->bindParam(':descripcion', $descripcion);
  $consulta->bindParam(':minutos', $minutos);
  $consulta->bindParam(':minutosF', $minutosF);
  $consulta->execute();

  return '{"msg":"tarea agregada"}';
}

public function deleteTarea($id){
  
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "DELETE FROM tareas WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id); 
  $consulta->execute();

  return '{"msg":"tarea eliminada"}';
}

public function updateTarea($id, $nombre, $descripcion, $minutos, $minutosF){
  
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "UPDATE tareas SET nombre=:nombre, descripcion=:descripcion, minutos=:minutos, minutosF=:minutosF WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);  
  $consulta->bindParam(':nombre', $nombre);
  $consulta->bindParam(':descripcion', $descripcion);
  $consulta->bindParam(':minutos', $minutos);
  $consulta->bindParam(':minutosF', $minutosF);
  $consulta->execute();

  return '{"msg":"tarea actualizada"}';
}
public function updateTiempo($id, $minutosT, $minutosF){
  
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "UPDATE tareas SET minutosT=:minutosT, minutosF=:minutosF WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);  
  $consulta->bindParam(':minutosT', $minutosT);
  $consulta->bindParam(':minutosF', $minutosF);
  $consulta->execute();

  return '{"msg":"tiempo actualizada"}';
}

public function UpdateEstatus($id,$estatus){
  
  $conexion = new Conexion();
  $db = $conexion->getConexion();
  $sql = "UPDATE tareas SET estatus=:estatus WHERE id=:id";
  $consulta = $db->prepare($sql);
  $consulta->bindParam(':id', $id);  
  $consulta->bindParam(':estatus', $estatus);
  $consulta->execute();

  return '{"msg":"estatus actualizada"}';
}


}

?>