<?php
include("php/conexion.php"); // el include es para llamar a un archivo
include("php/validarSesion.php");

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Red Social</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <header>
        <div id="logo">
            <img src="Imagenes/logofb.png" alt=""></a>
        </div>
        <div class="navegador">
            <nav class="menu">
                <li><a href="miperfil.php">Mi Perfil</a></li>
                <li><a href="misFotos.php">Mis Fotos</a></li>
                <li><a href="misamigos.php">Mis Amigos</a></li>
                <li><a href="buscaramigos.php">Buscar amigos</a></li>
                <li><a href="php/cerrarSesion.php">Cerrar Sesion</a></li>
            </nav>
        </div>
    </header>
    <section class="perfil">
        <img src='<?php echo "$_SESSION[fotoPerfil]" ?>' alt="">
        <div class="perfil-info">
            <h1><?php echo "$_SESSION[nombre] $_SESSION[apellidos] " ?></h2>
            <p><?php echo "$_SESSION[descripcion] "?></p>
        </div>
    </section>

    <h2>Mis amigos:</h2>
    <section class="amigos">
        <?php
        $consulta = "Select *
                    From persona P
                    Where P.Nickname in (Select A.Nickname2
                                        From amistad A
                                        Where A.Nickname1='$nickname')
                                        Limit 3";
        $datos = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {        
        ?>

        <section class="amigo">
            <div class="amigo-foto">
                <img src="<?php echo $fila['Fotoperfil'] ?>" alt="">
            </div>
            <h2><?php echo $fila['Nombre'] . " " . $fila['Apellidos'] ?></h2>
            <p class="parrafo">
                <?php echo $fila['Descripcion'] ?>
            </p>
            <a href="<?php echo "perfil.php?nickname=".$fila['Nickname']  ?>" class="boton">Ver Perfil</a>
        </section>
        <?php
         }
        ?>

    </section>



    <h2>Mis fotos</h2>
    <section class="fotos">
        <?php
        $consulta = "Select *
                    From fotos F
                    Where F.Nickname='$nickname'
                    Limit 3";
        $datos = mysqli_query($conexion, $consulta);
        while ($fila = mysqli_fetch_array($datos)) {        

        ?>
        <section class="foto">
            <img src="<?php echo $fila['NombreFoto'] ?>" alt="">
        </section>
        <?php
         }
        ?>
        
    </section>

</body>

</html>