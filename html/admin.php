
<?php
    $conexion = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");
    
    mysqli_select_db($conexion, "byte") or die ("No se puede seleccionar la base de datos");
    
    $instruccion1 = "select * from usuario";
    
    $consulta = mysqli_query($conexion, $instruccion1) or die ("Fallo en la consulta");
    
    $num_filas = mysqli_num_rows($consulta);
    
    if ($consulta){
        print "<table><tr><th>Id</th><th>Nombre</th><th>Apellido</th><th>Email</th><th>Contraseña</th><th>Fecha nacimiento</th><th>Telefono</th><th>Check</th></tr>";
        for ($i=1; $i<=$num_filas; $i++){
        $resultado = mysqli_fetch_array($consulta);
        print "<tr><td>" . $resultado['id'] . "</td><td>" . $resultado['nombre'] . "</td><td>" . $resultado['apellido'] . "</td><td>" . $resultado['email'] . "</td><td>" . $resultado['passwd'] . "</td><td>" . $resultado['fecha_nacimiento'] . "</td><td>" . $resultado['telefono'] . "</td><td><input type='checkbox'></td></tr>";
        }
        print "</table>";
    
        print"<br><br><a href='./admin.html'>Volver a Menu</a>";
    }
    
    if (isset($_REQUEST['eliminar'])){
        $id = $_REQUEST['id'];

        $conexion2 = mysqli_connect("localhost", "root", "rootroot") or die ("No se puede conectar con el servidor");
    
        mysqli_select_db($conexion2, "byte") or die ("No se puede seleccionar la base de datos");
    
        $instruccion2 = "delete from usuario where id like $id";
    
        $consulta2 = mysqli_query($conexion2, $instruccion2) or die ("Fallo en la consulta");
    

    
        if ($consulta2){
            header("Location: ./admin.php ");
        }
    
    }
?>