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

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Presentacion</th>
                    <th>Imagen</th>
                    <th colspan="2">
                        <a href="formAgregarProducto.php" class="btn btn-outline-success">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?=$producto['prdNombre'] ?></td>
                    <td>$<?=$producto['prdPrecio'] ?></td>
                    <td><?= $producto['mkNombre'] ?></td>
                    <td><?= $producto['catNombre'] ?></td>
                    <td><?=$producto['prdPresentacion'] ?></td>
                    <!-- <td></td> -->
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
            </tbody>
        </table>

        <a href="admin.php" class="btn btn-outline-secondary my-2">
            Volver a dashboard
        </a>

    </main>

<?php  include 'includes/footer.php';  ?>