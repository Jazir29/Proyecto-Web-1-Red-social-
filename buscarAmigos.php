<?php
include("php/conexion.php"); // el include es para llamar a un archivo
include("php/validarSesion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <header>
        <div id="logo">
            <img src="Imagenes/logofb.png" width="400px" alt=""></a>
        </div>
        <div class="navegador">
            <nav class="menu">
                <li><a href="miperfil.php">Mi Perfil</a></li>
                <li><a href="misFotos.php">Mis Fotos</a></li>
                <li><a href="misamigos.php">Mis Amigos</a></li>
                <li><a href="buscaramigos.php">Buscar Amigos</a></li>
                <li><a href="php/cerrarSesion.php">Cerrar Sesion</a></li>
            </nav>
        </div>
    </header><br>
    <h2>Personas</h2>
    <section class="amigos">
        <?php
        $consulta = "Select *
                    From persona P
                    Where P.Nickname !='$nickname' and P.Nickname not in (Select A.Nickname2
                                        From amistad A
                                        Where A.Nickname1='$nickname')";
        $datos = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {
        ?>

            <section class="amigo">
            <div class="amigo-foto">
                    <img src="<?php echo $fila['Fotoperfil'] ?>">
                </div>
                <h2><?php echo $fila['Nombre'] . " " . $fila['Apellidos'] ?></h2>
                <p class="parrafo">
                    <?php echo $fila['Descripcion'] ?>
                </p>
                <a href="<?php echo "perfil.php?nickname=".$fila['Nickname']  ?>" class="boton">Ver Perfil</a>
                <a href="<?php echo "php/agregarAmigo.php?nickname=".$fila['Nickname']  ?>" class="boton">Agregar</a>
            </section>
        <?php
        }
        ?>

    </section>

</body>

</html>