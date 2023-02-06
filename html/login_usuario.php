<?php

$email = trim($_REQUEST['correo']);
$passwd = trim($_REQUEST['contraseña']);
$verificado = false;

$conexion = mysqli_connect ("localhost", "root", "rootroot") // conectar con el servidor
or die ("No se puede conectar con el servidor.");

mysqli_select_db ($conexion, "byte") // seleccionar base de datos
or die ("No se puede seleccionar la base de datos.");


if (($email == "admin@admin.com") && ($passwd=="admin")){
    header("Location: ./admin.html ");
}
else{

$intruccion1 = "select * from usuario where email='$email' and passwd=MD5('$passwd')";
//echo $intruccion1; //para comprobar errores de mysql
$consulta = mysqli_query ($conexion, $intruccion1)
or die ("Fallo en la consulta");

$num_filas = mysqli_num_rows ($consulta); // devuelve numero de lineas de la consulta.

if ($num_filas == 1){ // comprobar si numero de filas es igual a 1.
    $verificado = true;
}
else{
    print "Usuario no conectado!! Login incorrecto.";
    $verificado = false;
}

//cerrar
mysqli_close($conexion);

if ($verificado == true){
    header("Location: ./paginaprincipal.html ");
}
else{
    header("Location: ./inicio.html");
}
}
?>