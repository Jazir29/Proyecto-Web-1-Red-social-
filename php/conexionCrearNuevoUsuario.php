<?php
include("conexion.php");//el include es para llamar a un archivo, en este caso la conexion

//
$nickname=$_POST["nickname"];
$nombre=$_POST["nombre"];
$apellidos=$_POST["apellidos"];
$edad=$_POST["edad"];
$descripcion=$_POST["descripcion"];
$email=$_POST["correo"];
$password=$_POST["contraseña"];

$passwordHash= password_hash ($password, PASSWORD_BCRYPT);//BCRYPT es el algoritmo de encriptacion, devuelve una cadena de 60 caractered

$fotoPerfil="Imagenes/$nickname/perfil.png";//ingresamos la ruta

//Evaluamos si el nickname ya existe
$consultaId="SELECT Nickname
            FROM persona 
            WHERE Nickname='$nickname'";

$consultaId=mysqli_query($conexion,$consultaId);
$consultaId=mysqli_fetch_array($consultaId);
if(!$consultaId){//si consulta esta vacia
    $sql="INSERT INTO persona VALUES('$nickname','$nombre','$apellidos','$edad',
        '$descripcion','$fotoPerfil','$email','$passwordHash')";
    //EJECUTAMOS Y VERIFICAMOS SI SE GUARDARON LOS DATOS
    if (mysqli_query($conexion, $sql)) {
        mkdir ("../Imagenes/$nickname"); //Creamos una carpeta en imagenes para el usuario
        copy ("../Imagenes/default.png","../Imagenes/$nickname/perfil.png"); //copiamos nuestra foto por default
        echo "Tu cuenta ha sido creada.";
        echo "<br> <a href='../index.html' >Iniciar Sesion</a></div>";
    }else{
        echo"Error: ".$sql."<br>".mysqli_error($conexion);
    }
}else{
    echo"El nickname ya existe";
    echo"<a href='index.html'>Intentalo de nuevo.</a></div>";
}
mysqli_close($conexion);


?>
