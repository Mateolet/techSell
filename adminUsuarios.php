<?php  


	include 'includes/header.html';  
	include 'includes/nav.php';  
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $users = listarUsuarios();
?>

    <main class="container">
        <h1>Panel de administración de usuarios</h1>

        <a href="admin.php" class="btn btn-outline-secondary my-2">
            Volver a dashboard
        </a>

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Instagram</th>
                    <th>Facebook</th>
                    <th>Telefono</th>
                    <th colspan="2">
                        <a href="formAgregarUsuarios.php" class="btn btn-success">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($users as $user):
                ?>
                <tr class="tr-lista">
                    <td><?=$user['idUser']   ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['surname'] ?></td>
                    <td><?= $user['instagram']  ?></td>
                    <td><?= $user['facebook']  ?></td>
                    <td><?= $user['tel']  ?></td>
                    <td>
                        <a href="formModificarUsuarios.php?idUser=<?=$user["idUser"]?>" class="btn btn-outline-warning">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-agarrar-data" data-nombre="<?= $user["name"]?>" id="btnEliminar" value="<?= $user["idUser"] ?>">
                            Eliminar
                        </button>
                    </td>
                </tr>
                <?php
                endforeach
                ?>
            </tbody>
        </table>
              <h2 style="color: red;"></h2>  
        <a href="admin.php" class="btn btn-outline-secondary my-2">
            Volver a dashboard
        </a>
        <br>
       
            

    </main>
    
    <script src="js/funciones.js"></script>

    <script>

        let btnEliminar = document.getElementById("btnEliminar");
        let btn = document.getElementsByClassName("btn-agarrar-data")
        let tr = document.getElementsByClassName("tr-lista")
        let tbody = document.querySelector("tbody")



            for(let i = 0; i<btn.length; i++){  
                btn[i].addEventListener('click',(e)=>{    
                   
                    // divEliminar.style.display = "block";
                    let divEliminar = document.createElement("div")
                    let btnAceptar = document.createElement("button");
                    let btnCancelar = document.createElement("button")
                    divEliminar.id = "eliminarContainer"
                    btnAceptar.id = "AceptarEliminado"
                    btnCancelar.id = "CancelarEliminado"
                    document.body.appendChild(divEliminar)
                    divEliminar.appendChild(btnAceptar)
                    divEliminar.appendChild(btnCancelar)

                    btnAceptar.innerText = "Eliminar"
                    btnCancelar.innerText = "Cancelar"

                    
        

                btnCancelar.addEventListener("click",()=>{

                    document.body.removeChild(divEliminar);
                })
                    // let divEliminar = document.createElement("div")
                    //crearlo en funciones JS
                    //Armar aca mismo el ESTAS SEGURO QUE DESEA ELIMINAR !!!!!!
                btnAceptar.addEventListener("click",()=>{
                    
                    let formulario = new FormData();
                    
                    let inputID = btn[i].value;
                    // console.log(inputID)
                    let inputName = btn[i].dataset.nombre
                    
                    formulario.append('idUser',inputID)
                    formulario.append('name',inputName)
                    formulario.append('accion','eliminar')
                    let h2 = document.querySelector("h2");
                    h2.style.color = "green"
                    
                    fetch('./abm/usersAbm.php',{
                        method:'POST',
                        body: formulario
                    })
                    .then(res => res.json())
                    .then(datos => {
                        if(datos.estado == true){
                            // e.preventDefault();
                            tbody.removeChild(tr[i])
                            h2.style.color = "green"
                            h2.innerText = datos.mensaje
                            document.body.removeChild(divEliminar)
                            
                        }else{
                            h2.style.color = "red"
                            h2.innerText = datos.mensaje
                        }
                    })
                    
                })
            })
            }   
            
            // RECORDAR CAMBIAR LA FOREING KEY A CASCADE EN LA BASE DE DATOS
            

        /* Hacerlo aca*/
    </script>

<?php  include 'includes/footer.php';  ?>