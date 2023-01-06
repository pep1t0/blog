<?php require 'header.php'; ?>

    <div class="contenedor">
        <div class="post">
            <article>                
                <h2 class="titulo">Inicio de sesión</h2>
                <form class="formulario" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                        <input type="text" name="usuario" placeholder="Usuario">
                        <input type="text" name="password" placeholder="Contraseña">
                        <input type="submit" value="Iniciar sesión">
                </form>
            </article>
        </div>                                
    </div>

<?php require 'footer.php'; ?>