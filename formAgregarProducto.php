<?php  

	include 'includes/header.html';  
	include 'includes/nav.php';  
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    require 'funciones/publicaciones.php';
    $users = listarUsuarios();
    // $producto = listarEstado();


?>

    <main class="container">
        <h1>Alta de un Usuario</h1>


    <div class='alert bg-light p-4 col-8 mx-auto border shadow-sm'>
        <form  method="post" id="form">
                <div class='form-group'>
                <label for="nombreUsu">Producto</label>
                <input type="text"  class='form-control' id="producto" >

                <!-- HACER EL ESTADO HARDCODEADO. ES DECIR QUE SEA UNICAMENTE 1 O 0. Y QUE LE LLEGUE AL MYSQL CON 1 O 0. -->
                <!--  SI SE HACE DE FORMA LISTADO CUANDO SE AGREGUE MAS DE UN PRODUCTO VA A APARECER ESO PRECISAMENTE. -->
                <br>
                Estado <select id="selectEstado"  class="form-control select " aria-label="Default select example">
                    <option id="select" >Seleccionar estado</option>
                    <option class="estadoID" id="estadia" value="0"> No publicado</option>
                    <option class="estadoID" id="estadia" value="1"> Publicado </option>
                </select> 
                <br>
                Seller <select id="selectSeller" class="form-control select " aria-label="Default select example">
                    <option id="select" >Seleccionar Seller</option>
                    <?php foreach($users as $usr) : ?>
                    <option class="estadoID" id="estadia" value="<?=$usr["idUser"]?>"> <?=$usr["nomap"] ?> </option>
                    <?php  endforeach ?>
                </select> 
                <br>              
                <label for="exampleFormControlTextarea1" class="form-label">Descripcion</label>
                    <textarea class="form-control" id="descripcion" rows="3"></textarea>
                <br>
                Seleccionar Fecha
                  <input type="date" id="fecha">
                <!-- AGREGAR CAMPO IMG -->
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

    <script>
      let fecha = document.getElementById("fecha");
    let cambioFecha 


      fecha.addEventListener("change",()=>{
        cambioFecha = fecha.value;
      })

      let formBtn = document.getElementById('form');
                let alerta = document.getElementById("divAlerta");
                
                let selects = document.getElementsByClassName("select")

                let estadoValue = ""
                let sellerValue = ""

                for(let i = 0; i < selects.length; i++){

                    selects[i].addEventListener("change",()=>{

                    if(selects[i].id == "selectSeller"){

                         sellerValue = selects[i].value

                    } else if(selects[i].id == "selectEstado"){

                         estadoValue = selects[i].value

                    }
                })
            }
               
                // console.log(seller,"seler")

            formBtn.addEventListener('submit',(e)=>{
                e.preventDefault();


                let formulario = new FormData();
                
                let producto = document.getElementById('producto').value
                let estado =   estadoValue;         
                let seller = sellerValue;
                let descripcion = document.getElementById('descripcion').value               
                let inputAccion = document.getElementById('accion')
                inputAccion.value = "agregar";

                // console.log(inputTelefono)
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
                             ${datos.mensaje} ${producto}
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

