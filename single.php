<?php
session_start();
require 'admin/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

//Llamada para limpiar el id. id_new limpia el id de SQLi. Ahora esta deshabilitado
$id_articulo = id_articulo($_GET['id']);

if (!$conexion) {
    header('Location: error.php');
}
if(empty($id_articulo)) {
    header('Location: index.php');
}

$post = obtener_post_por_id($conexion, $id_articulo);

if (!$post) {
    // header('Location: index.php');
    header('Location: error.php');
}

$post = $post[0];

require 'views/single.view.php';

?>