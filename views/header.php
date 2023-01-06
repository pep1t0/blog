<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no,
        initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="/practica/blog/css/estilos.css"> 
        <title>Blog</title>
    </head>
    <body>
        <header>
            <div class="contenedor">
                <div class="logo izquierda">
                    <p><a href="/practica/blog/index.php">Blog de Noticias></a></p>
                </div>

                <div class="derecha">
                    <form name="busqueda" class="buscar" action="#" method="get">
                    <input type="text" name="busqueda" placeholder="Buscar">
                    <button type="submit" class="icono fa fa-search"></button>
                    </form>

                    <nav class="menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="https://www.linkedin.com/in/daniel-requena-moreno" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="mailto:jrequemo@uoc.edu">Contacto <i class="icono fa fa-envelope"></i></a></li>
                            <li><a href="/practica/blog/login.php"><?php if(!isset($_SESSION['admin'])) { echo "Login"; } else { echo $_SESSION['admin']; } ?></a></li>
                        </ul>                
                    </nav>
                </div>
            </div>
        </header>