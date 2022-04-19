<?php  

include 'includes/header.html';  
include 'includes/nav.php';  
require 'funciones/conexion.php';
require 'funciones/publicaciones.php';
$pubs = listarPubs();

?>

    <main class="container">
        <h1>Panel de administración de Productos</h1>

        <a href="admin.php" class="btn btn-outline-secondary my-2">
            Volver a dashboard
        </a>

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Estado</th>
                    <th>Sellers</th>
                    <th style="max-width: 200px;">Descripcion</th>
                    <th>Imagen</th>
                    <th colspan="2">
                        <a href="formAgregarProducto.php" class="btn btn-outline-success">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($pubs as $pub): ?>
                <tr>
                    <td><?=$pub['idPub'] ?></td>
                    <td><?=$pub['namePub'] ?></td>
                    <td id="estadoPub"> <?= $pub['estado'] ?> </td>
                    <td><?= $pub['nomApUser'] ?></td>
                    <td><?=$pub['descPu'] ?></td>
                    <td>
                        <a href="imagenProducto.php">Ver Imagen</a>
                    </td>
                    <td>
                        <a href="formModificarProducto.php?" class="btn btn-outline-warning">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="formEliminarProducto.php?" class="btn btn-outline-danger">
                            Eliminar
                        </a>
                    </td>
                </tr>

                <?php endforeach?>
            </tbody>
        </table>

        <a href="admin.php" class="btn btn-outline-secondary my-2">
            Volver a dashboard
        </a>

    </main>


<script>
    //ESTADO DE PUBLICACIÓN
    let estadoPub = document.getElementById("estadoPub");
    let estado = estadoPub.dataset.estado;
    // if(estado == 1){
    //     estadoPub.innerText = "PUBLICADO";
    // }else{
    //     estadoPub.innerText = "NO PUBLICADO"
    // } 
        
    
</script>

<?php  include 'includes/footer.php';  ?>