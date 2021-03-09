<?php
require_once('inc/data/products.php');

session_start();
?>

<?php require 'inc/head.php'; ?>
<section class="cookies container-fluid">
    <div class="row">
        <ul class="list-group">
            <?php foreach (array_count_values($_SESSION['cart']) as $key => $qty) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <?= $catalog[$key]['name'] ?>
                    <span class="badge bg-primary rounded-pill"><?= $qty ?></span>
                </li>
            <?php } ?>
        </ul>
    </div>
</section>
<?php require 'inc/foot.php'; ?>