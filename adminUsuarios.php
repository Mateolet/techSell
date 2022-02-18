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
                <tr>
                    <td><?=$user['idUser']   ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['surname'] ?></td>
                    <td><?= $user['instagram']  ?></td>
                    <td><?= $user['facebook']  ?></td>
                    <td><?= $user['tel']  ?></td>
                    <td>
                        <a href="formModificarUsuarios.php?idUser=<?=$user["idUser"]?>" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <button class="btn btn-danger btn-agarrar-data" id="btnEliminar" value="<?= $user["idUser"] ?>">
                            Eliminar
                        </button>
                    </td>
                </tr>
                <?php
                endforeach
                ?>
            </tbody>
        </table>
                
        <a href="admin.php" class="btn btn-outline-secondary my-2">
            Volver a dashboard
        </a>
        <br>
       

    </main>


    <script>

            let btnEliminar = document.getElementById("btnEliminar");
            let btn = document.getElementsByClassName("btn-agarrar-data")
                    
            for(let i = 0; i<btn.length; i++){  
                btn[i].addEventListener('click',()=>{     
                console.log(btn[i].value,"click")



                    })
                }   

        /* Hacerlo aca*/
    </script>

<?php  include 'includes/footer.php';  ?>