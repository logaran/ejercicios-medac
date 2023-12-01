<?php if (isset($cat)) : ?>
    <h1><?= $cat->nombre ?></h1>
    <?php if ($productos->num_rows == 0) : ?>
        <p>No hay productos de esta categoría</p>
    <?php else : ?>
        <?php while ($prod = $productos->fetch_object()) : ?>
            <div class="product">
                <a href="<?=base_url?>/productos/ver&id=<?=$prod->id?>">
                    <?php $imgCamiseta = ($prod->imagen) ? base_url . "uploads/images/" . $prod->imagen : base_url . "assets/img/camiseta.webp" ?>
                    <img src="<?= $imgCamiseta ?>" alt='<?= $prod->nombre ?>'>
                    <h2><?= $prod->nombre ?></h2>
                </a>
                <p><?= $prod->precio ?> euros</p>
                <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="button">Comprar</a>
            </div>
        <?php endwhile; ?>
    <?php endif; ?>
<?php else : ?>
    <h1>La categoría no existe</h1>
<?php endif; ?>