<?php
include ("php/conexion.php");// el include es para llamar a un archivo
include ("php/validarSesion.php") ;

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
            <img src="Imagenes/logofb.png" width="400px" alt=""></a>
        </div>
        <div class="navegador">
            <nav class="menu">
                <li><a href="miPerfil.php">Mi Perfil</a></li>
                <li><a href="misFotos.php">Mis Fotos</a></li>
                <li><a href="misAmigos.php">Mis Amigos</a></li>
                <li><a href="buscarAmigos.php">Buscar amigos</a></li>
                <li><a href="php/cerrarSesion.php">Cerrar Sesion</a></li>
            </nav>
        </div>
    </header>

    <section class="perfil">
    <img src='<?php echo "$_SESSION[fotoPerfil]" ?>' alt="">
        <div class="perfil-info">
        <h2><?php echo "$_SESSION[nombre] $_SESSION[apellidos] " ?></h2>
            <form action="php/cambiarFoto.php" method="post" enctype="multipart/form-data">
            Cambiar foto de perfil 
           <br> <div class="inputs">
                <input  type="file" name="archivo" accept=".jpg, .png" required />
                <input type="submit" name="subir" value="Subir">
            </div>
            </form>
        </div>
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
    <br>
    
    <h3>
        <form action="php/subirFoto.php" method="post" enctype="multipart/form-data">
        Subir Foto <input type="file" name="archivo"  accept=".jpg, .png" required />
        <input type="submit" name="subir" value="Subir">
        </form>
    </h3>
</body>

</html>