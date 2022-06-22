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

    var_dump($conteoArchivos = count($_FILES['archivos']['name']));
    $img = array();

    for($i = 0; $i<$conteoArchivos; $i++){


       $ubiTemp = $_FILES['archivos']['tmp_name'][$i];
    
       $nombre = $_FILES['archivos']['name'][$i];
    
       $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    
       $nuevoNombre = sprintf("%s_%d.%s",uniqid(), $i,$ext);
       array_push($img,$nuevoNombre);
       move_uploaded_file($ubiTemp,$nuevoNombre);
    }
    

    foreach($img as $key => $name) {
        switch ($key) {
            case 0:
                $img1 = $name;
                break;
            case 1:
                $img2 = $name;
                break;
            case 2:
                $img3 = $name;
                break;
        }

    }
    $conexion = conectar();

    // $query = INSERT INTO pub (idPub,namePub,fechaPub,estado,idUser,descPu) VALUES (DEFAULT,'".$producto."','$fecha','".$estado."','".$seller."','".$descripcion."')";
   
    $producto = $_POST["producto"];
    $estado = $_POST["estado"];
    $seller = $_POST["seller"];
    $descripcion = $_POST["descripcion"];
    $fecha = $_POST["fecha"];

    $sql = "INSERT INTO pub (idPub,namePub,fechaPub,estado,idUser,descPu) VALUES (DEFAULT,'".$producto."','$fecha','".$estado."','".$seller."','".$descripcion."')";

    $respuesta = mysqli_query($conexion,$sql);

    $ultimoId =  mysqli_insert_id($conexion);

    $query = "INSERT INTO imgpub(idimg, img1, img2, img3, idPub) VALUES (DEFAULT, '".$img1."','".$img2."','".$img3."','$ultimoId')";

    $res = mysqli_query($conexion,$query);


    if($respuesta == true){
        $resultado["estado"] = true;
        $resultado["mensaje"] = "Producto $producto cargado correctamente";
    }else{
            $resultado["estado"] = false;
            $resultado["mensaje"] = "No se pudieron cargar los datos. Contactar con Soporte";
    }
    echo json_encode($resultado);
}else if($_POST["accion"] == "eliminar"){


    $checks = $_POST["checkSelected"];

    $conexion = conectar();

    $sql = "DELETE FROM pub WHERE idPub in ($checks)";


    $respuesta = mysqli_query($conexion,$sql);

    // var_dump($sql);die;

    
    if($respuesta == true){

        $resultado["estado"] = true;
        $resultado["mensaje"] = "Producto eliminado correctamente";


    }else{
        $resultado["estado"] = true;
        $resultado["mensaje"] = "Error al eliminar el producto COD:0005";

    }
    echo json_encode($resultado);

    
}