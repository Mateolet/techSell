
<?php



require "../funciones/conexion.php";




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
                }