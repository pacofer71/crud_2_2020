<!DOCTYPE html>
<?php
session_start();

require "../vendor/autoload.php";

use Clases\Marcas;

$marcas = new Marcas();
$todos = $marcas->recuperarTodas();
$marcas = null;
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <title>Marcas</title>
</head>

<body style="background-color:darksalmon">
    <h3 class="text-center my-3">Marcas</h3>
    <div class="container my-4">
    <?php
            if(isset($_SESSION['mensaje'])){
                echo "<p class='my-2 text-light bg-dark p-4'>{$_SESSION['mensaje']}</p>";
                unset($_SESSION['mensaje']);
            }
        ?>
    <a href="crearMarca.php" class="btn btn-success my-3">Crear Marca</a>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th scope="col">Código</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Provincia</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($fila = $todos->fetch(PDO::FETCH_OBJ)) {
                    echo "<tr>\n";
                    echo "<th scope='row'>{$fila->id_marca}</th>\n";
                    echo "<td>{$fila->nombre}</td>\n";
                    echo "<td>{$fila->provincia}</td>\n";
                    echo "<td>\n";
                    echo "<img src='{$fila->imagen}' width='90rem' height='90rem'>";
                    echo "</td>\n";
                    echo "<td>\n";
                    echo "<form name='b' action='borrarMarca.php' method='POST' class='form from-inline'>\n";
                    echo "<a href='updateMarca.php?id={$fila->id_marca}' class='btn btn-info mr-2'>Editar</a>";
                    echo "<input type='hidden' name='marcaId' value='{$fila->id_marca}'>\n";
                    echo "<input type='submit' class='btn btn-danger' value='Borrar'>\n";
                    echo "</form>\n";
                    echo "</td>\n";
                    echo "</tr>\n";
                }

                ?>
            </tbody>
        </table>
    </div>
</body>

</html>