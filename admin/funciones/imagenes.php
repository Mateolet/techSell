<?php


####### Crud de usuarios


function listarImg()
{    
        
        require 'conexion.php';

   
    $idPub = $_GET["idPub"];
    $link = conectar();
        $sql = 'select p.namePub, i.img1,i.img2,i.img3 from imgpub as i 
                inner join pub as p on p.idPub = i.idPub
                where p.idPub = '.$idPub;
        $resultado = mysqli_query($link, $sql)
         or die(mysqli_error($link)); // die para encontrar el error. se ejecuta antes del nav y header por eso no hay header ni nav
         return $resultado;
        // return $resultado;
}
