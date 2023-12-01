<h1>Productos destacados</h1>
<?php while ($prod = $productos->fetch_object()) : ?>
    <div class="product">
        <a href="<?=base_url?>productos/ver&id=<?=$prod->id?>">
            <?php $imgCamiseta = ($prod->imagen) ? base_url . "uploads/images/" . $prod->imagen : base_url . "assets/img/camiseta.webp" ?>
            <img src="<?= $imgCamiseta ?>" alt='<?= $prod->nombre ?>'>
            <h2><?= $prod->nombre ?></h2>
        </a>
        <p><?= $prod->precio ?> euros</p>
        <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="button">Comprar</a>
    </div>
<?php endwhile; ?>
</div>