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
                        <a href="formAgregarUsuarios.php" class="btn btn-outline-secondary">
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
                        <a href="formEliminarUsuario.php?" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
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

<?php  include 'includes/footer.php';  ?>