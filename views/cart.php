<?php
    require_once 'models/user.php';
    $myUser = new User();
    $userProducts = $myUser->getAllUserProducts($_SESSION['id'])
?>

<?php foreach ($userProducts as $product): ?>
<div class="cart-product">
<strong>
    <?= $product['name'] ?> <?= $product['price'] ?>
</strong>
</div>
<?php endforeach;  ?>
