<?php  

include 'includes/header.html';  
include 'includes/nav.php';  
require 'funciones/conexion.php';
require 'funciones/usuarios.php';
$listarID = listarUsuarioPorID();
?>

    <main class="container">
        <h1>Modificacion de un Usuario</h1>


    <div class='alert bg-light p-4 col-8 mx-auto border shadow-sm'>
        <form  method="POST " id="form">
                <div class='form-group'>
                <label for="nombreUsu">Nombre</label>
                <input type="text"  class='form-oontrol' id="nombreUsu" value="<?= $listarID["name"]?>" >
                <br>
                <label for="surname">Apellido</label>
                <input type="text"  class='form-oontrol' id="surname"   value="<?= $listarID["surname"]?>"  >
                <br>
                <label for="instagram">instagram</label>
                <input type="text" class='form-oontrol' id="instagram"  value="<?= $listarID["instagram"]?>" >
                <br>
                <label for="facebook">Facebook</label>
                <input type="text" class='form-oontrol' id="facebook"  value="<?= $listarID["facebook"]?>" >
                <br>
                <label for="telefono">Telefono</label>
                <input type="tel" class='form-oontrol' id="telefono"  value="<?= $listarID["tel"]?>" >
                <br>
              
                <input type="hidden" name="" id="accion" value="">     
                <input type="hidden" name="" id="id" value="<?= $listarID["idUser"]?>">
            
            </div>
            <div id="divAlerta">

            </div>
            <button class='btn btn-success my-3 mr-3 px-4' id="btnAdd">Modificar usuario</button>
            <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
            Volver a panel de usuarios
            </a>
        </form>

    </div>


    

    </main>

    <script>
        
            // let btnAdd = document.getElementById('btnAdd');
            let formBtn = document.querySelector('#form');
            let alerta = document.getElementById("divAlerta")


            console.log(alerta)

            console.log(formBtn);
            


            formBtn.addEventListener('submit',(e)=>{
                e.preventDefault();
                let formulario = new FormData();

                let inputID = document.getElementById("id").value;
                console.log(inputID)
                let inputName = document.getElementById('nombreUsu').value
                let inputSurname = document.getElementById('surname').value
                let inputInstagram = document.getElementById('instagram').value
                let inputFacebook = document.getElementById('facebook').value
                let inputTelefono = document.getElementById('telefono').value
                let inputAccion = document.getElementById('accion')
                inputAccion.value = "modificar";

                formulario.append('idUser',inputID)
                formulario.append('name',inputName)
                formulario.append('surname',inputSurname)
                formulario.append('instagram',inputInstagram)
                formulario.append('facebook',inputFacebook)
                formulario.append('telefono',inputTelefono)
                formulario.append('accion',inputAccion.value)
                

                
                fetch('./abm/usersAbm.php',{
                    method:'POST',
                    body: formulario
                })
                .then(res => res.json())
                .then(datos => {
                    if(datos == true){
                        
                   
                        // let alerta = document.getElementById("divAlerta")
                        alerta.innerHTML = `
                        <div class="alert alert-success" role="alert">
                            Cliente modificado correctamente ${inputName}
                        </div>
                        `
                 
                        setInterval(() => {
                            location.href = 'adminUsuarios.php'
                        }, 4000);
                }
            })
                
            })

    </script> 

<?php  include 'includes/footer.php';  ?>

