<?php require 'header.php'; ?>

        <div class="contenedor">
            <div class="post">
                <article>
                    <h2 class="titulo"><?php echo $post['title']; ?></h2>
                    <p class="fecha"><?php echo fecha($post['datetime']); ?></p>               
                    <p class="extracto"><?php echo nl2br($post['body']); ?></p>
                </article>
            </div>          
        </div>

<?php require 'footer.php'; ?>     