<?php
    $this->title = 'Kurslar üçün bölmə yenilə';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/courses-category/index"> Kurslar üçün bölmə</a></li>
    <li class="active"> Kurslar üçün bölmə yenilə</li>
</ol>

<div class="news-ads-update">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>