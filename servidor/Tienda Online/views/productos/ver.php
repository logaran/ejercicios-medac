<?php if (isset($prod)) : ?>
    <h1><?= $prod->nombre ?></h1>
    <div class="product-preview">
        <div class="product-img">
            <?php $imgCamiseta = ($prod->imagen) ? base_url . "uploads/images/" . $prod->imagen : base_url . "assets/img/camiseta.webp" ?>
            <img src="<?= $imgCamiseta ?>" alt='<?= $prod->nombre ?>'>
            <h2><?= $prod->nombre ?></h2>
        </div>
        <div class = "product-info">
            <p><?= $prod->precio ?> euros</p>
            <p><?= $prod->descripcion ?></p>
            <a href="<?=base_url?>carrito/add&id=<?=$prod->id?>" class="button">Comprar</a>
        </div>
    </div>

<?php else : ?>
    <h1>El producto no existe</h1>
<?php endif; ?>