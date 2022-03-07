<?php if(!empty($formAction)): ?>
    <form method="POST" action="<?= $formAction ?>">
        <input name="userName" type="text">
        <input name="password" type="password">
        <button><?= empty($btnText) ? 'Жмяк' : $btnText ?></button>
    </form>
<?php endif;  ?>
