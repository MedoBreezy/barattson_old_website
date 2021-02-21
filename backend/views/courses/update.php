<?php
    $this->title = 'Kurs yenilə';
?>

<ol class="breadcrumb">
    <li><a href="/admin-bs"> Əsas səhifə</a></li>
    <li><a href="/admin-bs/courses/index"> Kurslar</a></li>
    <li class="active"> Kurs yenilə</li>
</ol>

<div class="news-ads-update">
    <?=
        $this->render('_form', [
            'models' => $models,
        ]);
    ?>
</div>