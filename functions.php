<?php

# Funcion para conectar a la base de datos
function conexion($bd_config){
	try {
        $conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'], $bd_config['usuario'], $bd_config['pass']);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		return $conexion;

	} catch (PDOException $e) {
		return false;		
	}
}

## Aqui poner el tipo de p a int para evitar sqli

function pagina_actual() {
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;    
}


function obtener_posts($post_por_pagina, $conexion) {
    $inicio = (pagina_actual() > 1) ? pagina_actual() * $post_por_pagina - $post_por_pagina : 0;
    $sentencia = $conexion -> prepare("SELECT SQL_CALC_FOUND_ROWS * FROM news LIMIT $inicio, $post_por_pagina");
    $sentencia -> execute();
    return $sentencia -> fetchAll();
}

function limpiarDatos($datos) {
    try {
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
        $datos = implode(array($datos));        
    } catch(Error) {
        header('Location: admin/error.php');        
        die();
    }   
    return $datos;
}
//Aqui tendremos que hacer una limpieza del ID. Ahora la ponemos comentada
function id_articulo($id) {
    //Solo protege de ataques UNION SQL
    //$id = str_replace("union", "-- -", $id);
    //$id = str_replace("UNION", "-- -", $id);  
    //return ($id);
    
    // Protege de todos los tipos de ataques
    return (int)limpiarDatos($id);
}


// Funcion vulnerable.
//function obtener_post_por_id($conexion, $id_articulo) {
//    $resultado = $conexion -> query("SELECT * FROM news WHERE id = $id_articulo LIMIT 1");
//   $resultado = $resultado -> fetchAll();
//    return ($resultado) ? $resultado : false;
//}


//Funcion protegida gracias a usar Prepare  Statement
function obtener_post_por_id($conexion, $id_articulo) {
    $statement = $conexion -> prepare("SELECT * FROM news WHERE id = :id LIMIT 1");
    $statement -> execute(array(':id' => $id_articulo));
    
    $resultado = $statement -> fetchAll();
    return ($resultado) ? $resultado : false;
}


function numero_paginas($post_por_pagina, $conexion) {
    $total_post = $conexion -> prepare('SELECT FOUND_ROWS() as total');
    $total_post->execute();
    $total_post = $total_post -> fetch()['total'];

    $numero_paginas = ceil($total_post / $post_por_pagina);
    return $numero_paginas;
}

function fecha($fecha){
	$timestamp = strtotime($fecha);
	$meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

	$dia = date('d', $timestamp);

	// -1 porque los meses en la funcion date empiezan desde el 1
	$mes = date('m', $timestamp) - 1;
	$year = date('Y', $timestamp);

	$fecha = $dia . ' de ' . $meses[$mes] . ' del ' . $year;
	return $fecha;
}

function comprobarSession() {
    if (!isset($_SESSION['admin'])) {
        header('Location: /practica/blog/index.php');
    }
}

?>