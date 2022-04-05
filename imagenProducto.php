<?php  

	include 'includes/header.html';  
	include 'includes/nav.php';  
?>

    <main class="container">
        <h1>Alta de un Usuario</h1>


    <div class='alert bg-light p-4 col-8 mx-auto border shadow-sm'>
        <form  method="post" id="form">
                <div class='form-group'>
                <label for="nombreUsu">Nombre del Producto</label>
                <input type="text"  class='form-oontrol' id="nombreUsu" >
                <br>
                <label for="surname">Apellido</label>
                <input type="text"  class='form-oontrol' id="surname" >
                <br>
                <label for="instagram">instagram</label>
                <input type="text" class='form-oontrol' id="instagram" >
                <br>
                <label for="facebook">Facebook</label>
                <input type="text" class='form-oontrol' id="facebook" >
                <br>
                <label for="telefono">Telefono</label>
                <input type="tel" class='form-oontrol' id="telefono" >
                <br>
              
                <input type="hidden" name="" id="accion" value="">            
            </div>
            <div id="divAlerta">

            </div>
            <button class='btn btn-success my-3 mr-3 px-4' id="btnAdd">Agregar usuario</button>
            <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
            Volver a panel de usuarios
            </a>
        </form>

    </div>


    </main>