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

        <table class="table table-borderless table-striped table-hover" style="border-collapse: collapse;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Producto</th>
                    <th>Estado</th>
                    <th>Sellers</th>
                    <th>Descripcion</th>
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
                    <td id="descrip" class="desc" style="width: 22px;" data-desc="<?=$pub['descPu'] ?>">Ver Descripcion</td>
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
        
    

    let descrip = document.getElementsByClassName("desc");
    
    for(let i = 0; i<descrip.length; i++){
        descrip[i].addEventListener("click",()=>{
            
            console.dir(descrip[i].dataset.desc)
    
        })
    }
   
</script>

<?php  include 'includes/footer.php';  ?>