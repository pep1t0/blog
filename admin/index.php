<?php session_start();

// Archivo index del ADMIN

require 'config.php'; 
require '../functions.php';


//Comprobamos la sesion
comprobarSession();

require '../views/admin_index.view.php'; 

?>
