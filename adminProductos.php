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
            <!-- Ponerle el display none -->
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





    let descrip = document.getElementsByClassName("desc");
    let divLight = document.querySelector("#descripcionLight")
    let x = document.querySelector("#salir");
    console.log(x)

    console.log(descrip)



    for(let i = 0; i<descrip.length; i++){
        //Se recorren las descripciones para poder listarlas segun el click que se le de en el momento
        descrip[i].addEventListener("click",(e)=>{

            let divX = document.createElement("div");
            let imgX = document.createElement("img");

            divX.className = "imgDescSalir";

            divLight.appendChild(divX);
            divX.appendChild(imgX);
            
            console.log(imgX)
            imgX.src = "img/iconCruz.png"
            imgX.id = "salir"

            let ptext = document.createElement("p");
            ptext.id = "textoDesc";

            ptext.innerText = descrip[i].dataset.desc;
            divLight.append(ptext);
            console.log(divLight)
            // divLight.innerHTML = descrip[i].dataset.desc;
            divLight.style.display = "block"

            let borradoP = document.querySelectorAll("#textoDesc")
            let borradoD = document.querySelectorAll("#imgDescSalir")

        
            divX.addEventListener("click",()=>{
                for(let l = 0; l<borradoP.length; l++){
                borradoP[l].remove();
               console.log(borradoD[l])
               console.log("ENTRA")
                divLight.style.display = "none";
                divX.remove();
            }
    })

  
            

        })
    }

  
    
</script>

<?php  include 'includes/footer.php';  ?>