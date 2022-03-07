<?php
    include_once 'models/products.php';
    $myProducts = new Products();
    $allProducts = $myProducts->getAll();
    if(!empty($_SESSION['auth']) and $_SERVER['REQUEST_METHOD'] == 'POST'){
        include_once 'models/user.php';
        $myUser = new User();
        echo (int)$_POST['productId'];
        echo (int)$_SESSION['id'];
        $myUser->setNewProduct((int)$_SESSION['id'], (int)$_POST['productId']);
    }
?>

<div class="wrapper">

    <?php foreach ($allProducts as $product): ?>
        <?php echo $product['id'] ; ?>
        <article class="item">
            <h2><?= $product['name']  ?></h2>
            <img class="item__img" src="<?= $product['img']  ?>" alt="афцвфцв">
            <p><?= $product['description']  ?></p>
            <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
                <input name="productId" hidden value="<?= $product['id'] ?>" type="text">
                <button>Добавить</button>
            </form>
        </article>
    <?php endforeach; ?>
</div>