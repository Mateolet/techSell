<?php  

	include 'includes/header.html';  
	include 'includes/nav.php';  
    require 'funciones/imagenes.php';
    $img = listarImg();
    $imgasd = mysqli_fetch_assoc($img);
    function imagen(string $url){

        return  '<img src="'.$url.'" class="img-thumbnail img-top mt-1">';

};
?>

    <main class="container">
        <h1>Alta de un Usuario</h1>


    <div class='alert bg-light p-4 col-8 mx-auto border shadow-sm'>
 

            <?= imagen("./abm/".$imgasd["img1"])?>
            <?= imagen("./abm/".$imgasd["img2"])?>
            <?= imagen("./abm/".$imgasd["img3"])?>

    </div>


    </main>