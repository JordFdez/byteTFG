<?php

$nombre = trim($_REQUEST['nombre']); // quitar espacio al campo
$apellido = trim($_REQUEST['apellidos']);
$email = trim($_REQUEST['correo']);
$passwd = trim($_REQUEST['contraseña']);
$passwd2 = trim($_REQUEST['contraseña2']);
$fecha_nacimiento = trim($_REQUEST['fecha_nacimiento']);
$telefono = trim($_REQUEST['telefono']);

if (($nombre=="") || ($apellido=="") || ($email=="") || ($passwd=="") || ($passwd2=="") || ($fecha_nacimiento=="") || ($telefono=="")){
    print "Debe rellenar todos los campos";
}
else{
if ($passwd == $passwd2 ){

$conexion = mysqli_connect ("localhost", "root", "rootroot") // conectar con el servidor
or die ("No se puede conectar con el servidor.");

mysqli_select_db ($conexion, "byte") // seleccionar base de datos
or die ("No se puede seleccionar la base de datos.");

$instruccion1 = "insert into usuario (nombre, apellido, email, passwd, fecha_nacimiento, telefono) values ('$nombre', '$apellido', '$email', MD5('$passwd'), '$fecha_nacimiento', $telefono)";
// echo $instruccion1 //para comprobar errores de mysql
$instruccion2 = "select email from usuario where email='$email'";

$consulta2 = mysqli_query($conexion, $instruccion2) or die ("Fallo en la consulta");
$num_filas = mysqli_num_rows ($consulta2);
if ($num_filas >= 1){
    print "Error, ya existe ese email.";
}
else{

$consulta = mysqli_query ($conexion, $instruccion1)
or die ("Fallo en la consulta");


if ($consulta){
    header("Location: ./inicio.html ");
}
else{
    print "Usuario no dado de alta!!";
}
//cerrar
mysqli_close($conexion);
}
}
else{
    print "No coinciden las contraseñas";
}

}


?>