<?php
include("conexion.php");
include("validarSesion.php");

$nicknameA = $_GET['nickname'];

$consulta="INSERT INTO amistad(NickName1, NickName2) VALUES ('$nickname','$nicknameA') ";

if (mysqli_query($conexion, $consulta)){
    $consulta="INSERT INTO amistad(NickName1, NickName2) VALUES ('$nickname','$nicknameA') ";
    if(mysqli_query($conexion, $consulta)){
        echo"Ahora tienes un nuevo amigo";
        header('Location: ../buscarAmigos.php');
    }else{
        echo "Error";
        echo"<a href='../buscarAmigo.php'>Volver.</a></div>";
    }
}else{
    echo "Error";
    echo"<a href='../buscarAmigo.php'>Volver.</a></div>";
}

?>