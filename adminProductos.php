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
                    <th>Seleccionar</th>
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
                    <td><input type="checkbox" data-id="<?=$pub['idPub']?>" id="Seleccion" class="seleccionarCheck"></td>
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



let htmlColl = document.getElementsByClassName("seleccionarCheck");

let checkSel = Array.from(htmlColl);

console.log(checkSel);


        let sel = [];

    checkSel.forEach((e) => {
        e.addEventListener("click",()=>{
                console.log(e.dataset.id); 
        if(e.checked == true){
            dataId = e.dataset.id
                sel.push(dataId)
                console.log(sel);
             
        }else if(e.checked == false){
            sel = sel.filter((n) => {
                 return n !== e.dataset.id
                console.log(n,"n");
            })
            // El filter me va a generar un "nuevo array" o modifcar el mismo cuando n 
            // sea distinto del id que esta sacando es decir n 15 es disnto de 13 si, de 14 si, de 15 no , entonces lo saca 
            //elemento filtro si es verdadero sino lo quita
            // FILTER: si es igual la condicion va a generar la modificacion del array con el n === 16 , va a dejar el array sel solo ["16"];
            // FILTER: si es disntinto va a generar la modificaocn del arrray con n !== 16 queda sel ["14","15"] saca al 16
            console.log(sel);
            } 
        }) 
    })
        

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