<?php
include("conexion.php");//el include es para llamar a un archivo, en este caso la conexion

session_start(); // inicia una nueva sesion o reanuda la existente.
$_SESSION['login'] = false;

// declarando variables para recibir y guardar los datos enviados desde el formulario
$nickname=$_POST["nickname"];
$password=$_POST["contraseña"];

// Bvaluamos el nickname ingresado
$consulta = "SELECT *
            FROM persona WHERE Nickname= '$nickname' ";
$consulta = mysqli_query($conexion, $consulta); // ejecutamos 1a consulta
$consulta = mysqli_fetch_array ($consulta);

if($consulta){
    if (password_verify ($password, $consulta['Password'])){
        $_SESSION['login'] = true;
        $_SESSION['nickname'] = $consulta['Nickname']; //$ SESSION es una variable superglobal
        $_SESSION['nombre'] = $consulta['Nombre'];
        $_SESSION['apellidos'] = $consulta['Apellidos'];
        $_SESSION['edad'] = $consulta['Edad'];
        $_SESSION['descripcion'] = $consulta['Descripcion'];
        $_SESSION['fotoPerfil'] = $consulta['Fotoperfil'];
        header('Location: ../miPerfil.php');//redireccionamos a la pagina mi perfil
    } else  {
        echo "Contrasefia Incorrecta";  
        echo "<br><a href='../index.php' >Intentalo de nuevo.</a></div>";
    }

}else{
    echo"El usuario no existe";
    echo "<br><a href='../index.php' >Intentalo de nuevo.</a></div>";
}

mysqli_close($conexion);
?>
