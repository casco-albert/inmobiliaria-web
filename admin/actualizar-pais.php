<?php

//Obtenemos la propiedad en base al id que recibimos por GET
include("conexion.php");
$id_pais = $_GET['id'];

//Armamos el query para seleccionar el pais
$query = "SELECT * FROM paises WHERE id='$id_pais'";

//Ejecutamos la consulta
$result = mysqli_query($conn, $query);
$pais = mysqli_fetch_assoc($result);
/************************************************************* */

if (isset($_GET['modificar'])) {
    //nos conectamos a la base de datos
    include("conexion.php");

    //tomamos los datos que vienen del formulario
    $id = $_GET['id'];
    $nombre_pais = $_GET['nombre_pais'];

    //armamos el query para actualizar el pais
    $query = "UPDATE paises SET nombre_pais='$nombre_pais' WHERE id='$id'" ;

    //actualizamos en la tabla paises
    if (mysqli_query($conn, $query)) { //Se actualizo correctamente
        $mensaje = "El pais se actualizó correctamente";
    } else {
        $mensaje = "No se pudo actualizar en la BD" . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
    <title>BUSINESS - Admin</title>
</head>

<body>
    <?php include("header.php"); ?>
    <div id="contenedor-admin">
        <?php include("contenedor-menu.php"); ?>

        <div class="contenedor-principal">
            <!-- utilizamos el id de nuevo-tipo-pais para aprovechar los estilos ya creados -->
            <div id="nuevo-pais">
                <h2>Actualizar Pais</h2>
                <hr>

                <div class="box-nuevo-tipo">
                    <h3>Actualizar Pais</h3>
                    <hr>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="get">
                        <input type="hidden" name="id" value="<?php echo $pais['id'] ?>"> 
                        <input type="text" name="nombre_pais" value="<?php echo $pais['nombre_pais'] ?>" placeholder="Nombre del pais" required>
                        <input type="submit" name="modificar" value="Modificar" class="btn-accion">
                    </form>

                    <?php if (isset($_GET['modificar'])) : ?>
                        <script>
                            alert("<?php echo $mensaje ?>");
                            window.location.href = 'index.php';
                        </script>
                    <?php endif ?>

                </div>

            </div>
        </div>
    </div>
</body>

</html>