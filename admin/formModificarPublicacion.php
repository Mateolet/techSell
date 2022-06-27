<?php  

include 'includes/header.html';  
include 'includes/nav.php';  
require 'funciones/conexion.php';
require 'funciones/usuarios.php';
require 'funciones/publicaciones.php';
$listarID = listarPubsID();
$users = listarUsuarios();

// var_dump($listarID);exit;
?>

    <main class="container">
        <h1>Modificacion de un Usuario</h1>


    <div class='alert bg-light p-4 col-8 mx-auto border shadow-sm'>
        <form  method="POST " id="form">
                <div class='form-group'>
                <label for="nombreUsu">Nombre</label>
                <br>
                <input type="text"  class='form-oontrol' id="producto" value="<?= $listarID["namePub"]?>" >
                <br>
                Fecha
                <br>
                <input type="date" id="fecha" value="<?=$listarID['fechaPub'] ?>">
                 <br>
                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" rows="3"><?= $listarID['descPu']?></textarea>
                <br>
                Estado <select id="selectEstado"  class="form-control select " aria-label="Default select example">
                    <option id="selectEstado" value="<?= $listarID['estadoID']?>"> <?= $listarID['estado']?></option>
                    <option class="estadoID" id="estadia" value="0"> No publicado</option>
                    <option class="estadoID" id="estadia" value="1"> Publicado </option>
                </select> 
                <br>
                Seller <select id="selectSeller" class="form-control select " aria-label="Default select example">
                    <option selected id="selectSeller" class="seller" value="<?= $listarID['idUser'] ?>"> <?=$listarID["nomApUser"] ?> </option>
                    <?php foreach($users as $usr) : ?>
                    <option class="estadoID" id="estadia" value="<?=$usr["idUser"]?>"> <?=$usr["nomap"] ?> </option>
                    <?php  endforeach ?>
                </select> 

              
                <input type="hidden" name="" id="accion" value="">     
                <input type="hidden" name="" id="id" value="<?= $listarID["idPub"]?>">
            
            </div>
            <div id="divAlerta">

            </div>
            <button class='btn btn-success my-3 mr-3 px-4' id="btnAdd">Modificar Publicacion</button>
            <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
            Volver a panel de usuarios
            </a>
        </form>

    </div>


    

    </main>

    <script>
        
        let fecha = document.getElementById("fecha");
        
       let cambioFecha = fecha.value

                        console.log(cambioFecha);
      fecha.addEventListener("change",()=>{
        cambioFecha = fecha.value;
        console.log('cambio',cambioFecha);
      })


                let formBtn = document.getElementById('form');
                let alerta = document.getElementById("divAlerta");
                
                let selects = document.getElementsByClassName("select")


                console.log(selects)

                let estadoValue = document.getElementById('selectEstado').value;
                let sellerValue = document.getElementById('selectSeller').value;

                for(let i = 0; i < selects.length; i++){

                    selects[i].addEventListener("change",()=>{

                    if(selects[i].id == "selectSeller"){

                         sellerValue = selects[i].value

                    } else if(selects[i].id == "selectEstado"){

                         estadoValue = selects[i].value

                    }
                })
            }

            console.log(sellerValue,estadoValue)


            formBtn.addEventListener('submit',(e)=>{


                            
                e.preventDefault();

                let formulario = new FormData();

                // ENVIO DE IMAGENES
                // let inputArchivo = document.querySelector('#imagenesArc');
                // let archivoParaSubir = inputArchivo.files;
                // for(let archivo of archivoParaSubir){
                //     formulario.append('archivos[]',archivo)
                // }

                let inputID = document.getElementById("id").value;
                let producto = document.getElementById('producto').value
                let estado =   estadoValue;         
                let seller = sellerValue;
                let descripcion = document.getElementById('descripcion').value               
                let inputAccion = document.getElementById('accion')
                inputAccion.value = "modificar";

                // console.log(inputTelefono)
            
                formulario.append('idPub',inputID)
                formulario.append('producto',producto)
                formulario.append('estado',estado)
                formulario.append('seller',seller)
                formulario.append('descripcion',descripcion)
                formulario.append('fecha',cambioFecha)

                console.log(cambioFecha,"cambio")
                formulario.append('accion',inputAccion.value)

                fetch('./abm/prodAbm.php',{
                    method:'POST',
                    body: formulario
                })
                .then(res => res.json())
                .then(datos => {
                    console.log(datos)
                    if(datos.estado == true){
                        alerta.innerHTML = `
                        <div class="alert alert-success" role="alert">
                            ${datos.mensaje}
                        </div>
                        `
                        setInterval(() => {
                            location.href = 'adminProductos.php'
                        }, 2500);
                }else{
                    alerta.innerHTML = `
                        <div class="alert alert-danger" role="alert">
                            Error al agregar, Comunicarse con Soporte 
                        </div>
                        `
                } // FIN DE ULTIMO THEN.


                })
                })
    </script> 

<?php  include 'includes/footer.php';  ?>

