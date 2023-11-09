<?php
include ("php/conexion.php");// el include es para llamar a un archivo
include ("php/validarSesion.php") ;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <header>
        <div id="logo">
            <img src="Imagenes/logofb.png" width="400px" alt=""></a>
        </div>
    </header>
    <div class="logeo">
        <div class="registro" id="registro">
            <h1>Registrate</h1>
            <form name="Nuevo Usuario" action="php/conexionCrearNuevoUsuario.php" method="post">
                NickName:<br>
                <input type="text" name="nickname"  placeholder="Ingrese su Nickname" required><br>
                Contraseña:<br>
                <input type="password" name="contraseña" minlength="8" autocomplete="off" placeholder="Creee su contraseña" required><br>
                Nombre:<br>
                <input type="text" name="nombre" placeholder="Ingrese su Nombre" required><br>
                Apellido:<br>
                <input type="text" name="apellidos" placeholder="Ingrese su Apellido" required><br>
                Email: <br>
                <input type="email" name="correo" placeholder="Ingrese su email"><br>
                Edad: <br>
                <input type="number" name="edad" placeholder="Ingrese su edad" min="18" ><br>
                Descripcion: <br>
                <textarea name="descripcion" placeholder="Ingrese una descripcion" required></textarea><br>
                <input type="submit" name="enviar" class="boton" value="Registrate">
                <input type="reset" class="boton" value="Borrar">
            </form>
        </div>
        <div class="login" id="login">
            <h1>Iniciar sesion</h1>
            <form name="contacto" action="php/iniciarSesion.php" method="post">
                NickName:<br>
                <input type="text" name="nickname" placeholder="Ingrese su Nickname" required><br>
                Contraseña:<br>
                <input type="password" name="contraseña" minlength="8" autocomplete="off" placeholder="Creee su contraseña" required><br>
        
                <input type="submit" name="enviar" class="boton" value="Iniciar sesion">
            </form>
        </div>
    </div>
    
</body>
</html>