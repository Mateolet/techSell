<?php  

	include 'includes/header.html';  
	include 'includes/nav.php';  
    require 'funciones/imagenes.php';
    $img = listarImg();
    $imagenes = mysqli_fetch_assoc($img);
    

    function imagen(string $url){

        return  '<img src="'.$url.'" class="img-thumbnail img-top mt-1">';

};
?>

    <main class="container">
        <h1>Imagenes</h1>


    <div class='alert bg-light p-4 col-8 mx-auto border shadow-sm'>
 <?php 
    if($imagenes == null){?>

        <h2>No se encontraron imagenes</h2> 
        
    <?php
    exit;}
    ?>
            <?= imagen("./abm/".$imagenes["img1"])?>
            <?= imagen("./abm/".$imagenes["img2"])?>
            <?= imagen("./abm/".$imagenes["img3"])?>

    </div>


    </main>