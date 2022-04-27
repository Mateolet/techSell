<?php  

include 'includes/header.html';  
include 'includes/nav.php';  
require 'funciones/conexion.php';
require 'funciones/publicaciones.php';
$pubs = listarPubs();

?>


<style>
    .desc:hover{
        cursor: pointer;
        text-decoration: underline;
    }

    #descripcionLight{
            width: 500px;
        border: solid 1px;
        word-wrap: break-word;
        /* margin: auto; */
        position: absolute;
        z-index: 100;
        background: red;
        /* top: 50%; */
        margin-left: -250px;
        left: 50%;
        top: 50%;
    }
    
</style>
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

        <div id="descripcionLight" style="display: none;">
         
        </div>
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
        
    const clickRemove = (div)=>{
        let body = document.querySelector("body");
        
        console.log("entre")   
    }



    let descrip = document.getElementsByClassName("desc");
    let divLight = document.querySelector("#descripcionLight")
    console.log(divLight)
    for(let i = 0; i<descrip.length; i++){
        descrip[i].addEventListener("click",(e)=>{
            
            console.dir(descrip[i].dataset.desc)
            divLight.innerHTML = descrip[i].dataset.desc
            divLight.style.display = "block"
            
            
            
            
        })
        clickRemove(divLight);            
    }
    
</script>

<?php  include 'includes/footer.php';  ?>