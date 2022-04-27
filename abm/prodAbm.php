<?php 


// echo json_encode($_POST);

// $arraysa = ["Mateo","Martin","Martina"];

// $texto = "Mic,Mac,Msl";

// $textoArray = explode(',',$texto); //de texto a array  -> EXPLODE

// echo ($textoArray[0]);

// $decode = implode(",",$arraysa); //de array a txt -> IMPLODE 

// echo $decode;


// echo key($arraysa);
// echo $arraysa["Letteri"];
// var_dump($array);


require '../funciones/conexion.php';

if($_POST["accion"] == "agregar"){

    $producto = $_POST["producto"];
    $estado = $_POST["estado"];
    $seller = $_POST["seller"];
    $descripcion = $_POST["descripcion"];

    $conexion = conectar();

    $sql = "INSERT INTO pub (idPub,namePub,estado,idUser,descPu) VALUES (DEFAULT,'".$producto."','".$estado."','".$seller."','".$descripcion."')";


    $respuesta = mysqli_query($conexion,$sql);


    if($respuesta == true){
        $resultado["estado"] = true;
        $resultado["mensaje"] = "Producto $producto cargado correctamente";
    }else{
            $resultado["estado"] = false;
            $resultado["mensaje"] = "No se pudieron cargar los datos. Contactar con Soporte";
    }
    echo json_encode($resultado);
}