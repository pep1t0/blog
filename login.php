<?php session_start();
require 'admin/config.php';
require 'functions.php';
//require 'vendor/autoload.php';

if(isset($_SESSION['admin'])) { 
    header('Location: admin/');         
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);    
       
    $connection_mongo = new MongoDB\Driver\Manager("mongodb://localhost:27017");

    $query_mongo = new MongoDB\Driver\Query(["nombre" => $usuario, "password" => $password]);
    $record_mongo = $connection_mongo -> executeQuery('prueba_usuarios.usuarios', $query_mongo);
    $record_mongo = iterator_to_array($record_mongo);

    if(sizeof($record_mongo)>0) {
        $usr = $record_mongo[0];
        $_SESSION['admin'] = $usr -> nombre;
        header('Location: admin/');         
    }
    else {
        header('Location: admin/error.php');        
    } 
}

require 'views/login.view.php'; 
?>