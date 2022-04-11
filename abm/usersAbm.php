
<?php



require "../funciones/conexion.php";

// echo json_encode($_POST);
// die;


if($_POST["accion"] == "agregar"){

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
    }elseif($_POST["accion"] == "modificar"){
                $idUser = $_POST["idUser"];
                $nombreUsu = $_POST["name"];
                $surname = $_POST["surname"];
                $instagram = $_POST["instagram"];
                $facebook = $_POST["facebook"];
                $telefono = $_POST["telefono"];

                $link = conectar();
        
                $sql = "UPDATE users
                        SET  name = '".$nombreUsu."',
                        surname = '".$surname."',
                        instagram = '".$instagram."',
                        facebook = '".$facebook."',
                        tel = '".$telefono."'
                        WHERE idUser = ".$idUser;
        
                        $resultado = mysqli_query($link,$sql);

                        echo json_encode($resultado);
    }elseif($_POST["accion"] == "eliminar"){


        $idUser = $_POST["idUser"];
        $nombreUsu = $_POST["name"];
        $link = conectar();
        $sql = "DELETE FROM users WHERE idUser = ".$idUser;

        $resultado = mysqli_query($link,$sql);
        if($resultado == true){
            $respuesta["estado"] = true;
            $respuesta["mensaje"] = "Usuario Eliminado correctamente";
        }else{
            $respuesta["estado"] = false;
            $respuesta["mensaje"] = "Tiene un producto relacionado. Eliminar el producto y luego el usuario";
        }
        echo json_encode($respuesta);
    }