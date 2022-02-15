<?php
  require 'funciones/conexion.php';
  $nombreUsu = $_POST["name"];
$surname = $_POST["surname"];
$instagram = $_POST["instagram"];
$facebook = $_POST["facebook"];
$telefono = $_POST["telefono"];
$link = conectar();
//Agregar usuario siempre hay que tener los campos llenos que tengan la tabla
$sql = "INSERT INTO users
                VALUES
                (DEFAULT,'".$nombreUsu."',
                    '".$surname."',
                    '".$instagram."',
                    '".$facebook."',
                    '".$telefono."'
                       )";


$resultado = mysqli_query($link,$sql);

echo json_encode($resultado);

// $numRows = mysqli_num_rows($resultado);
// echo $numRows;
// if(mysqli_num_rows($resultado)>0){
//     echo json_encode(array('OK' => 1));
// }else{
//     echo json_encode(array('False' => 0));
// }


