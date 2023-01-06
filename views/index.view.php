<?php require 'header.php'; ?>

        <div class="contenedor">
            <?php foreach($posts as $post): ?>
                <div class="post">
                    <article>
                        <h2 class="titulo"><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                        <p class="fecha"><?php echo fecha($post['datetime']); ?></p>
                        <!-- <div class="thumb">
                            <a href="#">
                                <img src="imagenes/1.png" alt="">
                            </a>
                        </div> 
                        <p class="extracto"><?php echo $post['body']; ?></p> -->
                        <a href="single.php?id=<?php echo $post['id']; ?>"class="continuar">Continuar leyendo</a>
                    </article>
                </div> 
            <?php endforeach; ?>
            

       
            <?php require 'paginacion.php'; ?>
        </div>

<?php require 'footer.php'; ?>       

