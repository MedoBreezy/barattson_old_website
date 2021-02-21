<?php
    $this->title = 'Menu yenilə';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/menu/index"> Menu</a></li>
    <li class="active"> Menu yenilə</li>
</ol>

<div class="news-ads-update">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>