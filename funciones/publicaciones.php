<?php


####### Crud de usuarios


function listarPubs()
{
   
    $link = conectar();
        $sql = 'SELECT idPub, namePub, date,descPu, estado as estadoID, CONCAT(u.name," ",u.surname) as nomApUser,
         case when estado = 1 then "PUBLICADO" else "NO PUBLICADO" end as estado
          FROM pub as p INNER JOIN users as u ON u.idUser = p.idUser';
        $resultado = mysqli_query($link, $sql)
         or die(mysqli_error($link)); // die para encontrar el error. se ejecuta antes del nav y header por eso no hay header ni nav
         return($resultado);
        // return $resultado;
}

// function listarEstado(){

//         $link = conectar();
//         $sql = 'SELECT  TOP 1 estado as estadoID,
//                 case when estado = 1 then "PUBLICADO" else "NO PUBLICADO" end as estado
//                 from pub ';
//         $resultado = mysqli_query($link, $sql)
//          or die(mysqli_error($link)); // die para encontrar el error. se ejecuta antes del nav y header por eso no hay header ni nav
//          return($resultado);

// }

// function listarUsuarioPorID(){



//         $idUser = $_GET["idUser"];

//         $link = conectar();

//         $sql = "SELECT idUser, name, surname, instagram,facebook,tel
//                  FROM users
//                 WHERE idUser = ".$idUser;

//         $resultado = mysqli_query($link, $sql);
        
//                 //obtenemos datos en array asociativo
//         $usuario = mysqli_fetch_assoc($resultado);

//         return $usuario;

// }

// function agregarUsuario(){

//         $nombreUsu = $_POST["name"];
//         $surname = $_POST["surname"];
//         $instagram = $_POST["instagram"];
//         $facebook = $_POST["facebook"];
//         $telefono = $_POST["telefono"];

//         $link = conectar();
//         //Agregar usuario siempre hay que tener los campos llenos que tengan la tabla
//         $sql = "INSERT INTO users
//                         VALUES
//                         (DEFAULT,'".$nombreUsu."',
//                             '".$surname."',
//                             '".$instagram."',
//                             '".$facebook."',
//                             '".$telefono."'
//                                )";
//       $resultado = mysqli_query($link, $sql)
//                         or die(mysqli_error($link));


//         return $resultado;

// }


// function verUsuarioPorID(){

//         $idUsuario = $_GET["idUsuario"];

//         $link = conectar();

//         $sql = "SELECT idUsuario, usuNombre, usuApellido, usuEmail
//                 FROM usuarios
//                 WHERE idUsuario = ".$idUsuario;

//         $resultado = mysqli_query($link, $sql)
//                 or die(mysqli_error($link));
        
//                 //obtenemos datos en array asociativo
//         $usuario = mysqli_fetch_assoc($resultado);

//         return $usuario;

// }


// function modificarUsuario(){

//         $idUsuario = $_POST["idUsuario"];
//         $usuNombre = $_POST["usuNombre"];    
//         $usuApellido = $_POST["usuApellido"];    
//         $usuEmail = $_POST["usuEmail"]; 

//         $link = conectar();

//         $sql = "UPDATE usuarios
//                 SET  usuNombre = '".$usuNombre."',
//                         usuApellido = '".$usuApellido."',
//                         usuEmail = '".$usuEmail."'
//                 WHERE idUsuario = ".$idUsuario;

//         $resultado = mysqli_query($link,$sql)
//                 or die(mysqli_error($link));

//         return $resultado;

// }

// function verContraseñaPorID(){



//         $idUsuario = $_GET["idUsuario"];

//         $link = conectar();

//          $sql = "SELECT idUsuario,usuPass 
//                 FROM usuarios
//                 WHERE idUsuario = ".$idUsuario;

//         $resultado = mysqli_query($link,$sql)
//                 or die(mysqli_error($link));

//         $usuario = mysqli_fetch_assoc($resultado);
 
//         return  $usuario;
// }

// function modificarContraseña(){
//         $idUsuario = $_POST["idUsuario"];
//         $usuPass = $_POST["usuPass"];

//         $link = conectar();


//         $sql = "UPDATE usuarios
//                 SET usuPass = '".$usuPass."'
//                 WHERE idUsuario =".$idUsuario;

        
//         $resultado = mysqli_query($link,$sql)
//         or die(mysqli_error($link));


//         return $resultado;
// }




// function eliminarUsuario(){

//         $idUsuario = $_POST["idUsuario"];
    


//         $link = conectar();

//         $sql = "DELETE FROM usuarios
//                 WHERE idUsuario = ".$idUsuario;

//         $resultado = mysqli_query($link,$sql)
//                 or die(mysqli_error($link));

//         return $resultado;

// }