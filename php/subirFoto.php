<?php
include("conexion.php");
include("validarSesion.php");


$consulta = "SELECT idFotos
             FROM fotos
             ORDER BY idFotos DESC
             LIMIT 1";
$consulta = mysqli_query($conexion, $consulta);
$consulta = mysqli_fetch_array ($consulta) ;


$idFoto = $consulta['idFotos']; //: guardamos al dato obtenido en la variable idFoto.

++$idFoto;//generamos un nuevo id sumandole 1 al ultimo id  de nuestra BD

//guardamos la imagen en nuetsra carpeta  de imagenes
$ubicacion="../Imagenes/$nickname/$idFoto.png";
$archivo = $_FILES['archivo']['tmp_name'];

if (move_uploaded_file($archivo,"../$ubicacion")) {
    echo"El archivo ha sido subido";
    $consulta="INSERT INTO fotos VALUES('$idFoto','$nickname','$ubicacion')";
    if (mysqli_query($conexion, $consulta)) {
        echo"Tu imagen ha sido guardada"; 
        header('Location: ../misFotos.php');
    }else{
        echo"Error: ".$consulta."<br>".mysqli_error($conexion);
        echo"<a href='../misFotos.php'' >Volver.</a></div>";
    }
}else{
    echo"Ha ocurrido un error intentelo de nuevooooo!";
    echo"<a href='../misFotos.php'' >Volver.</a></div>";
}


?>