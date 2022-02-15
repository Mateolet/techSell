<?php


const SERVER = "localhost";
const USUARIO = "root";
const CLAVE = "root";
const BASE = "techsell";

function conectar()
{
    $link = mysqli_connect(
        SERVER, //hostname
        USUARIO, // usuario
        CLAVE, // contraseña
        BASE // Nombre de la base de datos       
    );

    return $link;
}


