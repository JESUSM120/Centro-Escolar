<?php
    // Esta sentencia dice que si estan vacios los campos de nombre, edad y signo
    // Manda un mensaje de error y te expulsará del ciclo
    //print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtId"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtDireccion"]) || empty($_POST["txtFecha"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    //Se obtiene la conexion de la clase conexion
    include_once 'model/conexion.php';
    $id = $_POST["txtId"];
    $Nombre = $_POST["txtNombre"];
    $Apellido = $_POST["txtApellido"];
    $Direccion = $_POST["txtDireccion"];
    $Fecha_nacimiento = $_POST["txtFecha"];
    // Se colocan de los datos para insertarlos a la base de datos
    $sentencia = $bd->prepare("INSERT INTO alumnos (id, Nombre, Apellido, Direccion, Fecha_nacimiento)VALUES (?,?,?,?,?);");
    $resultado = $sentencia->execute([$id, $Nombre,$Apellido,$Direccion, $Fecha_nacimiento]);
    // Esta sentencia dice que si el resultado es verdadero, se enviará un mensaje de registrado
    // En el caso contrario, mandará un mensaje de error y terminará el ciclo
    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>